
   <div  class="card">
  <svg class="icon-menu" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 0 250 250">
  <title>Menu</title>
  <g>
    <line class="line line--1" x1="20" y1="30" x2="190" y2="30"></line>
    <line class="line line--2" x1="20" y1="90" x2="150" y2="90"></line>
    <line class="line line--3" x1="20" y1="150" x2="190" y2="150"></line>
  </g>
</svg>
<!-- the menu  drawer or tray-->
<div class="drawer">

    <div class="links">
        
      <div class="link_con">
          <i class="icon fa"><a href="../Controller/MainController.php?action=register_page"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHxSURBVGhD7djPK2VhGMDxa5iaCGVjw0ZiYZJGsbKRJlYWU/IHaMpCdjNlFiY12WA7UaLElIXtNEkyFMk/YCxYSGYWw8qg8eP7FPV2ey7nvO97rqPeb312973nPN17znnvzYRCoVAo9MxqwEd8xRzG8A4leBY1YRU3OZxABixCauvFP2gDZFtBOVJXO/5DO+lcllGI1FSMQ2gn+5gBpKZBaCcZxW+8hLfkq/He0IKobUA7yajk2N6ah/nmo4ha1As8lw/wlu0gpTDX2RiHt2wHkbtO3LtVtmF4y+Wr9Qvm2rjk+eMtl0EmYK6N4xIViJ1sIZoV32EeYAba6+qRXQ0uYK6PagpWnUJ7w6jWofUZ2usfcoRKWJXUIAX4Bm2N5i9aYV1Sg0gyzBDOoK29t4k6OJXkIPdVQW6p2/iDc+xjAd2QgRPL5a6VqsIgaSsMctcLNKIP8qRfwk/s3JEL/wem8QldsHqiP5btIHLyk5AfSOb6KGSzuQb5/fMKXnqNDkMtHqoNsq25hnaScR1DnkFlyEvyv5R8Ar4GyHYAr78YtWTDuAftBHy6wggS6Q1srgMX8i+l111ANWSroR0saV/gJbmtbkE7SD7ItdgJ53qgHSCfduFcP7Q3zyfZsTsXBvHIyyBvsfjEZhEKhUKhkGOZzC3vRaUW0sHjXQAAAABJRU5ErkJggg=="></a></i>
        <p class="para">REGISTER</p>
      </div>
        <?php
        
        if(!isset($_SESSION["email"])):
        ?>
      <div class="link_con">
          <i class="icon fa"><a href="../Controller/MainController.php?action=login_page"><img src="https://png.icons8.com/ios/50/000000/login-rounded-right-filled.png"></a></i>
        <p class="para">LOGIN</p>
      </div>
        <?php endif;?>
        
      <div class="link_con">
          <i class="icon fa"><a href="../Controller/MainController.php?action=news"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANgSURBVGhD7dlZyIxRHMfx1559K9mSLWvZlxKliAvLhRK9RW4QLhRKXLhQsm8RuVAuLEVyQ5ZbN1JygVB2IUsi+xK+v6c5b//3vGfeecc8c2ZifvWpt3POzPP8553nPOc5U1VJJcVNf4wugbEYjlSyGb9L7DgKzkeE3jy2bigooTcthV4oKPbNXuBQJI9hj51qIZfVEClnYY/9zxRyDKH/nLUfi9EPdWLfrJSF5OMXNNN1QE3sAFvIFBzGyZQcwWy4FFKIcx2tkcR2uEJ64xtsXxr0SY6CkkYhsgVJbKMrZAZse5qWQvEL0THtXf8JbP9OTMM66ANx7a/RBLUGxyhkGRS/EDtrtYc92VtoBJeLsK8dgloN5VKI/rZ9/hJmK2z/RNRqKNdCNDXb+OvDrIWMh21Pk5u5ohSiaPBzvE3JSxxAYyjRCil2KoWQ/7OQrpiaxRgkN6FMWmASQmMd9dcsJ0iUQsbhE2yf7xyUpriK0BjfI3SBEqWQPbDt2fSA1k6hvmwWQIlSyBzY9pB70NerLV5l2nL5gsFQol0jM7ERWl36VkHXkEtfrEdorLMBI+ESrZBiJ1ohCxF63JRN0KaeywjougqNddQ/GS5RClkE2x6i5YtmrE54n2nL5SdUtBKlED3E2PZstKk2zGvLpRpKlEI0s7yB7fMdhaJFoP+gk81NdIQS7RppA80y9vHT0TO9jZ7eVHxorDMUbuWrRCuk2IlWiJYS5xF6trgDzWoua/AMobHOU+yCW6PVV0gr2F0cvc4mr0K2wfb5NANpg6wP7EZBLrOg1FeIsgK6Tq+gpxpMgoXYxeFdNWSSq5DvaAddL/kUohWDcgK2fQAamoOwr01+LHpgGlSUi7ZkzuB+wDXMh4v2qvR1C411bkM3Uretsxv2ZLSz2dBcgH1tMhOeMg0yATGiD8IedzsaEs2m7+Be9xBJdNHaN7wE3bGLnc74DHdcndxA5MoO2PPdiySaITTj2E5diN1R7OhnAntcnYebDPzo6+OP/4FBqMk82AHyFaexGnOLRL916GT8Y9+AZiY9hK2Edho/wB+n/06d5Jqlyo0ugeYIZjnK5VfebDTV6yvWEvVGT3v7YGeGcqCvoG4Hyc0vnzSDdlM0q+k6WVsiSzAd2huopJJK/ipVVX8A8dqbCspy51AAAAAASUVORK5CYII="></a></i>
        <p class="para">NEWS</p>
      </div>
        
      <div class="link_con">
          <i class="icon fa "><a href="../Controller/MainController.php?action=tips"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPtSURBVGhD7dlbqFRVHMfx0wWzCAQtEeqlkqis8MFbEUUSREUYJZFWGhIIPqhRGRRoQaD1UNDdLmjQTQoiSNEKpYLKSooyioouL10J7epDon2/dDb8+7NmzpyZPTMHmh984Jw9a/3X2jP7vocGGWSQnuZQzMLNeBKv4/1h/u0yP5sJ2465TMad+BYHW2TbO2DfvudIOJm/UJpsK/7EGoxHX3I6PkZpcu2w1inoaebiN5QmpC/xIG7FdcP8+yH4WamPfsX56ElciX3Ik/gbj+I0jJRpeAz2yXXc1Byjq5mKvciDv4V2Ngv7vI1czzFORFdyOHYhD+oh9Qi0G/taI9d9D4eh9tyAPNizOAQxF+NceERrNdbYhFx/OWrN0fgZcRBPckchxkPoL/Bzt/XncSlaOflZ6wPEMRwzj9FRliEOcABzkOOkY7vKF1iA/OvlnI3c17Fry7uIxV9EKU8gtsu2Ygqa5SXEPh4MaokD+wvE4hcixx3zJ8R2Jd/gZDTKJYjtHftYdJz5iIV/R+koNR2xXTNuasegFGs7Rmx/BTrOasSir6KUvB/Jb3NPWlZ5Bo3yGmLb29Bx1iMW3YBSHkBsV7F/PhrJlWx0FeAYse0j6DhPIxa9G6VsRmxXcTM5E25O+bPbUYpjxHbOoeNsRCy6DqW8idgu8ht1B8/b/nMoJa9Io61gVLkXsehTKKXZini/4s69NCzTKyjF/Se2uwcd53rEol+hdGJ7GbFdtgKe4T8Myx5GjrU9RMe+S9BxzkAsqvOQsxa5XbQT5ipUyy53QYr3I7GfTkUtyTvqC8g5B7FN5lFqEsbhO3jGLv2yXjXEfp+jttyEWFyls/sW5HbRZTBuZsf/++d/chFyH8euLRPwI+IAX2MiYvx/O2K7yNvdRvFgkPeNH+DYtWYx4iDyIjDf/Li5zMN98NC9CFX70s5trLENsbYcs/Y4wTeQB7sLzeI3WrX1TrAUa8Sa2oHSPlRL3K5LV7hXo1HiPYpPUXKuRawlxyjtQ7XmAuxHHPgPNLo09wRatVvlghD72DfWsrZj9CQrEQeX5wkfUOT4LPh+eLDwDrCKbfMNmzyi9TSPI0+i2SbmxOOKXoPc35o9jw8FdiNO5BO08qDBNp8i9v0Io3nyUmvcbPJtsGf4kZKvAqwxA31NPps3O+lV8Y4v9vGCs+/Jly/u9LeMwDaxz43oexYiTqod1uh7BisSjIkVuRKlyY2GNfqes1Ca3GjMRt/jJXiz12kj8e6zK+9B2onfaLN3io34ZmpM/BoxJ8HL9HfwPUoTl5/ZxieTJ2BMx/d/+da4WomuvRvsVrwx8gnjZ8P8+zgM8j/I0NA/75GLwUU/5EgAAAAASUVORK5CYII="></a></i>
        <p class="para">TIPS AND TRICKS</p>
      </div>
       <!-- Logged in registered users options--> 
        <?php if(isset($_SESSION["PersonID"])||isset($PersonID)): ?>
       
       <div class="link_con">
           <i class="icon fa "><a href="../Controller/MainController.php?action=view_readings"><img src="https://png.icons8.com/windows/50/000000/pressure.png"></a></i>
        <p class="para">VIEW METER READINGS</p>
      </div>
       
      
       <div class="link_con">
           <i class="icon fa "><a href="../Controller/MainController.php?action="><img src="https://png.icons8.com/metro/50/000000/edit-user-male.png"></a></i>
        <p class="para">EDIT PROFILE</p>
      </div>
       
       <div class="link_con">
           <i class="icon fa "><a href="../Controller/MainController.php?action=area_stats"><img src="https://png.icons8.com/ios/50/000000/combo-chart-filled.png"></a></i>
        <p class="para">VIEW AREA STATS</p>
      </div>
       
       
       <div class="link_con">
           <i class="icon fa "><a href="../Controller/MainController.php?action=water_usage"><img src="https://png.icons8.com/ios/50/000000/plumbing-filled.png"></a></i>
        <p class="para">VIEW WATER USAGE</p>
      </div>
       <?php 
      // session_start();
       if(isset($_SESSION["email"])):?>
       <div class="link_con">
           <i class="icon fa "><a href="../Controller/MainController.php?action=log_out"><img src="https://png.icons8.com/ios/50/000000/logout-rounded-filled.png"></a></i>
        <p class="para">LOG OUT</p>
      </div>
       <?php endif; ?>
       
        <?php endif; ?>
     <!-- Logged in registered main residents users options -->   
        <?php 
        if(isset($_SESSION["Rights"])){
          $rights = $_SESSION["Rights"];  
        }else{
          $rights = 0; 
        }
        
        if((isset($_SESSION['MainResidentID'])|| $rights>0)||isset($MainResidentID)): ?>
        <div class="link_con">
            <i class="icon fa "><a href="../Controller/MainController.php?action=add_page"><img src="https://png.icons8.com/metro/50/000000/groups.png"></a></i>
        <p class="para">ADD RESIDENT</p>
      </div>

     <div class="link_con">
         <i class="icon fa "><a href="../Controller/MainController.php?action=add_reading"><img src="https://png.icons8.com/ios/50/000000/edit-property-filled.png"></a></i>
        <p class="para">RECORD READINGS</p>
      </div>
     <?php 

     if(isset($_SESSION['MainResidentID'])):?>
     <div class="link_con">
         <i class="icon fa "><a href="../Controller/MainController.php?action="><img src="https://png.icons8.com/ios/50/000000/user-rights-filled.png"></a></i>
        <p class="para">REVOKE RIGHTS</p>       
      </div>
     <?php endif; ?>
        <?php endif; ?>
        
    </div>
</div>
   </div>
    <script>
$('.icon-menu').on('click', function() {
 $(this).toggleClass('clicked');
  $('.line').toggleClass('active');
  $('.line--2').toggleClass('clicked');
  $('.line--1').toggleClass('clicked');
  $('.line--3').toggleClass('clicked');
  
   $('.drawer').toggleClass('clicked');
  $('.link_con').toggleClass('clicked');
  $('.card').toggleClass('clicked');

});

$('.menu').on('click', function() {

  $(this).toggleClass('clicked');
  $('.drawer').toggleClass('clicked');
  $('.link_con').toggleClass('clicked');
  $('.card').toggleClass('clicked');

});
</script>

