<html>
<head>
    <title>General Content</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="MainRes">
<h1>Update Dam Info</h1>
<form method="POST" action="MainController.php?action=searchDams-content">
<label>Dam Name:<select style="width: 20%" name="damSrch">
        <?php foreach ($dams as $dam):?>
        <option value="<?php echo $dam[0];?>"> <?php echo $dam[1];?></option>
    <?php endforeach; ?>
    </select>
    <input type="submit" value="Search" style="width: 10%">
</form>
<table>
<tr>
<th></th><th>Name</th><th>Dam Level</th><th>Municipality</th><th>State</th><th>Min</th><th>Max</th><th>Price</th><th>update</th>
</tr>
 <?php foreach ($damInfo as $dam): ?>
<tr>
<td><ol><li></li></ol></td>
<td><input type="text" name="damName" value="<?php echo "$dam[0]";?>">
</td>
<td><input type="text" name="damLevel" value="<?php echo $dam[1];?>"></td>
<td><input type="text" name="municipalName" value="<?php echo "$dam[2]";?>"></td>
<td><input type="text" name="state" value="<?php echo "$dam[3]";?>"></td>
<td><input type="text" name="min" value="<?php echo $dam[4];?>"></td>
<td><input type="text" name="max" value="<?php echo $dam[5];?>"></td>
<td><input type="text" name="price" value="<?php echo $dam[6];?>"></td>
<td><img src="../Resources/Images/pencil-edit-button.png"</td>
  <?php endforeach; ?>
</tr>
</table>




</body>
</html>
