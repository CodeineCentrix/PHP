
    <h1 style="text-align: center;">View Dams Information</h1> <hr>
    <div>
        <table  class="table table-bordered"  name="General" style="width: 50%">
            <tr><th>Dam Name</th>
                <th>Dam Level</th>
                <th>Edit</th>
                <th>Delete</th>
       
            </tr>
            <?php foreach ($dams as $dam): ?>
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

        <input type="image" src="../Resources/Images/rubbish-bin.png">
    </form>
</td>  
            </tr>  
            <?php endforeach;?>
        </table>
        <br>
        <br>
        <label style=" color: dodgerblue; cursor: pointer" name="addDam" onclick="AddDam()">Add dam</label>
        <form action="../Controller/MainController.php?action=add-dam" method="post">
        <table id="addDamTable" style="display:none">
            <tr><td>Dam Name:</td><td><input required type="text" autofocus name="damName"</td></tr>
            <tr><td>Dam Level:</td><td><input required type="number" step="any" name="damLevel"></td></tr>
                  
        </table>
        </form>
        <a href="?action">Add a dam</a>
</div>