 <h1 style="text-align: center;">Add a municipality</h1> <hr>
<div style="margin: auto; width: 40%; padding: 50px;">
       
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
    <br>
    <a href="?action=updateMunicipality-page" style="text-align: center;">Edit a Municipality</a> <br>
    
</div>
