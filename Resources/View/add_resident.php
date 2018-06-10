<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Resident</title>
    </head>
    <body>
        <div class="add_res_holder">
            <div class="add_res_content"> 
                <form method="POST" action="../Controller/MainController.php?action=add_resident">
                <h3>Type in the Email adddress of your Resident: </h3>
                <input type="email" name="email_add"/> 
                <input type="submit" value="Find Resident" />
                </form>
            </div>
        </div>
    </body>
</html>
