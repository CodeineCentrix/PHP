
    <h1 style="text-align: center;">Edit <?php echo $municipalName; ?> municipality info</h1> <hr>
    <div style="margin: auto; width: 60%;padding: 80px;"> 
    <form method="post" action="../Controller/MainController.php?action=updateMunicipality">           
                <input type="hidden" name="municipalitySrch" value="<?php echo $municipalId;?>">
            <table>
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
                 <td><input type="text" name="damLevel" ></td></tr>

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
             <tr><td colspan="2"><input type="submit" value="Save Changes"></td></tr>
        
</table>
</form>
   
</div>