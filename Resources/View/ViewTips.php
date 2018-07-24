<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

</style>
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
<h2>Top Water Saving Tips &amp; Tricks</h2>
    
     <?php $count_id =0;
            foreach ($tips as $value): ?>
   <div class="tipscontainer">
  <img src="../Resources/Images/head.png" alt="Avatar" style="width:90px">
  <p><span><?php echo "$value[0]"?></span><span style="font-size:small" title="Tip Category"><?php echo "$value[3]"?></span><span name="date" class="date"><i><?php $dateAsString = date_format($value[2], 'jS, F Y');
                        echo $dateAsString;?></i></span></p>
  <p><?php echo "$value[1]"?></p>
  </div>
<?php endforeach; ?> 
<!--prev next buttons-->
 <div class="pgn_holder center_tag">
            <?php if($previous>=0)/*if(1==1)*/: ?>
        <a href="<?php echo "../Controller/MainController.php?action=tips&from=$previous&to=3";?>" class="news_prev">
            <span class="img_prev"><img src="../Resources/Images/prev.png"></span>Previous</a>
        <?php  endif;?>
            
            <?php if($from<$total_records) /*if(1==1)*/: ?>
                <a href="<?php echo "../Controller/MainController.php?action=tips&to=$to&from=$from&records=$total_records";?>" class="news_next">
                    <span class="img_next"> <label>next</label><img  src="../Resources/Images/next.png"></span></a>
            <?php endif; ?>
        </div>
<!--end of buttons-->
 <?php if ($tips==NULL):?>
         <div class="news_none center_tag">
            <div class="center_tag">
                <img src="../Resources/Images/nerd.png">               
            </div>
            <h1>Looks as if you've ran out Tips & Tricks to read, <br>remember to share your personal favorite water saving tips.</h1>
            <a a href='../Controller/MainController.php'>Other cool things to do?</a>
        </div>
   
        <?php endif;?>

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
