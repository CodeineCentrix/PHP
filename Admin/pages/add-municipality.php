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
        <title>Add Municipality</title>
    </head>
    <body>
        <h2>Add Municipality</h2>
        <form action="../Controller/MainController.php?action=add-municipality" method="post">
         <table>
            <tr><td>
                    <label>Municipality:</label></td>
                
                <td> <input type="text" name="muniName" autofocus placeholder="Type in municipality name">
                    </td></tr>
            
            
            
              <tr>  <td>
                <label>Main Dam:</label></td>
            <td> <select name="dams" >
            <?php foreach ($dams as $dam):?>
                    <option value="<?php echo $dam[0]; ?>" ><?php echo $dam[1];?></option>
            <?php endforeach;?>
                </select></td></tr>
              <tr><td>Dam Level:</td>
                  <td><input type="number" step="any" name="damLevel"></td></tr>
                
        <tr><td>State:</td>
                <td><select name="state" >
            <?php foreach ($state as $st):?>
                        <option  value="<?php echo $st[0]; ?>" ><?php echo $st[1];?></option>
            <?php endforeach;?>
                </select></td></tr>
        <tr>    <td colspan="2">                <input type="submit" value="Add Municipality"></td>
</tr>
        </table>

    </form>
    </body>
</html>
