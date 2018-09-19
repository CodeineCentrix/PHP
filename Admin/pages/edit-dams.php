<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <script src="../Resources/Scripts/Scripts.js">
        </script>
        <title>Edit Dam</title>
    </head>
    <body>
        <h2>Update <?php echo $damName ;?> dam</h2> 
         <form action="../Controller/MainController.php?action=updateStandAloneDam" method="post">
        <table>
            <tr><td>Dam Name:</td><td><input required type="text" value="<?php echo $damName; ?>" name="damName"</td></tr>
            <tr><td>Dam Level:</td><td><input required type="number" step="any" value="<?php echo $damLevel; ?>" name="damLevel"></td></tr>
            <input type="hidden" value="<?php echo $damId ;?>" name="damId">
            <tr><td><input type="submit" value="Save Changes"></td></tr>
                  
        </table>
        </form>
    </body>
</html>
