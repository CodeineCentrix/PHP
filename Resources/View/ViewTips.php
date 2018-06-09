<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

</style>
</head>
<body>

<h2>Top Water Saving Tips &amp; Tricks</h2>


<div class="tipscontainer">
    
     <?php $count_id =0;
            foreach ($tips as $value): ?>
  <img src="..Resources/Images/head.png" alt="Avatar" style="width:90px">
  <p><span><?php echo "$value[0]"?></span><span name="date" class="date"><i><?php$dateAsString = date_format($value[2], 'jS, F Y');
                        echo $dateAsString;?></i></span></p>
  <p><?php echo "$value[1]"?></p>
  </div>
<?php endforeach; ?> 

<a class="ViewTipsLinks" href="../Controller/MainController.php?action=news&to=$to&from=5&records=$total_records">More tips...</a>
<div class="postTip">
<p style="width:50%">Remember to share your personal favorite water saving tips </p>
 <textarea  style="width:50%"  name="postTip" placeholder="Type in something.." style="height:500px"></textarea>
 <p style="color:dodgerblue" > NB: The tip you post will only be viewable after 24hrs as it will undergo evaluation first.</p> 
 <input  type="button" value="Post Tip" class="registerbtn" style="width:50%">
</div>
</body>
</html>
