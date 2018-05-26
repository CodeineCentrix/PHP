<?php

/**
 * Description of MainController
 *
 * @author s217057098
 */
include '../Model/DBhelper.php';
$action = filter_input(INPUT_POST, 'action');
if ($action==NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action==NULL) {
        include "../View/LandingPage.php";
        exit();
    }
}

/* Below is a really important section and this is the logic, if you're coding the interface this is where you'll get your data */
switch ($action){
    case 'login_page':
        include '../View/Login.php';
        break;
    case 'register_page':
        include '../View/Register.php';
        break;
    case 'login':
        $username = filter_input(INPUT_POST, 'placeholder_username');
        $password = filter_input(INPUT_POST, 'placeholder_password');
        $stored_procedure = "usp_DBStored_procedure(?, ?)";
        $credentials = array(
            "DBcolum_name"=> $username,
            "DBcolumn_name"=> $password
        );
        $user_details = DBhelper::sp_SelectWithParams($procedureName, $credentials);
        break;
}