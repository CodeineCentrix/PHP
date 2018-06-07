<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
        <?php
        include '../../DAL/DBhelper.php';
        
/*
 * How to use the methods in the DBhelper class, this one below is an example of how to pass parameters to a stored procedure
 * this is just for test purposes, we'll later move the code to the relevant class
 */
//        $par = array(
//            array("ZeroNull",SQLSRV_PARAM_IN));
//        $tabs = $emps->sp_SelectWithParams("call uspWEBParamSelect(?)", $par);
//       
//        print_r($tabs);
//        if ($tabs==NULL) {
//            echo 'Empty Array, invalid user';
//}
//        echo $emps->count."</br></br></br>";
        /*------------------------------------------------END REGION----------------------------------------------------------------*/
       /*
        * The code below uses the DBhelper to call a stored procedure with no parameters. But should return an array. 
        * this is just for test purposes, we'll later move the code to the relevant class 
        */
        $dam_id = "1000";
        $user_id="ggMA@gogo.com";
        $params = array(
            $user_id
            
        );
        $tabs = DBhelper::sp_SelectWithParams("uspWEBAreaStats(?)", $params);
        
        print_r($tabs);
        
     
        /*------------------------------------------------END REGION--------------------------------------------------------------------*/
        /*
         * The code below is intended to add a new customer to the database! Using stored procedures. We seriously need to consider PHP and MS SQL Datatypes. Convert when neccessary
         * in the next group meeting we need to discuss keeping most values as strings. 
         */
//        $emps = new DBhelper();
//        
//        $fullname = 'Phillip';
//        $phonenumber = '0415049663';
//        $email ='phip@gmail.com';
//        $pass ='pazz';
//        $deleted = 0;
//        $params = array(
//           $fullname,
//            $phonenumber,
//            $email,
//            $pass,
//            $deleted
//        );
//        $is_succesful = $emps->sp_NonQueryStatementsParams("uspWEBAddPerson( ?, ?, ?, ?, ?)", $params);
//        echo "$is_succesful";
        ?>
        </div>
    </body>
</html>
