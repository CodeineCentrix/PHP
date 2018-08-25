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
    
    

    
    public function AllNewsRecords(){
        $stored_procedure ="uspWEBNewsCount";
        return DBhelper::sp_SelectStatement($stored_procedure);
    }
    
     public function AllTipsRecords(){
        $stored_procedure ="uspWEBTipsCount";
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
    
    //content manager
    public function Get_Municipality(){
        $stored_procedure="uspWEBGetMunicipality";
        return DBhelper::sp_SelectStatement($stored_procedure);
    }
    
    public function Get_Dams(){
        $stored_procedure="uspWEBGetDams";
        return DBhelper::sp_SelectStatement($stored_procedure);
    }
    
    public function Get_DamInfo($municipalId) {
        $stored_procedure="uspWEBGetDamInfoParam(?)";
        $param=array(
            $municipalId
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);      
    }
    
    public function Get_DamInformation(){
        $stored_procedure="uspWEBDamInformation";
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
    public function custom_area_stats($surburb_id) {
       $stored_procedure="uspWEBAreaStatsCustom(?)";
        $param =array(
            $surburb_id
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    public function View_Tips($from, $to ){
        $stored_procedure="uspWEBViewTips(?,?)";
        $param=array(
            $from,
            $to
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    public function GetCategories(){
        $stored_procedure="uspWEBGetCategories";
        return DBhelper::sp_SelectStatement($stored_procedure);
    }
    public function Post_Tip($personId,$tip,$catID,$approved ){
        $stored_procedure="uspWEBAddTip(?,?,?,?)";
        $param=array(
            $personId,//get from cookies
            $tip,
            $catID,
            $approved
            
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
                
    }
    
    public function AddResident($email, $houseID, $rights) {
        $stored_procedure = "uspWEBAddResidentToHouse(?,?,?)";
        $param = array(
            $email,
            $houseID,
            $rights
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
    function ValidateReadingValue($house_id, $date) {
        $stored_procedure = "uspWEBValReading(?,?)";
        $param = array(
            $house_id,
            $date
        );
         return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    function getRoomies($main_resident_id) {
        $stored_procedure ="uspWEBgetHouseResidents(?)";
        $param = array(
            $main_resident_id
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
    function revokeRoomiesRights($person_id){
        $stored_procedure = "uspWEBRevokeRight(?)";
        $param = array(
            $person_id
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
    function AddNewsArticle($pic_name,$pic_link,$admin_id,$article_title,$art_desc,$date_posted,$article_body_link) {
        $stored_procedure ="uspWEBAddNewsArticle(?,?,?,?,?,?,?)";
        $param = array(
            $pic_name,
            $pic_link,
            $admin_id,
            $article_title,
            $art_desc,
            $date_posted,
            $article_body_link
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
}
