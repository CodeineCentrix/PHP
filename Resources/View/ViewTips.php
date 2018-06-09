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
<h2>Top Water Saving Tips &amp; Tricks</h2>


<div class="tipscontainer">
    
     <?php $count_id =0;
            foreach ($tips as $value): ?>
  <img src="..Resources/Images/head.png" alt="Avatar" style="width:90px">
  <p><span><?php echo "$value[0]"?></span><?php echo "$value[3]"?><span name="date" class="date"><i><?php $dateAsString = date_format($value[2], 'jS, F Y');
                        echo $dateAsString;?></i></span></p>
  <p><?php echo "$value[1]"?></p>
  </div>
<?php endforeach; ?> 
<!--prev next buttons-->
 <div class="pgn_holder center_tag">
            <?php if($previous>0)/*if(1==1)*/: ?>
        <a href="<?php echo "../Controller/MainController.php?action=news&to=$previous&from=5";?>" class="news_prev">
            <span class="img_prev"><img src="../Resources/Images/prev.png"></span>Previous</a>
        <?php  endif;?>
            
            <?php if($to<=$total_records) /*if(1==1)*/: ?>
                <a href="<?php echo "../Controller/MainController.php?action=news&to=$to&from=5&records=$total_records";?>" class="news_next">
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

<form action="MainController.php?action=" method="post">

            <div class="postTip">
<p style="width:50%">Remember to share your personal favorite water saving tips </p>
<label>Select Category</label><?php foreach ($categories as $cat) :?><select><option><?php echo "$cat[1]"; ?></option></select>
    <?php endforeach; ?> <br>
 <textarea  style="width:50%"  name="postTip" placeholder="Type in something.." style="height:500px"></textarea>
 <p style="color:dodgerblue" > NB: The tip you post will only be viewable after 24hrs as it will undergo evaluation first.</p> 
 <input  type="button" value="Post Tip" class="registerbtn" style="width:50%">
</div>
          
        </form>
        
    
</body>
</html>
