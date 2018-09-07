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
        </script>
        <title>Add Rate Charge</title>
    </head>
    <body>
        <h2>Add Rate Charge</h2>
            <form action="../Controller/MainController.php?action=addRate" method="post">
            <table>
                <tr><th>Municipality</th><th>State</th></tr>
                <tr><td><select name="municipalId">
        <?php foreach ($municipalities as $municipality):?>
        <option value="<?php echo "$municipality[0]";?>"> <?php echo "$municipality[3]";?></option>
    <?php endforeach; ?>
            </select></td>
            
                <td><select name="state" >
            <?php foreach ($state as $st):?>
                        <option  value="<?php echo $st[0]; ?>" ><?php echo $st[1];?></option>
            <?php endforeach;?>
                    </select></td></tr>
                     <tr><th>Min</th><th>Max</th><th>Price</th></tr>
                    <?php for($i=0;$i<3;$i++):?>                                               
                        <tr>
                            <td><input type="number" step="any" name="min1<?php echo $i;?>"></td>
                            <td><input type="number" step="any" name="max1<?php echo $i;?>" ></td>
                            <td><input type="number" step="any" name="price<?php echo $i;?>"></td>
                        </tr>                       
                        <?php endfor;?>
                        <tr><td td colspan="3"><input type="submit" value="Add Rate Charge"></td></tr>
                            
                    </table>
        </form>
            
    </body>
             <script src="../Resources/Scripts/Scripts.js">
</html>
