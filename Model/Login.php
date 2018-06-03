<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 * Basically logins a person onto the site
 * 
 * @author Haich
 */
class Login {
    //put your code here
   private $username= null ;
   private $password = null;
   public function __construct($username = null, $password= null) {
        $this-> username = $username;
        $this-> password = $password;
    }
    
    function  login_user(){
        //Method needs to be flexible enough to return: 
        /* 0 - User not existant 
         * 1 - User does exist but is however blocked or deleted - Cater for later
         * 2 - User password is incorrect -  Cater for later
         * 3 - Return a valid users details. 
         */
        
         
    }
}
