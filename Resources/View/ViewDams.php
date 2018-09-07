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
         <script src="../Resources/Scripts/Scripts.js"></script>
        <title>View Dams</title>
    </head>
    <body class="MainRes">
        <h2>View Dams Information</h2>
        <table  id="table" name="General" style="width: 50%">
            <tr><th>Dam Name</th>
                <th>Dam Level</th>
                <th>Edit</th>
                <th>Delete</th>
       
            </tr>
            <?php foreach ($dams as $dam): ?>
            <tr><td><?php echo $dam[1] ;?></td>
            <td><?php echo $dam[2] ;?></td>
            
            <td><form method="post" action="../Controller/MainController.php?action=updateStandAloneDam-page">
        <input type="hidden" name="damId" value="<?php echo $dam[0];?>">
        <input type="hidden" name="damName" value="<?php echo "$dam[1]";?>">
        <input type="hidden" name="damLevel" value="<?php echo "$dam[2]";?>">

        <input type="image" src="../Resources/Images/pencil-edit-button.png">
    </form>
</td>  
 <td><form method="post" action="../Controller/MainController.php?action=delete-dam">
        <input type="hidden" name="damId" value="<?php echo $dam[0];?>">
        <input type="hidden" name="damName" value="<?php echo "$dam[1]";?>">
        <input type="hidden" name="damLevel" value="<?php echo "$dam[2]";?>">

        <input type="image" src="../Resources/Images/rubbish-bin.png">
    </form>
</td>  
            </tr>  
            <?php endforeach;?>
        </table>
        <br>
        <br>
        <label style=" color: dodgerblue; cursor: pointer" name="addDam" onclick="AddDam()">Add dam</label>
        <form action="../Controller/MainController.php?action=add-dam" method="post">
        <table id="addDamTable" style="display:none">
            <tr><td>Dam Name:</td><td><input required type="text" autofocus name="damName"</td></tr>
            <tr><td>Dam Level:</td><td><input required type="number" step="any" name="damLevel"></td></tr>
            <tr><td><input type="submit" value="Add Dam"></td></tr>
                  
        </table>
        </form>
       
    </body>
</html>
