<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Resources/Stylesheets/general.css">
        <title>News </title>
    </head>
    <body>
        <div class="news_header">
            <div id="header_pic"> 
                <img src="../Resources/Images/companylogo.png" alt="Company Logo">
            </div>
            <h1 class="page_headings"> Droplit with the news </h1>
        </div>
        <h2 style="text-align: center; font-family: 'Century Gothic'">Take a read on custom created news items sourced from multiple sources.</h2>
      
        <div class="news_items_holder">
            <h3 style="text-align:center;">Top Stories: </h3>
            
            
            
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
                
            </div><br><br><hr><br>
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
            <?php if($to>0): ?>
        <div class="pgn_holder center_tag">
        <a href="<?php echo "../Controller/MainController.php?action=news&to=".$to-=$from."&from=5";?>" class="news_prev">
            <span class="img_prev"><img src="../Resources/Images/prev.png"></span>Previous</a>
        <?php  endif;?>
            
         <a href="<?php echo "../Controller/MainController.php?action=news&to=".$to-=$from."&from=5";?>" class="news_next">
            Forward<span class="img_next"><img src="../Resources/Images/next.png"></span></a>
        </div>
        </form>
        <?php endif;?>
    </body>
</html>
