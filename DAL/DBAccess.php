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
        $stored_procedure ="uspWEBViewNews(?, ?) ";
        $param = array(
             $to,
             $from
                
        );        
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    
    public function RegisterResident($fullname,  $email, $password, $deleted=0, $houseNumber, $streetName, $surburbID, $numberOfResidents=1 ){
         $stored_procedure ="uspWEBAddResident(?,?,?,?,?,?,?,?)";
        $param = array(
           $fullname,          
           $email,
           $password,
           $deleted,
           $houseNumber,
           $streetName,
           $surburbID,
           $numberOfResidents
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
    public function RegisterMainResident($fullname,  $email, $password, $deleted=0, $houseNumber, $streetName, $surburbID, $numberOfResidents=1 ) {
        $stored_procedure ="uspWEBAddMainResident (?,?,?,?,?,?,?,?)";
        $param = array(
           $fullname,          
           $email,
           $password,
           $deleted,
           $houseNumber,
           $streetName,
           $surburbID,
           $numberOfResidents
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
    public function check_user_existant($email) {
         $stored_procedure ="uspWEBCheckExistance(?)";
        $param = array(
            $email
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    public function meter_readings($date, $pic=null, $house_id,$reading){
        $stored_procedure = "uspWEBAddReading (?,?,?,?)";
        $param = array(
            $date,
            $pic,
            $house_id,
            $reading
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
    public function get_readings($houseId, $froDate, $fromDate){
        $stored_procedure="uspWEBGetReadings (?,?,?)";
        $param=array(
            $houseId,
            $froDate,
            $fromDate          
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
    
    public function add_reading($user_id, $date_recorded,$reading) {
       $stored_procedure ="";
       $param = array(
            $user_id,
            $date_recorded,
            $reading
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
    public function custom_graph_data($user_id, $start_date,$end_date) {
         $stored_procedure="";
        $param = array(
            $user_id,
            $start_date,
            $end_date
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
     public function graph_data($user_id) {
        $stored_procedure="";
        $param = array(
            $user_id
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    public function area_stats($email) {
       $stored_procedure="uspWEBAreaStats(?)"; 
       $param = array(
            $email
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    public function area_water_charges($dam_id) {
        $stored_procedure="uspWEBWaterCharge(?)";
        $param = array(
            $dam_id
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    
    public function view_tips_tricks($to, $from) {
        $stored_procedure ="";
        $param = array(
            $to,
            $from
                
        );        
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    public function add_tip_tricks($user_id, $comment) {
        $stored_procedure ="";
        $param = array(
            $user_id,
            $comment
                
        );  
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
    public function AllNewsRecords(){
        $stored_procedure ="uspWEBNewsCount";
        return DBhelper::sp_SelectStatement($stored_procedure);
    }
    
    public function  Get_Cities(){
        $stored_procedure="uspWEBCities";
        return DBhelper::sp_SelectStatement($stored_procedure);
    }
    
    public function  Get_Suburbs(){
        $stored_procedure="uspWEBSuburbs";
        return DBhelper::sp_SelectStatement($stored_procedure);
    }
    
    public function Login($email, $password){
        $stored_procedure="uspWEBLogin(?,?)";
        $param =array(
            $email,
            $password
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
}
