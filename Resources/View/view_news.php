<!DOCTYPE html>
<html>
    <head>
        <title>News</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Resources/Stylesheets/general.css">       
        <link rel="stylesheet" href="../Resources/Stylesheets/animate.css">
        <script src="../Resources/Scripts/jquery-3.3.1.min.js"></script>
        <script src="../Resources/Scripts/centrixScript.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!--Styles temporarily put here till complete with entire page -->
        <style>
	#pagination div { display: inline-block; margin-right: 5px; margin-top: 5px }
	#pagination .cell a { border-radius: 3px; font-size: 11px; color: #333; padding: 8px; text-decoration:none; border: 1px solid #d3d3d3; background-color: #f8f8f8; }
	#pagination .cell a:hover { border: 1px solid #c6c6c6; background-color: #f0f0f0;  }
	#pagination .cell_active span { border-radius: 3px; font-size: 11px; color: #333; padding: 8px; border: 1px solid #c6c6c6; background-color: #e9e9e9; }
	#pagination .cell_disabled span { border-radius: 3px; font-size: 11px; color: #777777; padding: 8px; border: 1px solid #dddddd; background-color: #ffffff; }
	</style>
    </head>
    <body>
         <?php include '../Resources/View/header.php'; ?>

        
        
            
            <!-- Construction area for a newer more effecient news articles
            uses JQuery, Javascripting to load news articles and pagination
            -->
            <div id="articles_section">
                
            </div>
            
            <div style="width:100%; margin: auto;padding: 15px; overflow: hidden; padding-left: 35%;">
            <div id="pagination" style="width:100%; margin: auto;padding: 15px; overflow: hidden;">
                <a href="#" id="1"></a>
            </div>
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
            <?php if($previous>0)/*if(1==1)*/: ?>
        <a href="<?php echo "../Controller/MainController.php?action=news&to=$previous&from=5";?>" class="news_prev">
            <span class="img_prev"><img src="../Resources/Images/prev.png"></span>Previous</a>
        <?php  endif;?>
            
            <?php if($to<=$total_records) /*if(1==1)*/: ?>
                <a href="<?php echo "../Controller/MainController.php?action=news&to=$to&from=5&records=$total_records";?>" class="news_next">
                    <span class="img_next"> <label>next</label><img  src="../Resources/Images/next.png"></span></a>
            <?php endif; ?>
        </div>
        </form>
        <?php endif;?>
        
        
   
    </body>
</html>
