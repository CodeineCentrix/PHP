<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Stylesheets/homepage.css">
        <link rel="stylesheet" href="../Stylesheets/animate.css">
        <script src="../Scripts/jquery.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to Droplit</title>
        
        <style>
            html {
            cursor: url('../Images/cursor.png'), auto;
            }
        </style>
    </head>
    <body>
 <div class="fullscreen-bg">
     <video loop muted autoplay poster="../Images/post.png" class="fullscreen-bg__video">
        <source src="../Videos/rain.mp4" type="video/mp4">
    </video>
        </div>
<div style="width: 2%;" class="card">
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
          <i class="icon fa"><a href="../View/Register.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHxSURBVGhD7djPK2VhGMDxa5iaCGVjw0ZiYZJGsbKRJlYWU/IHaMpCdjNlFiY12WA7UaLElIXtNEkyFMk/YCxYSGYWw8qg8eP7FPV2ey7nvO97rqPeb312973nPN17znnvzYRCoVAo9MxqwEd8xRzG8A4leBY1YRU3OZxABixCauvFP2gDZFtBOVJXO/5DO+lcllGI1FSMQ2gn+5gBpKZBaCcZxW+8hLfkq/He0IKobUA7yajk2N6ah/nmo4ha1As8lw/wlu0gpTDX2RiHt2wHkbtO3LtVtmF4y+Wr9Qvm2rjk+eMtl0EmYK6N4xIViJ1sIZoV32EeYAba6+qRXQ0uYK6PagpWnUJ7w6jWofUZ2usfcoRKWJXUIAX4Bm2N5i9aYV1Sg0gyzBDOoK29t4k6OJXkIPdVQW6p2/iDc+xjAd2QgRPL5a6VqsIgaSsMctcLNKIP8qRfwk/s3JEL/wem8QldsHqiP5btIHLyk5AfSOb6KGSzuQb5/fMKXnqNDkMtHqoNsq25hnaScR1DnkFlyEvyv5R8Ar4GyHYAr78YtWTDuAftBHy6wggS6Q1srgMX8i+l111ANWSroR0saV/gJbmtbkE7SD7ItdgJ53qgHSCfduFcP7Q3zyfZsTsXBvHIyyBvsfjEZhEKhUKhkGOZzC3vRaUW0sHjXQAAAABJRU5ErkJggg=="></a></i>
        <p class="para">REGISTER</p>
      </div>
      <div class="link_con">
          <i class="icon fa"><a href="../View/Login.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAMPSURBVGhD7dpZyA5RHMfx15ItSxJRXChbslwoJLLEnSwXlkRREkUpkRQhRUi5EYpQCiWJWxLCnQt7SQhJlpIlu++vTE2n/5nneWbOzHvS86vP3Zlz5jyzneVpCZg+WIbDuI6X+Ig/eI9HuIFTWIcRiCpTcRE/oZNuxB0sR3u0WnrjLKwTbNQ9jEflGY0XsE4qr+/QrVlZhuANrJMp6jeWoPR0xn1YJ5H2GXdxFRdwGbfxFlb5tK8YhVKzA1bj8g2HMAkdYKUNhmM9XsOqR/R2Ky1d8QFWw3q1DkUj6YLTsOqTySglK2E1+Ap6g+WJrtB5WPWqk6XkJqwGZ6FI9CHVM+XWq7eY7oKg6QQ9A25jj9EWRXMEbt0yBUEzAVZD+xAic2HVvwFBsxRWQ4sQIgNg1a8rFTRrYTU0EaFi1a8hUNBshdVQyA+X9Wq/hKDZCbcRGYlQeQa3/msImv+mIxpj9TS0Q6j0gFt/NwRNd7iNVEVf/0IZh3P4BPeSV0lfeE2d56PhrEaeqWvZjqPukYTm4DF2IrEJdcU3OIyFbnW9GDLTC5puWhXEZDYyMwbWgbHRkCkzGjtZB8ZmIzLT7EjFmh2JTeGO3MIKLMBufIFVTt5hC+ZhDR7AKid65Z/E4n/OwCqXKNSR/XBHu8NgLZ8+RD+kowUMa9H7FzRnd6NptO+blrsjWib1rR6qQbe8FiusaDTrLpsegC/HkC6byN2RXfBFv3T6l9OCXVbc1cXp8GUm0mUTuTuyHb7odvuBpOwTZOUE0nWrTV9mIF02kbsjGkj6JjhuY7o6g2BFt+dTpMtvgy97kS6bKPSwr4IbjUK1gO2WvYKOcLMHblm9+ay5v8Z91uqmFOqIHIUeZK28a0PmOaxyov3BORgMzXF8i9WitV+dnDqk3bDN0D6JVVYKdyQWzY7EptmR2NTsyFhYB8ZGfwHJTH9YB8ZmIWoma7gdAw2H+qJm9KGzKojFQdQdzT2sSlqbthm0P99QtG+oXVurwqppDqMRuDV+qzsDob9laN5QtWnQXz5q7MO0tPwFeLJBU+Amz2IAAAAASUVORK5CYII="></a></i>
        <p class="para">LOGIN</p>
      </div>
      <div class="link_con">
          <i class="icon fa"><a href="../View/view_news.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANgSURBVGhD7dlZyIxRHMfx1559K9mSLWvZlxKliAvLhRK9RW4QLhRKXLhQsm8RuVAuLEVyQ5ZbN1JygVB2IUsi+xK+v6c5b//3vGfeecc8c2ZifvWpt3POzPP8553nPOc5U1VJJcVNf4wugbEYjlSyGb9L7DgKzkeE3jy2bigooTcthV4oKPbNXuBQJI9hj51qIZfVEClnYY/9zxRyDKH/nLUfi9EPdWLfrJSF5OMXNNN1QE3sAFvIFBzGyZQcwWy4FFKIcx2tkcR2uEJ64xtsXxr0SY6CkkYhsgVJbKMrZAZse5qWQvEL0THtXf8JbP9OTMM66ANx7a/RBLUGxyhkGRS/EDtrtYc92VtoBJeLsK8dgloN5VKI/rZ9/hJmK2z/RNRqKNdCNDXb+OvDrIWMh21Pk5u5ohSiaPBzvE3JSxxAYyjRCil2KoWQ/7OQrpiaxRgkN6FMWmASQmMd9dcsJ0iUQsbhE2yf7xyUpriK0BjfI3SBEqWQPbDt2fSA1k6hvmwWQIlSyBzY9pB70NerLV5l2nL5gsFQol0jM7ERWl36VkHXkEtfrEdorLMBI+ESrZBiJ1ohCxF63JRN0KaeywjougqNddQ/GS5RClkE2x6i5YtmrE54n2nL5SdUtBKlED3E2PZstKk2zGvLpRpKlEI0s7yB7fMdhaJFoP+gk81NdIQS7RppA80y9vHT0TO9jZ7eVHxorDMUbuWrRCuk2IlWiJYS5xF6trgDzWoua/AMobHOU+yCW6PVV0gr2F0cvc4mr0K2wfb5NANpg6wP7EZBLrOg1FeIsgK6Tq+gpxpMgoXYxeFdNWSSq5DvaAddL/kUohWDcgK2fQAamoOwr01+LHpgGlSUi7ZkzuB+wDXMh4v2qvR1C411bkM3Uretsxv2ZLSz2dBcgH1tMhOeMg0yATGiD8IedzsaEs2m7+Be9xBJdNHaN7wE3bGLnc74DHdcndxA5MoO2PPdiySaITTj2E5diN1R7OhnAntcnYebDPzo6+OP/4FBqMk82AHyFaexGnOLRL916GT8Y9+AZiY9hK2Edho/wB+n/06d5Jqlyo0ugeYIZjnK5VfebDTV6yvWEvVGT3v7YGeGcqCvoG4Hyc0vnzSDdlM0q+k6WVsiSzAd2huopJJK/ipVVX8A8dqbCspy51AAAAAASUVORK5CYII="></a></i>
        <p class="para">NEWS</p>
      </div>
      <div class="link_con">
        <i class="icon fa "><a><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPtSURBVGhD7dlbqFRVHMfx0wWzCAQtEeqlkqis8MFbEUUSREUYJZFWGhIIPqhRGRRoQaD1UNDdLmjQTQoiSNEKpYLKSooyioouL10J7epDon2/dDb8+7NmzpyZPTMHmh984Jw9a/3X2jP7vocGGWSQnuZQzMLNeBKv4/1h/u0yP5sJ2465TMad+BYHW2TbO2DfvudIOJm/UJpsK/7EGoxHX3I6PkZpcu2w1inoaebiN5QmpC/xIG7FdcP8+yH4WamPfsX56ElciX3Ik/gbj+I0jJRpeAz2yXXc1Byjq5mKvciDv4V2Ngv7vI1czzFORFdyOHYhD+oh9Qi0G/taI9d9D4eh9tyAPNizOAQxF+NceERrNdbYhFx/OWrN0fgZcRBPckchxkPoL/Bzt/XncSlaOflZ6wPEMRwzj9FRliEOcABzkOOkY7vKF1iA/OvlnI3c17Fry7uIxV9EKU8gtsu2Ygqa5SXEPh4MaokD+wvE4hcixx3zJ8R2Jd/gZDTKJYjtHftYdJz5iIV/R+koNR2xXTNuasegFGs7Rmx/BTrOasSir6KUvB/Jb3NPWlZ5Bo3yGmLb29Bx1iMW3YBSHkBsV7F/PhrJlWx0FeAYse0j6DhPIxa9G6VsRmxXcTM5E25O+bPbUYpjxHbOoeNsRCy6DqW8idgu8ht1B8/b/nMoJa9Io61gVLkXsehTKKXZini/4s69NCzTKyjF/Se2uwcd53rEol+hdGJ7GbFdtgKe4T8Myx5GjrU9RMe+S9BxzkAsqvOQsxa5XbQT5ipUyy53QYr3I7GfTkUtyTvqC8g5B7FN5lFqEsbhO3jGLv2yXjXEfp+jttyEWFyls/sW5HbRZTBuZsf/++d/chFyH8euLRPwI+IAX2MiYvx/O2K7yNvdRvFgkPeNH+DYtWYx4iDyIjDf/Li5zMN98NC9CFX70s5trLENsbYcs/Y4wTeQB7sLzeI3WrX1TrAUa8Sa2oHSPlRL3K5LV7hXo1HiPYpPUXKuRawlxyjtQ7XmAuxHHPgPNLo09wRatVvlghD72DfWsrZj9CQrEQeX5wkfUOT4LPh+eLDwDrCKbfMNmzyi9TSPI0+i2SbmxOOKXoPc35o9jw8FdiNO5BO08qDBNp8i9v0Io3nyUmvcbPJtsGf4kZKvAqwxA31NPps3O+lV8Y4v9vGCs+/Jly/u9LeMwDaxz43oexYiTqod1uh7BisSjIkVuRKlyY2GNfqes1Ca3GjMRt/jJXiz12kj8e6zK+9B2onfaLN3io34ZmpM/BoxJ8HL9HfwPUoTl5/ZxieTJ2BMx/d/+da4WomuvRvsVrwx8gnjZ8P8+zgM8j/I0NA/75GLwUU/5EgAAAAASUVORK5CYII="></a></i>
        <p class="para">TIPS AND TRICKS</p>
      </div>
    </div>

  </div>
</div>
<div>
            

            <div class="middlise" style="padding-top: 0; height: 100% !important;">
                <div style="width: 50%;" class="middlise">
                     <ul>
                         <li class="slideInDown">W  a  t  e  r</li>
                         <li class="slideInLeft">i  s</li>
                         <li class="slideInDown">L  i  f  e</li>
            </ul>
    <svg version="1.1" id="Layer_1" class="slideInUp" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="200px" height="200px" viewBox="0 0 141.667 126.334" enable-background="new 0 0 141.667 126.334"
     xml:space="preserve">
            <g>
            <g>
        <path class="path" fill="none" stroke="#000" stroke-width="2" stroke-miterlimit="10" d="M126.274,15.18l-0.091-0.091
            c-13.42-13.42-35.517-13.08-49.354,0.756l-6.158,6.158l-6.159-6.159C50.677,2.006,28.579,1.669,15.158,15.088l-0.091,0.092
            C1.646,28.6,1.985,50.698,15.822,64.536l29.793,29.793c0.006,0.006,0.013,0.012,0.019,0.019l0.639,0.639
            c0.002,0.003,0.005,0.005,0.007,0.008l0.091,0.091c0.002,0.003,0.005,0.005,0.008,0.008l24.291,24.291l24.278-24.278
            c0.008-0.008,0.016-0.015,0.023-0.022l0.073-0.074l0.667-0.667c0.005-0.005,0.01-0.01,0.015-0.015l29.791-29.791
            C139.356,50.698,139.694,28.6,126.274,15.18z"/>
            </g>
            </g>
    </svg>
                <div class="login_section ">  
                    <a href="../View/Login.php">Login</a> 
                    <a href="../View/Register.php">Register</a> 
                </div>
                </div>
                
                
            </div>         
        <?php
//       $ms_server_name = "HAICH-HUB96";
//       $ms_conInfo = array("Database"=>"AVIACO");
//       $con= sqlsrv_connect($ms_server_name,$ms_conInfo);        
//       if(!$con){
//            echo 'Couldnt\'t connect' ;
//        }else{
//           //echo '<h1>Connection Esthablished</h1> </br>';
//           sqlsrv_begin_transaction($con);
//           $SqlStatement = "SELECT CUS_LNAME + '  '+ CUS_FNAME AS Names
//                  , CUS_BALANCE AS Owing
//                   FROM CUSTOMER WHERE CUS_BALANCE > 10;";
//                   
//           $myresults = sqlsrv_query($con,$SqlStatement);
//           //sqlsrv_prepare($con,$myresults);
//           if(!$myresults){
//               echo 'Results return issue!';
//           }else{
//               while ($row = sqlsrv_fetch_array($myresults, SQLSRV_FETCH_NUMERIC)) {
//                   echo "<label>Customer Name: $row[0]</label>"."<br/><br/>"."<label>Amount Due: R$row[1] </label>"."<hr/></br>";
//               }
//               sqlsrv_free_stmt($myresults);
//           }
//        }
      // die(print_r(sqlsrv_errors(),true));
        ?>
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
    </body>
</html>
