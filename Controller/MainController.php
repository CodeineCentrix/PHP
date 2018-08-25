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
        include '../Resources/View/log_in.php';
        break;
    
    case 'register_page':
        $context= "Register";
        $cities= $dataAceess->Get_Cities();
        $suburbs=$dataAceess->Get_Suburbs();
        $feedback =0;
        $exists = FALSE;
        include '../Resources/View/register_1.php';
        break;
    
    //Admin page on general content
    case 'dams-content':
       $municipalities=$dataAceess->Get_Municipality();
       $municipalId= filter_input(INPUT_POST, 'municipalitySrch');
        if (isset($municipalId)) {
        $damInfo=$dataAceess->Get_DamInfo($municipalId);}
        else{
        $damInfo=$dataAceess->Get_DamInformation();}
        include '../Resources/View/adminViewMunicipalities.php';
        break;
        
        //Admin Update Municipality
    case 'updateMunicipality-page':
        $municipalId= filter_input(INPUT_POST, 'municipalityId');
        $municipalName= filter_input(INPUT_POST, 'municipalName');
        $dams=$dataAceess->Get_Dams();
        $state=$dataAceess->Get_State();
        $damInfo=$dataAceess->Get_DamInfo($municipalId);
        include '../Resources/View/EditMunicipality.php';
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
           include '../Resources/View/register_1.php';
         } else {
            $exists = TRUE;
            $feedback = -1;
        $cities= $dataAceess->Get_Cities();
        $suburbs=$dataAceess->Get_Suburbs();
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
        $isReadingValid = $dataAceess->ValidateReadingValue($house_id, $date_recorded);
        if($reading >= $isReadingValid[0][0]){
        $feedback = $dataAceess->meter_readings( $date_recorded, $pic,$house_id,$reading);
        
        }else{
           $isReadingValid = $isReadingValid[0][0];
              $message = "The reading for $date_recorded as $reading is too low for the date... Lowest = $isReadingValid";
        }}
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
            $successfully_added = $dataAceess->AddNewsArticle("Article Image", $imageDirectory, NULL, $article_title, "Water related articles", date('Y/m/d'),$article_up);
            $action = 'news_page';
            include '../Admin/blank.php';
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
                foreach($news as $value){
                $drawNews .= "<div class='news_item center_tag'>"
                        . "<div class='news_item_image'>". 
                        "<img style='object-fit: contain; height:inherit; width: 100%;' src='$value[7]"."$value[6]' alt='$value[6]'>". "</div>". "<div class='news_item_details'>". "<div class='news_item_title'>". "<h3 class='news_title' style='font-size:30px;'>$value[0]</h3>". "</div>". "<div class='news_item_creds'>". "<label class='author'>$value[9]</label><br>". "<label class='news_date'>".date_format($value[4], 'jS, F Y')."</label><br><br>". "</div>". "</div>". "<div class='news_item_desc'>". "<div style='display: none; animation-name: slower; animation-duration: 5s;' id='A".$i."'>$value[1]</div>"  
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

