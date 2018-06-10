<?php

/**
 * Description of MainController
 *
 * @author s217057098
 */
include '../DAL/DBhelper.php';
include '../DAL/DBAccess.php';
   session_start();
$action= filter_input(INPUT_POST, 'action');
if ($action==NULL) {
    $action= filter_input(INPUT_GET, 'action');
    if ($action==NULL) {
        $context ="Welcome to Driplit";
        include "../Resources/View/LandingPage.php";
        exit();
    }
}
//$action= 'news';
/* Below is a really important section and this is the logic, if you're coding the interface this is where you'll get your data */
$dataAceess = new DBAccess(); 
$context = "Unknown location";
switch ($action){
    //   Page displaying/ request section 
    case 'login_page':
        $user_details= NULL;
        include '../Resources/View/log_in.php';
        break;
    
    case 'register_page':
        $cities= $dataAceess->Get_Cities();
        $suburbs=$dataAceess->Get_Suburbs();
        $feedback =0;
        include '../Resources/View/register_1.php';
        break;
    
    case 'reading_page' :
        $feedback=null;
        $data_null = CheckIfCookiesExists("HouseNumber", "StreetName");
        if($data_null===FALSE){
        $house =array();
        $house[0] = filter_input(INPUT_COOKIE, 'HouseNumber');
          $house[1] = filter_input(INPUT_COOKIE, 'StreetName');
        include '../Resources/View/RecordReadings.php';
    }else{
        $user_details=1;
        include '../Resources/View/log_in.php';
    }
              break;
          
    case 'view_readings_page':
      $data_null=  CheckIfCookiesExists("HouseNumber","StreetName");
        if($data_null===FALSE){
        $readings= array();
        // code from cookies
         $house =array();
        $house[0] = filter_input(INPUT_COOKIE, 'HouseNumber');
          $house[1] = filter_input(INPUT_COOKIE, 'StreetName');       
        include '../Resources/View/ViewReadings.php';
        }else{
            $user_details = 1;
            include '../Resources/View/log_in.php';
        }
        break;
    // End Page displaying/ request  section 
    
    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $user_details = $dataAceess->Login($email, $password);
        if($user_details==NULL){
            $user_details= FALSE;
            include '../Resources/View/log_in.php';
        }else{
          
            $_SESSION["email"] = $user_details[0][2];
            $PersonID = $user_details[0][0] ;
            $MainResidentID = $user_details[0][7] ;

            $_SESSION["PersonID"] = $user_details[0][0];
            $_SESSION["FullName"] =$user_details[0][1] ;
            $_SESSION["Email"] = $user_details[0][2] ;
            $_SESSION["UserPassword"] =$user_details[0][3] ;
            $_SESSION["Flagged"] =$user_details[0][4] ;
            $_SESSION["HouseID"] =$user_details[0][5] ;
            $_SESSION["Rights"] =$user_details[0][6] ;
            $_SESSION["MainResidentID"] =$user_details[0][7] ;
            $_SESSION["HouseID"] =$user_details[0][8] ;
            $_SESSION["HouseNumber"] =$user_details[0][9] ;
            $_SESSION["StreetName"] =$user_details[0][10] ;
            $_SESSION["SurburbID"] =$user_details[0][11] ;
            $_SESSION["NumberOfResidents"] = $user_details[0][12];
            $context="Welcome to Driplit";
            include '../Resources/View/LandingPage.php';

        }
        
        break;
        
   
    case 'register_resident':
         $fullname = filter_input(INPUT_POST, 'lastname');       
         $email = filter_input(INPUT_POST, 'email');
         $password = filter_input(INPUT_POST, 'psw');
         $deleted = 0;
         $resType=filter_input(INPUT_POST,'ResType');
         
         $houseNum=filter_input(INPUT_POST,'housenumber');  
         $street=filter_input(INPUT_POST, 'streetname');
         $sSuburb= filter_input(INPUT_POST, 'Suburbs');
         $residentNo=filter_input(INPUT_POST,'residents');
         $is_existant = $dataAceess->check_user_existant($email);
         
         if ($is_existant==NULL) {
        
         if ($resType=="mainRes") {
             $feedback = $dataAceess-> RegisterMainResident($fullname, $email, $password,$deleted,$houseNum,$street,$sSuburb,$residentNo);
         } else {
             $feedback = $dataAceess->RegisterResident($fullname, $email, $password,$deleted,$houseNum,$street,$sSuburb,$residentNo);
         }
           include '../Resources/View/register_1.php';
         } else {
            $exists = TRUE;
             include '../Resources/View/register_1.php';
         }
        break;
   
    case 'news':
        $context="News Articles";
        $to = filter_input(INPUT_GET, 'to');
        $from = filter_input(INPUT_GET, 'from');
        if (!isset($to)&& !isset($from)) {
            $to = 0;
            $from = 5;
        }
        $previous = $to - $from;
        $news = $dataAceess->get_news_items($from, $to);
        $total_records_count = $dataAceess->AllNewsRecords();
        $total_records = implode($total_records_count[0]);
        $to += $from;
            include '../Resources/View/view_news.php';   
        break;
    
    case 'add_reading':
        $data_null = CheckIfCookiesExists("HouseNumber", "StreetName", "HouseID");
        if($data_null===FALSE){
            $house =array();
        $house[0] = filter_input(INPUT_COOKIE, 'HouseNumber');
          $house[1] = filter_input(INPUT_COOKIE, 'StreetName');
        $house_id = filter_input(INPUT_COOKIE, 'HouseID');
        $pic=null;
        $date_recorded = filter_input(INPUT_POST, 'readingDate');
        $reading = filter_input(INPUT_POST, 'reading');
        $feedback = $dataAceess->meter_readings( $date_recorded, $pic,$house_id,$reading);
        include '../Resources/View/RecordReadings.php';
        } else {
            $user_details = 1;
            include '../Resources/View/log_in.php';
        }
        break; 
        
    case 'view_readings':
        $data_null = CheckIfCookiesExists("HouseNumber", "StreetName", "HouseID");
        //code from cookies
        if($data_null===FALSE){
        $house =array();
        $house[0] = filter_input(INPUT_COOKIE, 'HouseNumber');
          $house[1] = filter_input(INPUT_COOKIE, 'StreetName');
        $house_id = filter_input(INPUT_COOKIE, 'HouseID');
       $fromDate = filter_input(INPUT_POST, 'fromDate');
       $toDate = filter_input(INPUT_POST, 'toDate');
       $readings = $dataAceess->get_readings($house_id, $fromDate, $toDate);
       include '../Resources/View/ViewReadings.php';
        }else{
             $user_details = 1;
            include '../Resources/View/log_in.php';
        }
       break;
        
    
    case'area_stats':
        $data_null = CheckIfCookiesExists("Email");
        if($data_null===FALSE){
        $context = "Area Statistics";
        //before calling the below retrieve user email using cookie approriate method
        $email = filter_input(INPUT_COOKIE, 'Email');
        $surbs = $dataAceess->Get_Suburbs();
        $addr_level = $dataAceess->area_stats($email);
        $water_charges = $dataAceess->area_water_charges($addr_level[0][2]);
        include '../Resources/View/area_stats.php';
        } else {
            $user_details = 1;
            include '../Resources/View/log_in.php';
        }
        break;
    
    
    case'area_stats_custom':
        $suburb_id = filter_input(INPUT_POST, 'areas');
        $context = "Area Statistics";
         $surbs = $dataAceess->Get_Suburbs();
         $addr_level= $dataAceess->custom_area_stats($suburb_id);
         $water_charges = $dataAceess->area_water_charges($addr_level[0][2]);
         include '../Resources/View/area_stats.php';
        break;
    
    case 'water_usage':
        $data_null = CheckIfCookiesExists("HouseNumber", "StreetName", "HouseID");
        //code from cookies
        if($data_null===FALSE){
        $house =array();
        $house[0] = filter_input(INPUT_COOKIE, 'HouseNumber');
          $house[1] = filter_input(INPUT_COOKIE, 'StreetName');
        $house_id = filter_input(INPUT_COOKIE, 'HouseID');
       $fromDate = "2018/01/01";
       $toDate = "2018/10/10";
       $readings = $dataAceess->get_readings($house_id, $fromDate, $toDate);
       $context ="Water Usage";
       include '../Resources/View/water_usage.php';
        }else{
             $user_details = 1;
            include '../Resources/View/log_in.php';
        }
        break;

    case 'water_usage_custom':
        $data_null = CheckIfCookiesExists("HouseNumber", "StreetName", "HouseID");
        //code from cookies
        if($data_null===FALSE){
        $house =array();
        $house[0] = filter_input(INPUT_COOKIE, 'HouseNumber');
          $house[1] = filter_input(INPUT_COOKIE, 'StreetName');
        $house_id = filter_input(INPUT_COOKIE, 'HouseID');
       $fromDate = filter_input(INPUT_POST, 'fromDate');
       $toDate = filter_input(INPUT_POST, 'toDate');
       $readings = $dataAceess->get_readings($house_id, $fromDate, $toDate);
       $context = "Water Usage";
       include '../Resources/View/ViewReadings.php';
        }else{
             $user_details = 1;
            include '../Resources/View/water_usage.php';
        }
        break;
    case'log_out':
        session_destroy();
        $_SESSION = array();
        $PersonID = NULL;
        $MainResidentID = NULL;
        DeleteCookies();
        $context = "Welcome to Driplit";
        include '../Resources/View/LandingPage.php';
        break;
}

 function CheckIfCookiesExists() {
  $is_non_existant = FALSE;
 $numOfParams = func_num_args();
 $parm_list = func_get_args();
 
 for($i=0; $i<$numOfParams;$i++){
     if(filter_input(INPUT_COOKIE, $parm_list[$i])===NULL){
         $is_non_existant = TRUE;
         break;
     }
 }
 return $is_non_existant;
}

function DeleteCookies(){
    setcookie("PersonID", time()-3600);
            setcookie("FullName", time()-3600);
            setcookie("Email",  time()-3600);
            setcookie("UserPassword",  time()-3600);
            setcookie("Flagged",  time()-3600);
            setcookie("HouseID",  time()-3600);
            setcookie("Rights",  time()-3600);

            setcookie("MainResidentID",  time()-3600);
            setcookie("HouseID",  time()-3600);
            setcookie("HouseNumber", time()-3600);
            setcookie("StreetName", time()-3600);
            setcookie("SurburbID",  time()-3600);
            setcookie("NumberOfResidents", time()-3600);
           
}
