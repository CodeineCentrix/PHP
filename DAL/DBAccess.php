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
    
    public function Add_Dam($damName, $damLevel){
        $stored_procedure="uspWEBInsertDam(?,?)";
        $param=array($damName, $damLevel);
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
            
    public function Update_Dam($damId, $damName, $damLevel){
        $stored_procedure="uspWEBEditDam(?,?,?)";
        $param=array($damId,$damName, $damLevel);
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
     
    public function Delete_Dam($damId){
        $stored_procedure="uspWEBDeleteDam(?)";
        $param=array($damId);
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }

    public function Get_DamLevel($damId) {
        $stored_procedure="uspWEBGetDamLevel(?)";
        $param=array(
            $damId
        );
        
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);      
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
    
    public  function Add_RateCharge($pice,$min,$stateId,$municipalId,$max){
         $stored_procedure="uspWEBAddRateCharge(?,?,?,?,?)";
         $param=array($pice,$min,$stateId,$municipalId,$max);
         return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
         
    }
    public function SearchRateCharge ($muniId, $stateId){
        $stored_procedure="uspWEBGetRateCharge(?,?)";
        $param=array($muniId, $stateId, );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
            
    public function Update_RateCharge($min, $max, $price,$muniId,$stateId, $rateID){
        $stored_procedure="uspWEBUpdateRateCharge(?,?,?,?,?,?)";
         $param=array($min, $max, $price,$muniId,$stateId, $rateID);
         return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }

    public function  Get_State(){
    $stored_procedure="uspWEBGetState";
    return DBhelper::sp_SelectStatement($stored_procedure);
    }
    public function Add_Municipality($damId,$state,$name,$damLevel){
        $stored_procedure="uspWEBAddMunicipality(?,?,?,?)";
        $param=array($damId,$state,$name,$damLevel);
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }

    public function update_municipality($municipalId, $damId, $stateId, $newName){
        $stored_procedure="uspWEBUpdateMunicipality(?,?,?,?)";
            $param=array(
                $municipalId, $damId, $stateId, $newName
                );
                return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);      
    }
    
    public function update_damLevel($damId, $damLevel){
        $stored_procedure="uspWEBUpdateDamLevel(?,?)";
        $param=array($damId, $damLevel);
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }

    public function Get_UnapprovedTips(){
        $stored_procedure="uspWEBGetUnapprovedTips";
            return DBhelper::sp_SelectStatement($stored_procedure);

    }
    public function Approve_Tip($tipId){
       $stored_procedure="uspWEBApproveTip(?)"; 
       $param =array($tipId);
               return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);

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
      //  die($email." - ".$houseID." - ".$rights);
        $stored_procedure = "uspWEBAddResidentToHouse(?,?,?)";
        $param = array(
            $email,
            $houseID,
            $rights
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
    function ValidateReadingValue($house_id, $date, $reading) {
        $stored_procedure = "uspWEBValReading(?,?,?)";
        $param = array(
            $house_id,
            $date,
            $reading
        );
         return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    function getRoomies($main_resident_id) {
    //    die(print_r($_SESSION));
    //die($main_resident_id);   
        $stored_procedure ="uspWEBgetHouseResidents(?)";
        $param = array(
            $main_resident_id
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    function revokeRoomiesRights($person_id){
        $stored_procedure = "uspWEBRevokeRight(?)";
        $param = array(
            $person_id
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
    function AddNewsArticle($pic_name,$pic_link,$admin_id,$article_title,$art_desc,$date_posted,$article_body_link, $author) {
        $stored_procedure ="uspWEBAddNewsArticle(?,?,?,?,?,?,?,?)";
        $param = array(
            $pic_name,
            $pic_link,
            $admin_id,
            $article_title,
            $art_desc,
            $date_posted,
            $article_body_link,
            $author
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
     public function LoginAdmin($email, $password){
        $stored_procedure="uspWEBLoginAdmin(?,?)";
        $param =array(
            $email,
            $password
        );
        return DBhelper::sp_SelectWithParams($stored_procedure, $param);
    }
    
    public function getAdminOverviewData() {
         $stored_procedure ="uspWEBAdminStatsHomePage()";
        return DBhelper::sp_SelectStatement($stored_procedure);
    }
    
    function UpdateResidentHouse($email,$HouseNumber,$StreetName ,$SuburbID ,$NumberOfResidents,$mainResident ) {
        $stored_procedure ="uspWEBUpdateResidentHouse(?,?,?,?,?,?)";
        $param = array(
           $email,
           $HouseNumber,
           $StreetName,
           $SuburbID,
           $NumberOfResidents,
           $mainResident
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
    }
    
     public function UpdateResident($fullname,  $email, $password, $street_name,$street_update=1 ) {
        $stored_procedure ="uspWEBUpdateResident (?,?,?,?,?)";
        $param = array(
           $fullname,          
           $email,
           $password,
           $street_name,
           $street_update
          
        );
        return DBhelper::sp_NonQueryStatementsParams($stored_procedure, $param);
}

    public function reports_pdf_data($House_id, $from_date, $to_date) {
    $stored_procedure ="uspWEBPDFRateData(?,?,?)";
    $params = array(
        $House_id,
        $from_date,
        $to_date
    );
    return DBhelper::sp_SelectWithParams($stored_procedure, $params);
}

    public function reports_pdf_rates($city_id) {
    $stored_procedure ="uspWEBPDFRates(?)";
    $params = array(
     $city_id   
    );
    return DBhelper::sp_SelectWithParams($stored_procedure, $params);
}

public function reports_pdf_opening_amount($date, $house_id) {
    //This will give me the last recorded meter reading and also, the last 
    $stored_procedure ="uspWEBPDFOpeningAmount(?,?)";
    $params = array(
     $date,
     $house_id
    );
    return DBhelper::sp_SelectWithParams($stored_procedure, $params);
}

public function check_main_residence($house_number, $street_name, $suburb_id) {
    $stored_procedure ="uspWEBCheckMainResident(?,?,?)";
    $params = array(
     $house_number, 
        $street_name, 
        $suburb_id
    );
    return DBhelper::sp_SelectWithParams($stored_procedure, $params);
}

function get_removable_articles() {
  $procedure = "uspWEBAllArticlesDEL"; 
  return DBhelper::sp_SelectStatement($procedure);
}

function remove_article($article_id) {
    $procedure = "uspWEBDelArticle(?)";
    $params = array(
        $article_id
    );
  return  DBhelper::sp_NonQueryStatementsParams($procedure, $params);
}

function reject_tips_tricks($tip_id) {
    $procedure = "uspWEBRejectTip(?)";
    $params = array(
        $tip_id
    );
  return  DBhelper::sp_NonQueryStatementsParams($procedure, $params);
}

function usage_by_city($city_id) {
    $procedure = "uspWEBUsagePerArea(?)";
    $params = array(
        $city_id
    );
    return DBhelper::sp_SelectWithParams($procedure,$params);
}

function pdf_invoicer($closing_date, $starting_date, $house_id) {
    $procedure = "uspWEBPDFOpeningAmount(?,?,?)";
    $params = array(
        $closing_date,
        $starting_date,
        $house_id
    );
    return DBhelper::sp_SelectWithParams($procedure,$params);
}

function get_pdf_address($house_id) {
    $procedure = "uspWEBPDFUserAddress(?)";
    $params = array(
        $house_id
    );
    return DBhelper::sp_SelectWithParams($procedure, $params);
}

function get_email_add($my_email) {
    $procedure = "uspWEBAddResToHouse(?)";
    $params = array(
        $my_email
    );
    return DBhelper::sp_SelectWithParams($procedure, $params);
}

function reading_preview($house_id, $start_date, $end_date) {
   //die($house_id.' - '.$start_date.' - '.$end_date);
    $procedure = "uspWEBPreviewReadings(?,?,?)";
    $params = array(
      $house_id,
      $start_date,
      $end_date
    );
    return DBhelper::sp_SelectWithParams($procedure, $params); 
}

}
