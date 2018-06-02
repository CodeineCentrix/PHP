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
        include '../Model/DBhelper.php';
        $emps = new DBhelper();
/*
 * How to use the methods in the DBhelper class, this one below is an example of how to pass parameters to a stored procedure
 * this is just for test purposes, we'll later move the code to the relevant class
 */
        $par = array(
            array("BASIC",SQLSRV_PARAM_IN));
        $tabs = $emps->sp_SelectWithParams("call usp_getAccType(?)", $par);
        print_r($tabs);
        echo $emps->count."</br></br></br>";
        /*------------------------------------------------END REGION----------------------------------------------------------------*/
       /*
        * The code below uses the DBhelper to call a stored procedure with no parameters. But should return an array. 
        * this is just for test purposes, we'll later move the code to the relevant class 
        */
        $emps = new DBhelper();
        $tabs = $emps->sp_SelectStatement(" usp_getCusts");
        print_r($tabs);
        echo '</br></br></br>';
        /*------------------------------------------------END REGION--------------------------------------------------------------------*/
        /*
         * The code below is intended to add a new customer to the database! Using stored procedures. We seriously need to consider PHP and MS SQL Datatypes. Convert when neccessary
         * in the next group meeting we need to discuss keeping most values as strings. 
         */
        $emps = new DBhelper();
        $name = 'Michael';
        $surname = 'Jordan';
        $acc_type ='MAX';
        $params = array(
            $name,
            $surname,
            $acc_type
        );
        $is_succesful = $emps->sp_NonQueryStatementsParams("usp_addCust( ?, ?, ?)", $params);
        echo "$is_succesful";
        ?>
        </div>
    </body>
</html>
