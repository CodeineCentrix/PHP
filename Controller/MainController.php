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
        include "../Resources/View/LandingPage.php";
        exit();
    }
}
//$action = 'news';
/* Below is a really important section and this is the logic, if you're coding the interface this is where you'll get your data */
$dataAceess = new DBAccess(); 
switch ($action){
    //   Page displaying/ request section 
    case 'login_page':
        include '../Resources/View/Login.php';
        break;
    
    case 'register_page':
        include '../Resources/View/register_1.php';
        break;
    // End Page displaying/ request  section 
    
    
    
    
    case 'login':
        $username = filter_input(INPUT_POST, 'placeholder_username');
        $password = filter_input(INPUT_POST, 'placeholder_password');
        $user_details = $dataAceess->login($username, $password);
        if ($user_details==NULL) {
           $login_issues = "Username or Password isn't valid.";
        } else {
          //Display page and create a session for a user (ALL Logic for a valid user)
          session_start();
        }
        break;
        
        
        
        
    case 'register_resident':
         $fullname = filter_input(INPUT_POST, 'lastname');       
         $email = filter_input(INPUT_POST, 'email');
         $password = filter_input(INPUT_POST, 'psw');
         $deleted = 0;
         $is_existant = $dataAceess->check_user_existant($email);
         if ($is_existant==NULL) {
            $is_user_registered = $dataAceess->Register($fullname, $email, $password, $deleted);
            include '../Resources/View/register_1.php';
         }
         else{
            include '../Resources/View/register_1.php';
         }
          
        break;
      
    
    
    
    case 'news':
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
    
        
        
    case 'meter_readings':
        $user_id = filter_input(INPUT_POST, 'user_placeholder');
        $readings = $dataAceess->meter_readings($user_id);
        break;
        
    case 'custom_reading':
        $user_id = filter_input(INPUT_POST, 'user_placeholder');
        $start_date = filter_input(INPUT_POST, 'start_date_placeholder');
        $end_date = filter_input(INPUT_POST, 'end_date_placeholder');
        $custom_reading = $dataAceess->custom_meter_readings($user_id, $start_date, $end_date);
        break;
    
    case 'add_reading':
        $user_id = filter_input(INPUT_POST, 'user_id_placeholder');
        $date_recorded = filter_input(INPUT_POST, 'date_placeholder');
        $reading = filter_input(INPUT_POST, 'reading_placeholder');
        $results = $dataAceess->add_reading($user_id, $date_recorded, $reading);
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
         $user_id = filter_input(INPUT_POST, 'user_id_placeholder');
        $area_stats = $dataAceess->area_stats($user_id);
        $combobox_data = $dataAceess->area_stats_combobox();
        break;
    
    
    case'area_stats_custom':
         $to = filter_input(INPUT_POST, 'to_placeholder');
        $from = filter_input(INPUT_POST, 'from_placeholder');
         $area_stats_custom = $dataAceess->area_stats_custom($user_id, $surburb);
         $combobox_data = $dataAceess->area_stats_combobox();
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
