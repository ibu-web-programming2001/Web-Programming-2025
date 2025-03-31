<?php

class Utils {

    public function validateField($array, $field){
        if(is_null($array[$field])){
            return false;
        }

        if ($field == "first_name"){
            ///
        }

        return true;
    }
}