
    <h1 style="text-align: center;">View Dams Information</h1> <hr>
    <div>
       <?php if(empty($validity) && empty($result) && $action == "delete-dam"):?>
        <p class="warning-red">This dam is a main dam and cannot be deleted, rather update the municipality dam then attempt deleting the dam again.</p>
        <?php elseif ( isset($validity)>0):?>
        <p class="warning-green">Dam Deleted</p>
        <?php endif; ?>
        <table  class="table table-bordered"  name="General" style="width: 50%">
            <tr><th>Dam Name</th>
                <th>Dam Level(%)</th>
                <th>Edit</th>
                <th>Delete</th>
       
            </tr>
            <?php 
            $i = 0;
            foreach ($dams as $dam): ?>
            <tr><td><?php echo $dam[1] ;?></td>
            <td><?php echo $dam[2] ;?></td>
            
    <td><form method="post" action="../Controller/MainController.php?action=updateStandAloneDam-page">
        <input type="hidden" name="damId" value="<?php echo $dam[0];?>">
        <input type="hidden" name="damName" value="<?php echo "$dam[1]";?>">
        <input type="hidden" name="damLevel" value="<?php echo "$dam[2]";?>">

        <input type="image" src="../Resources/Images/pencil-edit-button.png">
    </form>
    </td>  
 <td><form method="post" action="../Controller/MainController.php?action=delete-dam">
        <input type="hidden" name="damId" value="<?php echo $dam[0];?>">
        <input type="hidden" name="damName" value="<?php echo "$dam[1]";?>">
        <input type="hidden" name="damLevel" value="<?php echo "$dam[2]";?>">
        <?php
        
        $disabled = $dam[3];
        if(isset($disabled)){
            $disabled = 'disabled class="n-allow"';
        }else{
           $disabled = 'enabled'; 
        }
        ?>
        <input type="image" <?php echo $disabled;?> src="../Resources/Images/rubbish-bin.png">
    </form>
</td>  
            </tr>  
            <?php endforeach;?>
        </table>
        <p class="warning-green">Note: Dams that are linked to municipalities are disabled and cannot be deleted. Remove them from municipalities before attempting delete.</p>
        <br>
        <br>
        <label style=" color: dodgerblue; cursor: pointer" name="addDam" onclick="AddDam()">Add dam</label>
        <form action="../Controller/MainController.php?action=add-dam" method="post">
        <table id="addDamTable" style="display:none">
            <tr><td>Dam Name:</td><td><input required type="text" autofocus name="damName"</td></tr>
            <tr><td>Dam Level(%):</td><td><input required type="number" step="any" name="damLevel"></td></tr>
            <tr><td><input type="submit" value="Add Dam"></td></tr>    
        </table>
        </form>
        
</div>