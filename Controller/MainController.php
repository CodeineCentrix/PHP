<?php

/**
 * Description of MainController
 *
 * @author s217057098
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
        include '../Resources/View/login_V2.php';
        break;
    
    case 'register_page':
        $context= "Register";
        $cities= $dataAceess->Get_Cities();
        $suburbs=$dataAceess->Get_Suburbs();
        $feedback =0;
        $exists = FALSE;
        include '../Resources/View/register.php';
        break;
    
    //Admin page view municipalities
    case 'dams-content':
       $municipalities=$dataAceess->Get_Municipality();
       $damInfo=$dataAceess->Get_DamInformation();

       $municipalId= filter_input(INPUT_POST, 'municipalitySrch');
        if (isset($municipalId)) {
        $damInfo=$dataAceess->Get_DamInfo($municipalId);}
      
        include '../Admin/blank.php';
        break;
        
    case 'add-municipality-page':
        $dams=$dataAceess->Get_Dams();
        $state=$dataAceess->Get_State();
        include '../Admin/blank.php';
        break;
    
    
    case 'add-municipality':
            $name=filter_input(INPUT_POST, 'muniName');
            $damId= filter_input(INPUT_POST, 'dams');
            $stateId=filter_input(INPUT_POST, 'state');
            $damLevel=filter_input(INPUT_POST, 'damLevel');
            
            $municipality=$dataAceess->Add_Municipality($damId, $stateId, $name, $damLevel);
                    
       $damInfo=$dataAceess->Get_DamInformation();

        include '../Admin/blank.php';
        break;
        
        //Admin Update Municipality page
    case 'updateMunicipality-page':
        $update=0;
        $municipalId= filter_input(INPUT_POST, 'municipalityId');
        $municipalName=filter_input(INPUT_POST,'municipalName');
         
        $dams=$dataAceess->Get_Dams();
        $state=$dataAceess->Get_State();
        $municipalities=$dataAceess->Get_Municipality();
  
         if (isset($municipalId)) {
        $damInfo=$dataAceess->Get_DamInfo($municipalId);
        $municipalities=$dataAceess->Get_Municipality();

        }
        include '../Admin/blank.php';
        break;
        
        //actual update
    case 'updateMunicipality':
            $muniId = filter_input(INPUT_POST, 'municipalitySrch');
            $name=filter_input(INPUT_POST, 'municipalName');
            $damId= filter_input(INPUT_POST, 'dams');
            $state=filter_input(INPUT_POST, 'state');
            $damLevel=filter_input(INPUT_POST, 'damLevel');
            $update=$dataAceess->update_municipality($muniId,$damId,$state,$name);
            $updateDam=$dataAceess->update_damLevel($damId, $damLevel);
       $damInfo=$dataAceess->Get_DamInformation();
        $municipalities=$dataAceess->Get_Municipality();

        include '../Admin/blank.php';
        break;
                
        //Admin View Dams page
    case 'view-dams':
        $dams= $dataAceess->Get_Dams();
        include '../Admin/blank.php';
        break;
    
    case 'updateDam':
         $damLevel=filter_input(INPUT_POST, 'damLevel');
         $damId= filter_input(INPUT_POST, 'dams');
         $updateDam=$dataAceess->update_damLevel($damId, $damLevel);
        include '../Admin/blank.php';
        break;
     
    case 'delete-dam':
        $damId= filter_input(INPUT_POST, 'damId');
        $result= $dataAceess->Delete_Dam($damId);
        $dams= $dataAceess->Get_Dams();
        include '../Admin/blank.php';
        break;
    
    case 'add-dam':
         $damLevel=filter_input(INPUT_POST, 'damLevel');
         $damName= filter_input(INPUT_POST, 'damName');
         $addDam=$dataAceess->Add_Dam($damName, $damLevel);
                 $dams= $dataAceess->Get_Dams();

        include '../Admin/blank.php';
        break;
        
      case 'updateStandAloneDam-page':
                   $damId= filter_input(INPUT_POST, 'damId');
                   $damName=filter_input(INPUT_POST,'damName');
                   $damLevel=filter_input(INPUT_POST, 'damLevel');
        include '../Admin/blank.php';
        break;
     
     case 'updateStandAloneDam':
         $damLevel=filter_input(INPUT_POST, 'damLevel');
         $damId= filter_input(INPUT_POST, 'damId');
         $damName=filter_input(INPUT_POST,'damName');
         $updateDam=$dataAceess->Update_Dam($damId,$damName, $damLevel);
         $dams= $dataAceess->Get_Dams();

        include '../Admin/blank.php';
        break;
         
    case 'addRateCharge-page':
        $municipalities=$dataAceess->Get_Municipality(); 
        $state=$dataAceess->Get_State();
        include '../Admin/blank.php';
        break;
    
    case 'addRate':
        $muniId= filter_input(INPUT_POST, 'municipalId');
        $stateId=filter_input(INPUT_POST, 'state');
       
        for ($i=0;$i<3;$i++) {
         $min1=filter_input(INPUT_POST, 'min1'.$i);
        $max1=filter_input(INPUT_POST, 'max1'.$i);
        $pice=filter_input(INPUT_POST,'price'.$i);
        $result=$dataAceess->Add_RateCharge($pice, $min1, $stateId, $muniId, $max1);
        }
       $municipalities=$dataAceess->Get_Municipality(); 
        $state=$dataAceess->Get_State();
        include '../Admin/blank.php';
        break;
     
    case 'searchRate-page':
        $municipalities=$dataAceess->Get_Municipality(); 
        $state=$dataAceess->Get_State();

       
        include '../Admin/blank.php';
        break;

    case 'edit-rateCharge-page':
                $muniId= filter_input(INPUT_POST, 'muniId');
                $stateId= filter_input(INPUT_POST, 'stateId');
         $rate=$dataAceess->SearchRateCharge($muniId,$stateId);
        include '../Admin/blank.php';
    break;

    case 'edit-rateCharge':
         $muniId= filter_input(INPUT_POST, 'muniId');
         $stateId= filter_input(INPUT_POST, 'stateId');
         for ($i=0;$i<4;$i++) {

        $min=filter_input(INPUT_POST, 'min'.$i);
        $max=filter_input(INPUT_POST, 'max'.$i);
        $price=filter_input(INPUT_POST,'price'.$i);
         $rateCharge=$dataAceess->Update_RateCharge($min, $max, $price, $muniId,$stateId);
         
         }
          $municipalities=$dataAceess->Get_Municipality(); 
        $state=$dataAceess->Get_State();
        include '../Admin/blank.php';
        break;
        
    case 'unapprovedTips-page':   
        $unapprovedTips=$dataAceess->Get_UnapprovedTips();
        include '../Admin/blank.php';
        break;
    
    case 'approve-tips':
        $tipId= filter_input(INPUT_POST, 'tipId');
        $approve=$dataAceess->Approve_Tip($tipId);
        $unapprovedTips=$dataAceess->Get_UnapprovedTips();
        include '../Admin/blank.php';
        break;
    
    case'rej_tips':
        $tipId= filter_input(INPUT_POST, 'tipId');
        $rejected = $dataAceess->reject_tips_tricks($tipId);
        header("Location: MainController.php?action=unapprovedTips-page");
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
        
    case 'admin_dashboard':
        $admin_overview = $dataAceess->getAdminOverviewData();
        $action = 'admin_dashboard';
        include '../Admin/blank.php';
        break;
    
    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $user_details = $dataAceess->Login($email, $password);
        if($user_details==NULL){
            $admin_details = $dataAceess->LoginAdmin($email, $password);
            if($admin_details!=NULL){
                $admin_overview = $dataAceess->getAdminOverviewData();
                //The person is an admin, send directly to admin page
                $_SESSION["AdminID"] = $admin_details[0][0];
                $_SESSION["Password"]  = $admin_details[0][1];
                $_SESSION["Username"]  = $admin_details[0][2];
                $action="admin_dashboard";
                include '../Admin/blank.php';
            }else{
            $user_details= FALSE;
            $context="Log in";
            
            include '../Resources/View/login_V2.php';
            }
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
             $_SESSION["CityID"] = $user_details[0][13];
            $context="Welcome to Driplit";
            $guider = TRUE;
            include '../Resources/View/LandingPage.php';

        }
        
        break;
    case 'edit_profile_page':
        $context ="Edit Profile";
        $feedback = NULL;
        $exists= NULL;
        $cities= $dataAceess->Get_Cities();
        $suburbs=$dataAceess->Get_Suburbs();
        include '../Resources/View/edit_profile.php';
        break;
   
    case'edit_profile':
        $context="Edit Profile";
        $fullname = filter_input(INPUT_POST, 'lastname');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'psw');
        $city = filter_input(INPUT_POST, 'Cities');
        $suburb = filter_input(INPUT_POST, 'Suburbs');
        $house_number = filter_input(INPUT_POST, 'housenumber');
        $street_name = filter_input(INPUT_POST, 'streetname');
        $isMainResident = filter_input(INPUT_POST, 'ResType');
        $number_of_residents = filter_input(INPUT_POST, 'residents');
        $change_address = filter_input(INPUT_POST, 'change_address');
            if(!isset($change_address)){
             $eddited = $dataAceess->UpdateResident($fullname, $email, $password, $street_name, 1);
            }else{
              $eddited = $dataAceess->UpdateResident($fullname, $email, $password, $street_name, 0);
              if(isset($isMainResident)){
                  $house_added = $dataAceess ->UpdateResidentHouse($email, $house_number, $street_name, $suburb, $NumberOfResidents, 1);
                  $feedback = $house_added;
              }else{
                  $house_added = $dataAceess ->UpdateResidentHouse($email, $house_number, $street_name, $suburb, $NumberOfResidents, 0);
                  $feedback = $house_added;
              }
              
            }
          $feedback = $eddited;
        $exists = NULL;
         include '../Resources/View/edit_profile.php';
       break;
   
    case 'register_resident':
        $context="Register";
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
           include '../Resources/View/register.php';
         } else {
            $exists = TRUE;
            $feedback = -1;
        $cities= $dataAceess->Get_Cities();
        $suburbs=$dataAceess->Get_Suburbs();
        include '../Resources/View/register.php';
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
        
    /*View  tricks*/
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
        if(isset($date_recorded)!=NULL && isset($reading)!=NULL){
            $reading = (int) $reading;
          //  die("House ID ->".$house_id." Date Recordered -> ".$date_recorded."  Meter Reading ->  ".$reading);
        $isReadingValid = $dataAceess->ValidateReadingValue($house_id, $date_recorded, $reading);
      //die(print_r($isReadingValid));
        if($isReadingValid[0][0]===0 && ($isReadingValid[0][1] ===0||$isReadingValid[0][1]===NULL )){
           //Send 
             $feedback = $dataAceess->meter_readings( $date_recorded, $pic,$house_id,$reading);
       } elseif($isReadingValid[0][1] === 0 && ($isReadingValid[0][0] === 0 ||$isReadingValid[0][0] ===NULL )){
           //Send 
            $feedback = $dataAceess->meter_readings( $date_recorded, $pic,$house_id,$reading);
       }elseif($isReadingValid[0][0]===1){
           $isReadingValid = 2;
           $message = "Too small";
       }elseif ($isReadingValid[0][1] ===1) {
           $isReadingValid =3;
               $message = "Too big";     
        }
        
        }
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
           $fromDate = date("F j, Y", strtotime("-1 months"));
           $toDate = date("F j, Y");
       }
       $readings = $dataAceess->get_readings($house_id, $fromDate, $toDate);
       if(isset($reading[0][2])){
          $opening_balance=  0; 
       }
      
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
      if(isset($reading[0][2])){
          $opening_balance=  0; 
       }
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
       if(isset($reading[0][2])){
          $opening_balance=  0; 
       }
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
               $right = filter_input(INPUT_POST, 'chkRights');
               if(!isset($right)){
                 $right = 0;  
               }
                $houseID = $_SESSION["HouseID"];
            $add_results = $dataAceess->AddResident($email, $houseID,$right);
            
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
                //Add libraries
                require '../PHPMailer-master/src/Exception.php';
                require '../PHPMailer-master/src/PHPMailer.php';
                require '../PHPMailer-master/src/SMTP.php';
            //create and prepare mailing objects
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAutoTLS = false;
                $mail->Host = 'smtp.gmail.com'; 
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Username = 'centrixcode@gmail.com'; 
                $mail->Password = 'codecentrix@4';
                $mail->Port = 465; 
                $mail->SetFrom("centrixcode@gmail.com"); 
                $mail->AddAddress($email);
                $mail->Subject = "Help us save water invitation";
                $mail->Body = "I really wanna know if this works";
                
                if(!$mail->Send()){
                    $error = $mail->ErrorInfo;
                }else{
                    $error = "Mail Sent!";
                }
                include '../Resources/View/add_resident.php';
            }
            //Get user details once again 
        }
        break;
        
    case 'revoke_page':
        $context = "Revoke Rights";
        $main_resident_id = $_SESSION["MainResidentID"];
        $roomies = $dataAceess->getRoomies($main_resident_id);
        include '../Resources/View/revoke_rights.php';
        break;
    
    case 'revoke_person':
        $context = "Revoke Rights";
        $person_id = filter_input(INPUT_POST, 'cmbMates');
        $person_name = filter_input(INPUT_POST, 'txtperson_name');
        $is_removed = $dataAceess->revokeRoomiesRights($person_id);  
        $main_resident_id = $_SESSION["MainResidentID"];
        $roomies = $dataAceess->getRoomies($main_resident_id);
        if($is_removed ==TRUE){
            $moved = "Successfully removed ". $person_name;
        }else{
            $moved = "We weren't able to revoke resident right for ".$person_name.". Try again.";
        }
        include '../Resources/View/revoke_rights.php';
        break;
        
        case'news_page':
            $saved = filter_input(INPUT_POST, 'saved');
            $removable = $dataAceess->get_removable_articles();
            include '../Admin/blank.php';
            break;
        
        case'add_article':
            //get posted data
            $article_title = filter_input(INPUT_POST, 'article_title');
            $article_author = filter_input(INPUT_POST, 'article_author');
            $article_body = filter_input(INPUT_POST, 'article_body');
            $current_timestamp = date('Y-m-d_His');
            //Save image first
            $upFile = '../Resources/ArticleImages/'.$_FILES['fp_article_image']['name'];
            $saved = FALSE;
		if(is_uploaded_file($_FILES['fp_article_image']['tmp_name'])) {
		 if(!move_uploaded_file($_FILES['fp_article_image']['tmp_name'], $upFile)) {
		 echo 'Problem could not move file to destination. Please check again later.';
		 exit;
		 }
		 else{
		$saved= TRUE;	 
		 }
		 }
                 $imageDirectory = $upFile;
            //Save text file
            if($saved===TRUE){
                $article_up = '../Resources/ArticleNews/article'.$current_timestamp.'.txt';
                $myfile = fopen($article_up, "w") or die("Authorization issues have caused this crash");
		fwrite($myfile, $article_body);
		fclose($myfile);
            }
            
            //Then add to database if everything is successfull
            //Method needs actual parameters!!
            $successfully_added = $dataAceess->AddNewsArticle("Article Image", $imageDirectory, NULL, $article_title, "Water related articles", date('Y/m/d'),$article_up,$article_author);
            //$action = 'news_page';
           // include '../Admin/blank.php';
            header("Location: MainController.php?action=news_page&saved=11");
            break;
            
            case'del_article':
                $article_id = filter_input(INPUT_POST, 'art_id');
                $art_body = filter_input(INPUT_POST, 'art_bdy');
                $art_img = filter_input(INPUT_POST, 'art_pic');
                $del = $dataAceess->remove_article($article_id);
                unlink($art_body);
                unlink($art_img);
                header("Location: MainController.php?action=news_page");
                break;
            
            case'get_articles':
             
            $from = 0;
                $page = filter_input(INPUT_POST, 'page');
                if ($page != 1){ 
                    $from = ($page-1) * 4;                   
                }
                 else{
                     $from=0;                     
                 }                
            $total_records_count = $dataAceess->AllNewsRecords();
            $news = $dataAceess->get_news_items(4, $from);
                $numPage = ceil($total_records_count[0][0]/4);
                $drawNews = "";
                $i= 0;
                $article_body = NULL;
                foreach($news as $value){
                    if(isset($value[8])){
                    $article_link = fopen($value[8],"r") or die("Isssue oppening directory");
                    $article_body = fread($article_link, filesize($value[8]));
                    fclose($article_link);
                    }
                $drawNews .= "<div class='news_item center_tag'>"
                        . "<div class='news_item_image'>"
                        ."<img style='object-fit: contain; height:inherit; width: 100%;' src='$value[7]' alt='$value[6]'>". "</div>". "<div class='news_item_details'>". "<div class='news_item_title'>". "<h3 class='news_title' style='font-size:30px;'>$value[0]</h3>". "</div>". "<div class='news_item_creds'>". "<label class='author'>$value[9]</label><br>". "<label class='news_date'>".date_format($value[4], 'jS, F Y')."</label><br><br>". "</div>". "</div>". "<div class='news_item_desc'>". "<div style='display: none; animation-name: slower; animation-duration: 5s;' id='A".$i."'>$article_body</div>"  
                        . "<input type='button' class='registerbtn' value='Read or Hide' id='btnRead' onclick=\"ReadOrShowItem('".'A'.$i."')\"/>"
                        . "</div>" 
                        . "</div>"; 
                  $i++;
                }
                if(count($news)<0){
                    $drawNews = "Oops, we are out of these";
                }
                $return_data = array('numPage' => $numPage,
                    'content' => utf8_encode($drawNews)
                    );
                $return_data = json_encode($return_data);
                echo $return_data;
                break;
            
            case 'tip_trick':
                $from = 0;
                $page = filter_input(INPUT_POST, 'page');
                if ($page != 1){ 
                    $from = ($page-1) * 4;                   
                }
                 else{
                     $from=0;                     
                 }
                 $total_records_count = $dataAceess->AllTipsRecords();
                 $tips = $dataAceess->View_Tips($from, 4);
                 $drawHTML= "";
                 foreach ($tips as $value) {
                    $drawHTML.="<div class='tipscontainer'>"
                             . "<img src='../Resources/Images/head.png' alt='Avatar' style='width:90px'>"
                             . "<p><span>$value[0]</span><span style='font-size:small' title='Tip Category'>$value[3]</span><span name='date' class='date'>"
                             . "<i>".date_format($value[2], 'jS, F Y')."</i></span></p>"
                             . "<p>$value[1]</p>"
                             . "</div>";                    
                 }
                 if(isset($news)){
                     $drawHTML= "Looks as if you've reached the end of our collection";
                 }
                 $numPage = ceil(($total_records_count[0][0]/4));
                 $return_data = array("numPage"=> $numPage, "content"=>$drawHTML);
                 $return_data = json_encode($return_data);
                 echo $return_data;
            break;
    case'user_reports':
        $context = 'Reports';
    $min_date = filter_input(INPUT_POST, 'min_date');
    $max_date = filter_input(INPUT_POST, 'max_date');
    $house_id = 3;
    if(isset($min_date)&& isset($max_date)){
       
        $lines = $dataAceess->pdf_invoicer($max_date, $min_date, $house_id);
        $visited = true;
    }
    include '../Resources/View/reports.php';
    break;
    
    case 'check_main_resident':
        $house_number = filter_input(INPUT_POST, 'house_num'); 
        $street_name = filter_input(INPUT_POST, 'street_name'); 
        $suburb_id = filter_input(INPUT_POST, 'suburb_id');
        $main_resident = $dataAceess->check_main_residence($house_number, $street_name, $suburb_id);
       // $main_resident = $dataAceess->check_main_residence("81", "Mzwazwas", "5000");
        $person = NULL;
       if(count($main_resident)<1 ){
           $found = FALSE;
       }else{
          $found = TRUE;
          $person = $main_resident[0][0];
       }
       
        $return_data = array("valid"=> $found, "resident"=> $person);
        $return_data = json_encode($return_data);
        echo $return_data;
        break;
        
    case 'city_usage':
        $user_city = filter_input(INPUT_POST, 'cities');
        $city_data = $dataAceess->usage_by_city($user_city);
         $cities= $dataAceess->Get_Cities();
         include '../Admin/blank.php';
        break;
    
    case 'invoicer':
        $start_date = filter_input(INPUT_POST, '');
        $end_date = filter_input(INPUT_POST, '');
        $house_id = filter_input(INPUT_SESSION, '');
        $lines = $dataAceess->pdf_invoicer($end_date, $start_date, $house_id);
        include '../Resources/View/reports.php';
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

