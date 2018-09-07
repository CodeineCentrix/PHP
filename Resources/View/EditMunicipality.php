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
        <title>Edit Municipalities</title>

    </head>
    <body>

        <form method="post" action="../Controller/MainController.php?action=updateMunicipality">
            <table>
          <?php if (isset($municipalId)): ?>  
                <input type="hidden" name="municipalitySrch" value="<?php echo $municipalId;?>">
            <h1> Update <?php echo $damInfo[0][2] ;?> Municipality Information</h1>
            
             <tr><td>  <label>Municipality Name:</label></td>
                 <td> <input type="text" name="municipalName" id="MunicipalName" value="<?php echo $municipalName; ?>"></td>
            </tr>
            <tr>  <td>
                <label>Main Dam:</label></td>
            <td> <select name="dams" id="dams">
            <?php foreach ($dams as $dam):?>
             <?php if($dam[1]==$damInfo[0][0]) :?>
                    <option selected value="<?php echo $dam[0]; ?>" ><?php echo $dam[1];?></option>
             <?php else:?>
                    <option value="<?php echo $dam[0]; ?>" ><?php echo $dam[1];?></option>
                    <?php endif;?>
            <?php endforeach;?>
                </select></td></tr>
            
             <tr><td>Dam Level:</td>
                 <td><input type="text" name="damLevel" value="<?php echo $damInfo[0][1];?>"></td></tr>

             <tr><td>State:</td>
                <td><select name="state" id="state">
            <?php foreach ($state as $st):?>
                        <?php if($st[1]==$damInfo[0][3]) :?>
                        <option selected value="<?php echo $st[0]; ?>"><?php echo $st[1];?></option>
                        <?php else:?>
                        <option  value="<?php echo $st[0]; ?>"><?php echo $st[1];?></option>
                        <?php endif;?>
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
                        <option value="<?php echo "$municipality[0]";?>"> <?php echo "$municipality[3]";?></option>
            <?php endforeach; ?>
                        </select>
                    </td></tr>
            
             <tr><td>  <label>Municipality Name:</label></td>
                <td> <input type="text" name="municipalName" value="<?php echo $municipalities[0][3];?>"></td>
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
        
   
        </table>
                     <?php endif;?>
            <br>
                
        <input type="submit" value="Save Changes">
        </form>
      <?php if($update >0):?>
 <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
<!--    <span class="close">&times;</span>-->
	<div class="mid">
	<img src="../Resources/Images/success.png">
    <strong><h3 class="modalText">Municipality Successfully Updated</h3></strong>
	<div class="btnProceed"><a href= "../Controller/MainController.php?action=dams-content">OK</a></div>
	</div>
  </div>

</div>
 <?php endif;?>     
      
    </body>      
    
</html>
