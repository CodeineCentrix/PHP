<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
        <?php
        include 'DBhelper.php';
        
       $employees= DBhelper::run_simple_select();
       print_r($employees)
        ?>
        </div>
    </body>
</html>
