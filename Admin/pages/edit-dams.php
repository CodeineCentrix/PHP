 <h1 style="text-align: center;">Update <?php echo $damName ;?></h1> <hr>        
 <div style="margin: auto; width: 60%;padding: 80px;">
         <form action="../Controller/MainController.php?action=updateStandAloneDam" method="post">
        <table>
            <tr><td>Dam Name:</td><td><input required type="text" value="<?php echo $damName; ?>" name="damName"</td></tr>
            <tr><td>Dam Level:</td><td><input required type="number" step="any" value="<?php echo $damLevel; ?>" name="damLevel"></td></tr>
            <input type="hidden" value="<?php echo $damId ;?>" name="damId">
            <tr><td><input type="submit" value="Save Changes"></td></tr>
                  
        </table>
        </form>
     <br><br>
     <a href="?action=view-dams"> <span class="glyphicons glyphicons-plus-sign"></span>Manage Dams</a><br>
        </div>