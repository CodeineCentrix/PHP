<h1 style="text-align: center;">View Municipality Information</h1> <hr>
<div style="margin: auto; width: 70%; padding: 80px;">
<form method="POST" action="MainController.php?action=dams-content">
    <!--have to search by municipality because we working with one main dam per municipality-->
    <label>Municipality:</label>
    <select style="width: 20%" name="municipalitySrch">
    <?php foreach ($municipalities as $municipality):?>
        <option value="<?php echo "$municipality[0]";?>"> <?php echo "$municipality[3]";?></option>
    <?php endforeach; ?>
    </select>
    
    <input type="submit" value="Search" style="width: 10%">
    <br><br><br>
</form>
<table name="General">
<tr>
    <th>Municipality</th><th>Main Dam</th><th>Dam Level</th><th>State</th><th> </th>
</tr>
 <?php foreach ($damInfo as $dam): ?>
<tr>
    <td><input type="text" name="municipalName" value="<?php echo "$dam[2]";?>"></td>
<td><input type="text" name="damName" value="<?php echo "$dam[0]";?>">
</td>
<td><input type="text" name="damLevel" value="<?php echo $dam[1];?>"></td>
<td><input type="text" name="state" value="<?php echo "$dam[3]";?>"></td>


<td><form method="post" action="../Controller/MainController.php?action=updateMunicipality-page">
        <input type="hidden" name="municipalityId" value="<?php echo $dam[4];?>">
        <input type="hidden" name="municipalName" value="<?php echo "$dam[2]";?>">
        <input type="image" src="../Resources/Images/pencil-edit-button.png">
    </form>
</td>
</tr>
  <?php endforeach; ?>

</table>
 <a href="?action=add-municipality-page">Add a municipality</a>
</div>
