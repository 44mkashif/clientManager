<?php
    //Clean the form data to prevent injections
    function validateFormData( $formData ){
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

?>