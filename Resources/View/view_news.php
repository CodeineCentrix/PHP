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
          // print_r($news);
            if ($news==NULL) {
                echo 'Looks like we\'re out of news!';
            } else {
                echo '<a href="">Previous</a> | <a href="">Next</a>'; 
             }
            
            ?>
   
    </body>
</html>
