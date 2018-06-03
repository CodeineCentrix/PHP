<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBHandler
 *
 * @author s217057098
 */
include '../DAL/DBAccess.php';

class DBHandler {
    //put your code here
    private  $DBaccess; 
    public function __construct() {
    $DBaccess = new DBAccess();
   
    }
  
   
    public function get_news_articles($from ,$to){
      /*
       * The from and the to are for pageination. Limits the news articles to
       * atleast 5 from page. 
       */
      header("../Resources/View/LandingPage.php");
      
    }
}
