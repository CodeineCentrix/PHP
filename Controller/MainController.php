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
        $context = "Login";
        $user_details= NULL;
        include '../Resources/View/log_in.php';
        break;
    
    case 'register_page':
        $context= "Register";
        $cities= $dataAceess->Get_Cities();
        $suburbs=$dataAceess->Get_Suburbs();
        $feedback =0;
        include '../Resources/View/register_1.php';
        break;
    
    
    case 'reading_page' :
        $feedback=null;
        $context="Add a reading";
        $data_null = CheckIfCookiesExists("HouseNumber", "StreetName");
        if($data_null===FALSE){
        $house =array();
        $house[0] = $_SESSION['HouseNumber'];
          $house[1] = $_SESSION['StreetName'];
        include '../Resources/View/RecordReadings.php';
    }else{
        $user_details=1;
        $context="Log in";
        include '../Resources/View/log_in.php';
    }
              break;
          
    case 'view_readings_page':
        $context = "View Meter Readings";
      $data_null=  CheckIfCookiesExists("HouseNumber","StreetName");
        if($data_null===FALSE){
        $readings= array();
        // code from cookies
         $house =array();
        $house[0] = $_SESSION['HouseNumber'];
          $house[1] = $_SESSION['StreetName'];       
        include '../Resources/View/ViewReadings.php';
        }else{
            $context="Log in";
            $user_details = 1;
            include '../Resources/View/log_in.php';
        }
        break;
        
        case'add_page':
            $context="Add a Resident";
            $add_results = -1;
            $email_results = 0;
            include '../Resources/View/add_resident.php';
            break;
        
        case'under_construction':
            include '../Resources/View/comingSoon.php';
            break;

    // End Page displaying/ request  section 
    
    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $user_details = $dataAceess->Login($email, $password);
        if($user_details==NULL){
            $user_details= FALSE;
            $context="Log in";
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
        
    /*View Tips tricks*/
    case 'tips':
         $context="Tips & Tricks";
        $to = filter_input(INPUT_GET, 'to');
        $from = filter_input(INPUT_GET, 'from');
        if (!isset($to)&& !isset($from)) {
            $to = 3;
            $from = 0;
        }
        $previous = $from - $to;
                $categories=$dataAceess->GetCategories();
        $tips = $dataAceess->View_Tips($from, $to);
        $total_records_count = $dataAceess->AllTipsRecords();
        $total_records = implode($total_records_count[0]);
        $from += $to;
        $postedTip =0;
            include '../Resources/View/ViewTips.php';   
       break; 
        
    case 'add_reading':
        $data_null = CheckIfCookiesExists("HouseNumber", "StreetName", "HouseID");
        if($data_null===FALSE){
            $house =array();
        $house[0] = $_SESSION['HouseNumber'];
          $house[1] = $_SESSION['StreetName'];
        $house_id = $_SESSION['HouseID'];
        $pic=null;
        $date_recorded = filter_input(INPUT_POST, 'readingDate');
        $reading = filter_input(INPUT_POST, 'reading');
        $feedback = $dataAceess->meter_readings( $date_recorded, $pic,$house_id,$reading);
        $context="Add Meter Reading";
        include '../Resources/View/RecordReadings.php';
        } else {
            $context="Log in";
            $user_details = 1;
            include '../Resources/View/log_in.php';
        }
        break; 
        
    case 'view_readings':
        $context="View Meter Readings";
        $data_null = CheckIfCookiesExists("HouseNumber", "StreetName", "HouseID");
        //code from cookies
        if($data_null===FALSE){
        $house =array();
        $house[0] = $_SESSION['HouseNumber'];
          $house[1] = $_SESSION['StreetName'];
        $house_id = $_SESSION['HouseID'];
       $fromDate = filter_input(INPUT_POST, 'fromDate');
       $toDate = filter_input(INPUT_POST, 'toDate');
       if (!isset($fromDate)||!isset($toDate)) {
           $fromDate = date("F j, Y ", strtotime("-1 months"));
           $toDate = date("F j, Y");
       }
       $readings = $dataAceess->get_readings($house_id, $fromDate, $toDate);
       $opening_balance = $readings[0][2];
       include '../Resources/View/ViewReadings.php';
        }else{
            $context="Log in";
             $user_details = 1;
            include '../Resources/View/log_in.php';
        }
       break;
        
    
    case'area_stats':
        $data_null = CheckIfCookiesExists("Email");
        if($data_null===FALSE){
        $context = "Area Statistics";
        //before calling the below retrieve user email using cookie approriate method
        $email = $_SESSION['Email'];
        $surbs = $dataAceess->Get_Suburbs();
        $addr_level = $dataAceess->area_stats($email);
        $water_charges = $dataAceess->area_water_charges($addr_level[0][2]);
        include '../Resources/View/area_stats.php';
        } else {
            $context="Log in";
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
    
        case 'post_tip':
        $data_null = CheckIfCookiesExists("PersonID");
        if($data_null===FALSE){
        $context = "Tips & Tricks";
        $personID= $_SESSION['PersonID'];
        $tip=filter_input(INPUT_POST,'postTip');
        $catID=filter_input(INPUT_POST,'cat');
        $approved=0; //in stored procedure
        $postedTip=$dataAceess->Post_Tip($personID,$tip,$catID,$approved);
        $to = filter_input(INPUT_GET, 'to');
        $from = filter_input(INPUT_GET, 'from');
        if (!isset($to)&& !isset($from)) {
            $to = 3;
            $from = 0;
        }
         $previous = $from - $to;
         $tips = $dataAceess->View_Tips($from, $to);
          $total_records_count = $dataAceess->AllTipsRecords();
        $total_records = implode($total_records_count[0]);
        include '../Resources/View/ViewTips.php';
        }else{
            $context="Log in";
            $user_details = 1;
            include '../Resources/View/log_in.php';
        }
    break;

    case 'water_usage':
        $data_null = CheckIfCookiesExists("HouseNumber", "StreetName", "HouseID");
        //code from cookies
        if($data_null===FALSE){
        $house =array();
        $house[0] = $_SESSION['HouseNumber'];
          $house[1] = $_SESSION['StreetName'];
        $house_id = $_SESSION['HouseID'];
       $fromDate = date("F j, Y ", strtotime("-1 months"));
           $toDate = date("F j, Y");
       $readings = $dataAceess->get_readings($house_id, $fromDate, $toDate);
       $opening_balance = $readings[0][2];
       $context ="Water Usage";
       include '../Resources/View/water_usage.php';
        }
        else{
            $context="Log in";
             $user_details = 1;
            include '../Resources/View/log_in.php';
        }
        break;

    case 'water_usage_custom':
        $data_null = CheckIfCookiesExists("HouseNumber", "StreetName", "HouseID");
        //code from cookies
        if($data_null===FALSE){
        $house =array();
        $house[0] = $_SESSION['HouseNumber'];
          $house[1] = $_SESSION['StreetName'];
        $house_id = $_SESSION['HouseID'];
       $fromDate = filter_input(INPUT_POST, 'min_date');
       $toDate = filter_input(INPUT_POST, 'max_date');
       $readings = $dataAceess->get_readings($house_id, $fromDate, $toDate);
       $opening_balance = $readings[0][2];
       $context = "Water Usage";
       include '../Resources/View/water_usage.php';
        }else{
             $user_details = 1;
            include '../Resources/View/log_in.php';
        }
        break;
        
    case'log_out':
        session_destroy();
        $_SESSION = array();
        $PersonID = NULL;
        $MainResidentID = NULL;       
        $context = "Welcome to Driplit";
        include '../Resources/View/LandingPage.php';
        break;
    
    case'add_resident':
        $context="Add a Resident";
        $email = filter_input(INPUT_POST,'email_add');
        $add_results = $dataAceess->check_user_existant($email);
        if($add_results!=NULL){
            $null_exists = CheckIfCookiesExists("HouseID");
            if($null_exists==FALSE){
                $houseID = $_SESSION["HouseID"];
            $add_results = $dataAceess->AddResident($email, $houseID);
            
            }else{
                $context="Log in";
                 $user_details = 1;
                include '../Resources/View/log_in.php';
            }
        }else{
            $add_results = FALSE;
        }
        $email_results = 0;
        
        include '../Resources/View/add_resident.php';
        break;
    case'email_resident':
        $context="Add a Resident";
        $email = filter_input(INPUT_POST,'email_reg');
        $email_results = $dataAceess->check_user_existant($email);
        if($email_results==NULL){
            $null_exist = CheckIfCookiesExists("FullName");
            if($null_exist==FALSE){
                $name = $_SESSION["FullName"];
                $message = "Hi there, \r\n $name has invited you to Join Driplit. Join now at:\r\n http:sict-iis.nmmu.ac.za/codecentrix/IT2/Controller/MainController.php ";
                $message = wordwrap($message,70,"\r\n");
                mail($email, "Invitation to Driplit", $message);
                $email_results = 1;
            }
        }
        break;
    
    default :
        include '../Resources/View/page_not_found.php';
        break;
}



 function CheckIfCookiesExists() {
  $is_non_existant = FALSE;
 $numOfParams = func_num_args();
 $parm_list = func_get_args();
 
 for($i=0; $i<$numOfParams;$i++){
     if(!isset($_SESSION[$parm_list[$i]])){
         $is_non_existant = TRUE;
         break;
     }
 }
 return $is_non_existant;
}

