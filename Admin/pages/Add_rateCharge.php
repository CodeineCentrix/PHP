
      <h1 style="text-align: center;">Add Rate Charge</h1> <hr>
      <div style="margin: auto; width: 60%;padding: 50px;">
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
          <a href="?action=searchRate-page">Search Rates</a>
        </div>
