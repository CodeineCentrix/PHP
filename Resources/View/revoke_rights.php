<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Revoke </title>
    </head>
    <body>
         
        <div>
            <?php include '../Resources/View/header.php'; ?>
            
            <br>
            <div class="revoke_wrapper shader">
            <h1>Find a resident and revoke their rights to add meter readings</h1>
            <h3>Give a resident reading rights <a href="?action=add_page">here</a></h3>
            <form action="?action=revoke_person" method="POST">
            <p>Select your Housemate</p>
            <?php $no_of_roomates = 0; ?>
            <select name="cmbMates" required onchange="getSelectedText(this)" placeholder="Pick an Option">
                <option disabled>Pick a resident below</option>               
               <?php foreach($roomies as $mate): ?>
                <option value="<?php echo $mate[0];?>"><?php echo $mate[1]; ?></option>
                <?php $no_of_roomates++; ?>
                <?php endforeach;?>
            </select> 
            <input type="submit" value="Revoke Resident Rights">
            <br> <label>We found <?php echo count($roomies)-1; ?> revoke-able person(s).</label>
            <input type="hidden" id="person_name" name="txtperson_name">
            </form>
            <?php if(isset($moved)):?>
            <p><?php echo $moved; ?></p>
            <?php endif;?>
            </div>
        </div>
        
        <script>
            function getSelectedText(el){
            document.getElementById("person_name"). value = el.options[el.selectedIndex].text;
            }
        </script>
        
    </body>
</html>
