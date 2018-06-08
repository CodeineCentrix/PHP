<?php

/**
 * Description of MainController
 *
 * @author s217057098
 */
include '../DAL/DBhelper.php';
include '../DAL/DBAccess.php';
$action = filter_input(INPUT_POST, 'action');
if ($action==NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action==NULL) {
        $context ="Welcome to Driplit";
        include "../Resources/View/LandingPage.php";
        exit();
    }
}
//$action = 'news';
/* Below is a really important section and this is the logic, if you're coding the interface this is where you'll get your data */
$dataAceess = new DBAccess(); 
$context = "Unkown location";
switch ($action){
    //   Page displaying/ request section 
    case 'login_page':
        $user_details= NULL;
        include '../Resources/View/log_in.php';
//        $credentials=
        break;
    
    case 'register_page':
        $cities= $dataAceess->Get_Cities();
        $suburbs=$dataAceess->Get_Suburbs();
        $feedback =0;
        include '../Resources/View/register_1.php';
        break;
    
    case 'reading_page' :
              $feedback=null;
        $house =array();
        $house[0] ="81";
          $house[1] ="Mzwazwa";
        // code from cookies
              include '../Resources/View/RecordReadings.php';
              break;
          
    case 'view_readings_page':
        $readings= array();
        // code from cookies
         $house =array();
        $house[0] ="12";
          $house[1] ="thuli";
        
        include '../Resources/View/ViewReadings.php';
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
            session_start();
            header("../Resources/View/LandingPage.php"); 
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
            $house =array();
        $house[0] ="785";
          $house[1] ="Ngwenya";
        $house_id = 11;
        $pic=null;
        $date_recorded = filter_input(INPUT_POST, 'readingDate');
        $reading = filter_input(INPUT_POST, 'reading');
        $feedback = $dataAceess->meter_readings( $date_recorded, $pic,$house_id,$reading);
        include '../Resources/View/RecordReadings.php';
        break; 
        
    case 'view_readings':
        //code from cookies
        $house =array();
        $house[0] ="785";
        $house[1] ="Ngwenya";
        $house_id = 11;
       $fromDate = filter_input(INPUT_POST, 'fromDate');
       $toDate = filter_input(INPUT_POST, 'toDate');
       $readings = $dataAceess->get_readings($house_id, $fromDate, $toDate);
       include '../Resources/View/ViewReadings.php';
       break;
        
    case 'custom_reading':
        $user_id = filter_input(INPUT_POST, 'user_placeholder');
        $start_date = filter_input(INPUT_POST, 'start_date_placeholder');
        $end_date = filter_input(INPUT_POST, 'end_date_placeholder');
        $custom_reading = $dataAceess->custom_meter_readings($user_id, $start_date, $end_date);
        break;
    
   
    
    
    case 'graph_data':
      $user_id = filter_input(INPUT_POST, 'user_id_placeholder');
      $graph_data = $dataAceess->graph_data($user_id);
    break;


    case 'custom_graph_data':
        $user_id = filter_input(INPUT_POST, 'user_id_placeholder');
        $start_date = filter_input(INPUT_POST, 'start_date_placeholder');
        $end_date = filter_input(INPUT_POST, 'end_date_placeholder');
        $graph_data = $dataAceess->custom_graph_data($user_id, $start_date, $end_date);
        break;
    
    case'area_stats':
        $context = "Area Statistics";
        //before calling the below retrieve user email using cookie approriate method
        $surbs = $dataAceess->Get_Suburbs();
        $addr_level = $dataAceess->area_stats("ggMA@gogo.com");
        $water_charges = $dataAceess->area_water_charges($addr_level[0][2]);
        include '../Resources/View/area_stats.php';
        break;
    
    
    case'area_stats_custom':
        $suburb_id = filter_input(INPUT_POST, 'areas');
        $context = "Area Statistics";
         $surbs = $dataAceess->Get_Suburbs();
         $addr_level= $dataAceess->custom_area_stats($suburb_id);
         $water_charges = $dataAceess->area_water_charges($addr_level[0][2]);
         include '../Resources/View/area_stats.php';
        break;
    
    case 'tips_tricks':
        $to = filter_input(INPUT_POST, 'to_placeholder');
        $from = filter_input(INPUT_POST, 'from_placeholder');
        $tips_tricks = $dataAceess->view_tips_tricks($to, $from);
        break;
    
    case 'tips_tricks_add':
         $user_id = filter_input(INPUT_POST, 'user_id_placeholder');
        $comment = filter_input(INPUT_POST, 'start_date_placeholder');
        $tips_trick_feedback = $dataAceess->add_tip_tricks($user_id, $comment);
        break;
}
