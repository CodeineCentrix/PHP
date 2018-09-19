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
        <title></title>
    </head>
    <body>
       
        <table>
            <tr><td>Tip</td><td>Approve</td></tr>
             <?php foreach ($unapprovedTips as $tips): ?>
            <tr><td><?php echo $tips[4]; ?></td> 
                <td><form action="../Controller/MainController.php?action=approve-tips" method="post">
                <input type="hidden" name="tipId" value="<?php echo $tips[0];?>" >
                <input type="image" src ="../Resources/Images/approve.png" alt="Approve">  </form></td></tr>
            <?php endforeach;?>
        </table>
    </body>
</html>
