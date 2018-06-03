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
    
    public function get_news_items($to, $from) {
        $param = array(
            $to,
            $from
                
        );        
        return DBhelper::sp_SelectWithParams("stored_procedure", $param);
    }
    
}
