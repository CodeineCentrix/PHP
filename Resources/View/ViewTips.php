<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#pagination_t div { display: inline-block; margin-right: 5px; margin-top: 5px }
#pagination_t .cell a { border-radius: 3px; font-size: 11px; color: #333; padding: 8px; text-decoration:none; border: 1px solid #d3d3d3; background-color: #f8f8f8; }
#pagination_t .cell a:hover { border: 1px solid #c6c6c6; background-color: #f0f0f0;  }
#pagination_t .cell_active span { border-radius: 3px; font-size: 11px; color: #333; padding: 8px; border: 1px solid #c6c6c6; background-color: #e9e9e9; }
#pagination_t .cell_disabled span { border-radius: 3px; font-size: 11px; color: #777777; padding: 8px; border: 1px solid #dddddd; background-color: #ffffff; }	
</style>
 <script src="../Resources/Scripts/jquery-3.3.1.min.js"></script>
<script src="../Resources/Scripts/centrixScript.js"></script>
</head>
<body>
 <?php include '../Resources/View/header.php'; ?>

    <?php if($postedTip >0):?>
 <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
<!--    <span class="close">&times;</span>-->
	<div class="mid">
	<img src="../Resources/Images/success.png">
    <strong><h3 class="modalText">Tip posted for evaluation</h3></strong>
	<div class="btnProceed"><a href= "../Controller/MainController.php?action=tips">OK</a></div>
	</div>
  </div>

</div>
 <?php endif;?>

<div class="tips_holder">
<h2>Latest Water Saving Tips &amp; Tricks</h2>

  <!--Tip and tricks content --> 
    <div id="tiptrickregion">

  </div>
  
<!-- tip trick pagination content -->
        <div style="width:100%; margin: auto;padding: 15px; overflow: hidden; padding-left: 35%;">
            <div id="pagination_t" style="width:100%; margin: auto;padding: 15px; overflow: hidden;">
                <a href="#" id="1"></a>
            </div>
        </div>


<form action="../Controller/MainController.php?action=post_tip" method="post">

    <div class="post_wrap">
        <div class="postTip">
<h3>Remember to share your personal favorite water saving tips </h3>
<label>Select Category</label><br>
<select name="cat">
    <?php foreach ($categories as $cat) :?>
    <option value="<?php echo "$cat[0]";?>"><?php echo "$cat[1]"; ?></option>
    <?php endforeach; ?>
    </select>
        <br>
        <textarea   name="postTip" placeholder="Type in something.." required></textarea>
        <div class="warning" > <br>NB: The tip you post will only be viewable after 24hrs as it will undergo evaluation first.<br><br></div> <br>
 <input  type="submit" value="Post Tip" class="registerbtn" style="width:50%">
</div>
    </div>
          
        </form>

</div>     
    
</body>
</html>
