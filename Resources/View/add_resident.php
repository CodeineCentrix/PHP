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
        <link rel="stylesheet" href="../Resources/Stylesheets/snackbarlight.css">
        <link rel="stylesheet" href="../Resources/Stylesheets/homepage.css">
        <link rel="stylesheet" href="../Resources/Stylesheets/animate.css">
        <link rel="stylesheet" href="../Resources/Stylesheets/toast.css">
    </head>
    <body>
        <?php include '../Resources/View/header.php'; ?>
        <div class="add_res_holder">
            <div class="add_res_content"> 
                <form method="POST" action="../Controller/MainController.php?action=add_resident">
                    <div class="add_cent_cont"> 
                        <h3>Add a non-main Resident to your house, already registered with us. </h3>
                <label for="txtEmail">Email Address:</label><br>
                <input type="email" id="txtEmail" list="addresses" required name="email_add"><br>
                <datalist id="addresses">
                    <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user[0] ?>"></option>
                    <?php endforeach; ?>
                    
                </datalist>
              <label><input type="checkbox" value="1" name="chkRights"> Give Resident Reading Rights</label>
              <br>
              <input type="submit" value="Add Resident"> &nbsp;&nbsp;&nbsp;<a href="?action=revoke_page">Edit Reading list</a>
                 
                <?php if (isset($add_results)): ?>
                <?php if($add_results===FALSE):?>
                <p class="error">Oops, we can't find that account... Try: Re-typing the email address if you're sure your Resident is registered<br>
                   or inviting your Resident below: </p>
               <?php elseif ($add_results>0): ?>
               <div  id="l1" onclick="toast('l1', '9000')">Successfully added <?php echo "$email" ;?> to your Home.</div>
                <script src="../Resources/Scripts/toast.js"></script>      
                <script>
                     document.getElementById('l1').click();
                </script>
               <?php elseif($add_results===0):?>
               <p class="error">Error occured, please try again at a later stage.</p>
                <?php endif;?>
               
                </div>
                </form>
                </div>
            <?php endif; ?>
                
                
            <div class="add_res_content">
                 <form method="POST" action="../Controller/MainController.php?action=email_resident" >
                     <div class="add_cent_cont">
                         <h3>Invite a Resident to Register and join you.</h3>
                         <p class="error">Due to SSL issues: Email functionality not supported.</p>
                <label for="txtEmail1">Email Address:</label><br>
                <input type="email"  id="txtEmail1"required name="email_reg"><br>
                <input type="submit"  value="Invite Resident">
                </form>
                <label><?php if(isset($error)) {echo $error;} ?></label>
                    </div>  
                       <?php if($email_results ===NULL): ?>
                     <p class="error">Could not add because the email is already registered. Try adding instead of inviting.</p>
                     <?php elseif($email_results===1):?>
                     <p class="success">Email request sent to <?php echo "$email"; ?> await approval.</p>
                     <?php endif; ?>
            </div>
            

        </div>
        <!-- snackbar-->
        <span id="hh" data-toggle=snackbar data-content="Need help understanding this page?" data-timeout="60000" data-link="Get Help" data-url="?action="></span>
        <script src="../Resources/Scripts/snackbarlight.js"></script>
        <script>
        document.getElementById('hh').click();
        </script>
    </body>
</html>
