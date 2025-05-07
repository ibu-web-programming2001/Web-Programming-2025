let StudentService = {
    init: function () {
        $("#addStudentForm").validate({
             rules: {
                name: 'required',
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20
                }
            },
            messages: {
                name: 'Please enter your name',
                email: {
                    required: 'Please enter your email',
                    email: 'Please enter a valid email address'
                },
                password: {
                    required: 'Please enter a password',
                    minlength: 'Password must be at least 8 characters long',
                    maxlength: 'Password cannot be longer than 20 characters',
                }
            },
            submitHandler: function (form) {
              let student = Object.fromEntries(new FormData(form).entries());
              StudentService.addStudent(student);
              form.reset();
            },
          });
       
        $("#editStudentForm").validate({
            submitHandler: function (form) {
              let student = Object.fromEntries(new FormData(form).entries());
              StudentService.editStudent(student);
           
            },
        });

        StudentService.getAllStudents();
    },

    openAddModal : function() {
        $('#addStudentModal').show();
    }, 

    addStudent: function (student) {
        $.blockUI({ message: '<h3>Processing...</h3>' });
        RestClient.post('student', student, function(response){
            toastr.success("Student added successfully")
            $.unblockUI();
            StudentService.getAllStudents();
            StudentService.closeModal();
        }, function(response){
            StudentService.closeModal()
            toastr.error(response.message);
        })
    },

    getAllStudents : function(){
        RestClient.get("students", function(data){
            Utils.datatable('students-table', [
                { data: 'name', title: 'Name' },
                { data: 'email', title: 'Email' },
                {
                title: 'Actions',
                    render: function (data, type, row, meta) {
                        const rowStr = encodeURIComponent(JSON.stringify(row)); 

                        return `<div class="d-flex justify-content-center gap-2 mt-3">
                            <button class="btn btn-primary" onclick="StudentService.openEditModal('${row.id}')">Edit Student</button>
                            <button class="btn btn-danger" onclick="StudentService.openConfirmationDialog(decodeURIComponent('${rowStr}'))">Delete Student</button>
                            <button class="btn btn-secondary" onclick="StudentService.openViewMore('${row.id}')">View More</button>
                        </div>
                        `;
                    }
                }
            ], data, 10);
        }, function (xhr, status, error) {
            console.error('Error fetching data from file:', error);
        });
    },

    getStudentById : function(id) {
        RestClient.get('student_by_id?id='+id, function (data) {
            localStorage.setItem('selected_student', JSON.stringify(data))
            $('input[name="name"]').val(data.name)
            $('input[name="email"]').val(data.email)
            $('input[name="id"]').val(data.id)
            $.unblockUI();
        }, function (xhr, status, error) {
            console.error('Error fetching data');
            $.unblockUI();
        });
    }, 

    openViewMore : function(id) {
        window.location.replace("#view_more");
        StudentService.getStudentById(id) 
    },

    populateViewMore : function(){
        let selected_student = JSON.parse(localStorage.getItem('selected_student'))
        $("#student-name").text(selected_student.name)
        $("#student-email").text(selected_student.email)
    },

    openEditModal : function(id) {
        $.blockUI({ message: '<h3>Processing...</h3>' });
        $('#editStudentModal').show();
        StudentService.getStudentById(id)  
    }, 

    closeModal : function() {
        $('#editStudentModal').hide();
        $("#deleteStudentModal").modal("hide");
        $('#addStudentModal').hide();
    },

    editStudent : function(student){
        console.log(student)
        $.blockUI({ message: '<h3>Processing...</h3>' });
        RestClient.patch('student/' + student.id, student, function (data) {
            $.unblockUI();
            toastr.success("Student edited successfully")
            StudentService.closeModal()
            StudentService.getAllStudents();
        }, function (xhr, status, error) {
            console.error('Error');
            $.unblockUI();
        });
    },

    openConfirmationDialog: function (student) {
        student = JSON.parse(student)
        $("#deleteStudentModal").modal("show");
        $("#delete-student-body").html(
        "Do you want to delete student: " + student.name
        );
        $("#delete_student_id").val(student.id);
    },

    deleteStudent: function () {
        RestClient.delete('students/' + $("#delete_student_id").val(), null, function(response){
            StudentService.closeModal()
            toastr.success(response.message);
            StudentService.getAllStudents();
        }, function(response){
            StudentService.closeModal()
            toastr.error(response.message);
        })
    }
}
