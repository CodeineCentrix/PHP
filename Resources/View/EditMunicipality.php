<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Municipalities</title>

    </head>
    <body>
                 <script src="../Resources/Scripts/Scripts.js"></script>

        <form method="post" action="">
            <table>
          <?php if (isset($municipalId)): ?>  
            
            <h1> Update <?php echo $damInfo[0][0] ;?> Municipality Information</h1>
            
             <tr><td>  <label>Municipality Name:</label></td>
                 <td> <input type="text" name="municipalName" id="MunicipalName" value="<?php echo $municipalName; ?>"></td>
            </tr>
            <tr>  <td>
                <label>Main Dam:</label></td>
            <td> <select name="dams" >
            <?php foreach ($dams as $dam):?>
                    <option selected="<?php echo damInfo[0][0];?>" value="<?php echo $dam[0]; ?>" ><?php echo $dam[1];?></option>
            <?php endforeach;?>
                </select></td></tr>
            
             <tr><td>Dam Level:</td>
                 <td><input type="text" name="damLevel" value="<?php echo $damInfo[0][1];?>"></td></tr>

             <tr><td>State:</td>
                <td><select name="state" >
            <?php foreach ($state as $st):?>
                        <option value="<?php echo $st[0]; ?>" selected="<?php echo $damInfo[0][3];?>"><?php echo $st[1];?></option>
            <?php endforeach;?>
                </select></td></tr>
            
            </table>
            
           <?php else:?>
                    <h1> Update Municipality Information</h1>

        
            <!--If content manager did not select edit municipality from view municipalities load a 
            municipality combo box so she can select the municipality she wants to edit -->
            <table>
            <tr><td>
                    <label>Municipality:</label></td>
                
                <td><select name="municipalitySrch">
            <?php foreach ($municipalities as $municipality):?>
                        <option selected=" " value="<?php echo "$municipality[0]";?>"> <?php echo "$municipality[3]";?></option>
            <?php endforeach; ?>
                        </select>
                    </td></tr>
            
             <tr><td>  <label>Municipality Name:</label></td>
                <td> <input type="text" name="municipalName" id="MunicipalName"></td>
            </tr>
            
              <tr>  <td>
                <label>Main Dam:</label></td>
            <td> <select name="dams" >
            <?php foreach ($dams as $dam):?>
                    <option value="<?php echo $dam[0]; ?>" ><?php echo $dam[1];?></option>
            <?php endforeach;?>
                </select></td></tr>
              <tr><td>Dam Level:</td>
                  <td><input type="text" name="damLevel"></td></tr>
                
        <tr><td>State:</td>
                <td><select name="state" >
            <?php foreach ($state as $st):?>
                        <option  value="<?php echo $st[0]; ?>" ><?php echo $st[1];?></option>
            <?php endforeach;?>
                </select></td></tr>
        </form>
   
        </table>
                     <?php endif;?>
            <br>
                
        <input type="submit" value="Save Changes">
        </form>
    </body>      
    
</html>
