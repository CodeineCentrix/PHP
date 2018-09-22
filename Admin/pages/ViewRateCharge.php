
     <h1 style="text-align: center;">View Rate Charge</h1> <hr>
     <div style="margin: auto; width: 50%;padding: 80px;">
    <form action="../Controller/MainController.php?action=edit-rateCharge-page" method="post"> 

            <table>
                <tr><th>Municipality</th><th>State</th>
               </tr>
                <tr><td><select name="muniId">
        <?php foreach ($municipalities as $municipality):?>
        <option value="<?php echo "$municipality[0]";?>"> <?php echo "$municipality[3]";?></option>
    <?php endforeach; ?>
            </select></td>
              <td><select name="stateId" >
            <?php foreach ($state as $st):?>
                        <option  value="<?php echo $st[0]; ?>" ><?php echo $st[1];?></option>
            <?php endforeach;?>
                </select></td>
            <td>  <input type="submit" value="Search"></td></tr>
            </table>
    </form> 
         <a href="?action=addRateCharge-page">Add rate</a>
    </div>