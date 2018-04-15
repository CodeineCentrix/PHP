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
        $emps = new DBhelper();
       $employees = $emps ->run_simple_select();
       $records = count($employees);     
       for($i =0;$i<$records;$i++){
           $columns = count($employees[$i]);
           for($a =0;$a<$columns;$a++){
    echo $employees[$i][$a]."   ";    
           }
           echo " <br/> <br/>";
    }
       
        ?>
        </div>
    </body>
</html>
