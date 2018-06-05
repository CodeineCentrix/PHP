<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Resources/Stylesheets/general.css">
        <link rel="stylesheet" type="text/css" href="../Resources/Stylesheets/myStyles.css">
<!--        <link rel="stylesheet" href="../Resources/Stylesheets/homepage.css">
        <link rel="stylesheet" href="../Resources/Stylesheets/animate.css">
        <script src="../Scripts/jquery.min.js"></script>-->
        <title>News </title>
    </head>
    <body>
       <?php include '../Resources/View/header.php'; ?>    
       <?php //include '../Resources/View/Menu.php'; ?>     
            
            <?php foreach ($news as $value): ?>
            
            <div class="news_item center_tag">
                <div class='news_item_image'>
                    <img style="object-fit: contain; height:inherit; width: 100%;"src="<?php echo "$value[7]".$value[6]; ?>" alt="<?php echo "$value[6]"; ?>">
                </div>
                <div class="news_item_details">
                    <div class="news_item_title">
                        <h3 class="news_title" style="font-size:30px;"><?php echo "$value[0]";?></h3>
                    </div>
                    <div class="news_item_creds">
                        <label class="author"><?php echo 'Admin'; ?></label><br>
                        <label class="news_date"><?php 
                        $dateAsString = date_format($value[4], 'jS, F Y');
                        echo $dateAsString; 
                        ?></label><br><br>
                        <label class="news_item_desc"><?php echo" $value[1]";?></label>
                    </div>
            </div>
                
            </div><br><br>
            <?php endforeach; ?> 
        </div>
        
        <?php 
            if ($news==NULL):?>
        <div class="news_none center_tag">
            <div class="center_tag">
                <img src="../Resources/Images/nerd.png">               
            </div>
            <h1>Looks as if you've ran out of news items to read</h1>
            <a a href='../Controller/MainController.php?action=home'>Other cool things to do?</a>
        </div>
            <?php else: ?>
        <form method="POST" action="."> 
            <div class="pgn_holder center_tag">
            <?php /*if($previous>0)*/if(1==1): ?>
        <a href="<?php echo "../Controller/MainController.php?action=news&to=$previous&from=5";?>" class="news_prev">
            <span class="img_prev"><img src="../Resources/Images/prev.png"></span>Previous</a>
        <?php  endif;?>
            
            <?php /*if($to<=$total_records)*/if(1==1):?>
                <a href="<?php echo "../Controller/MainController.php?action=news&to=$to&from=5&records=$total_records";?>" class="news_next">
                    <span class="img_next"> <label>next</label><img  src="../Resources/Images/next.png"></span></a>
            <?php endif; ?>
        </div>
        </form>
        <?php endif;?>
    </body>
</html>
