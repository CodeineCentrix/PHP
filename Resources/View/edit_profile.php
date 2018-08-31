<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form>
<label>First Name: </label>
<input type="text" name="user_name" value ="<?php if(isset($placeholder)){} ?>">

<label>Email: </label>
<input type="email" name="user_name" value ="<?php if(isset($placeholder)){} ?>">

<label>Password</label>
<input type="text" name="user_name" value ="<?php if(isset($placeholder)){echo $placeholder;} ?>">

<label>Repeat Password: </label>
<input type="text" name="user_name" value ="<?php if(isset($placeholder)){echo $placeholder;} ?>">

<!-- While looping, make an if statement that will trap the persons current City and Surburb-->
<label>City</label>
<select>
<?php foreach($placer as $value):?>
<option value="<?php ?>" <?php if($user_city== $looped_city){echo "selected";}?>></option>
<?php endforeach; ?>
</select>

<label>Suburb</label>
<select>
<?php foreach($placer as $value):?>
<option value="<?php ?>" <?php if($user_city== $looped_city){echo "selected";}?>></option>
<?php endforeach; ?>
</select>

<label>House Number: </label>
<input type="text" name="user_name" value ="<?php if(isset($placeholder)){echo $placeholder;} ?>">

<label>Street Name: </label>
<input type="text" name="user_name" value ="<?php if(isset($placeholder)){echo $placeholder;} ?>">

</form>
</body>
</html>
