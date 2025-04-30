$(document).ready(function () {

  var app = $.spapp({ pageNotFound: "error_404" }); // initialize
  app.route({
    view: "students",
    load: "students.html",
  });
  
  app.route({
    view: "highcharts",
    load: "highcharts.html",
  });

  app.route({
    view: "forms",
    load: "forms.html",
  });

  app.route({
    view: "select2",
    load: "select2.html",
  });

  app.route({
    view: "view_more",
    load: "view_more.html",
  });

  // run app
  app.run();
});
