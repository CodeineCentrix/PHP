
 <h1 style="text-align: center;">Update Rates for state</h1> <hr>
 <div style="margin: auto;width: 50%;padding: 80px;">
        <form action="../Controller/MainController.php?action=edit-rateCharge" method="post">
           
           <table>
    <tr><th>Min</th><th>Max</th><th>Price</th></tr>
    <?php $count = 0; ?>
                        <?php foreach ( $rate as $rates):?>                                               
                        <tr>
                            <td><input type="number" step="any"  name="min<?php echo $count;?>" value="<?php echo $rates[1] ;?>"></td>
                            <td><input type="number" step="any" name="max<?php echo $count;?>" value="<?php echo $rates[2] ;?>"></td>
                            <td><input type="number" step="any"  name="price<?php echo $count;?>" value="<?php echo $rates[0] ;?>"></td>
                            
                            
                        </tr> 
                        <?php $count++; ?>
                        <?php endforeach;?>
                        <tr><td><input type="hidden" name="muniId" value="<?php echo $muniId;?>">
                                <input type="hidden" name="stateId" value="<?php echo $stateId;?>"></td>
                                
                            <td><input type="submit" value="Save Changes"></td></tr>
                           </table>
            </form>
     <br><br>
     <a href="?action=searchRate-page">Back</a>
</div>