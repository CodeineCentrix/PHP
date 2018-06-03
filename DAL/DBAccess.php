<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBAccess
 * Properly strips and prepares data to and from Database.. 
 * @author Haich
 */
class DBAccess {
    //put your code here
    
    function __construct() {
        
    }
    
    public function get_news_items($to =5, $from=0) {
        $stored_procedure ="";
        $param = array(
            $to,
            $from
                
        );        
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    
    public function login($username, $password){
        /*
         * Returns a full array if user does exist or an empty array if it doesn't
         * find the user. 
         */
         $stored_procedure ="";
        $param = array(
            $username,
            $password
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    public function Register($fullname, $phone_number, $email, $password, $deleted=0 ){
         $stored_procedure ="";
        $param = array(
           $fullname,
           $phone_number,
           $email,
           $password,
           $deleted
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
    public function check_user_existant($username) {
         $stored_procedure ="";
        $param = array(
            $username
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    public function meter_readings($user_id){
        $stored_procedure = "";
        $param = array(
            $user_id
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    public function custom_meter_readings($user_id, $start_date,$end_date){
        $stored_procedure = "";
        $param = array(
            $user_id,
            $start_date,
            $end_date
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    
    
}
