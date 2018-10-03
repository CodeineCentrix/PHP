<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
 <script src="../Resources/Scripts/Scripts.js"></script>
  <link rel="stylesheet" href="../Resources/Stylesheets/homepage.css">
<link rel="stylesheet" href="../Resources/Stylesheets/animate.css">
<link rel="stylesheet" href="../Resources/Stylesheets/toast.css">
<link rel="stylesheet" href="../Resources/Stylesheets/snackbarlight.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="../Resources/Images/companylogo.ico" type="image/gif">
<title>Add Meter Readings</title>
</head>

<body class="MainRes">
    <?php include '../Resources/View/header.php'; ?>
    <!-- snackbar-->
        <span id="hh" data-toggle=snackbar data-content="Need help understanding this page?" data-timeout="60000" data-link="Get Help" data-url="?action="></span>
        <script src="../Resources/Scripts/snackbarlight.js"></script>
        <script>
        document.getElementById('hh').click();
        </script>
        
<div class="work-area">
<h2 class="displayInfoToUser">Address<br><?php echo "$house[0]"." $house[1]"; ?></h2>

<iframe id="iframe" src="../Resources/Images/gauge.png" name="iframe_a"></iframe><br>
<a href="../Resources//View/meterReadingHelp.html" target="iframe_a">Help me read my meter?</a>

<div class="accord">    
      <div class="title"><span class="fa fa-eye"></span>
          <h3> Previous readings</h3>
      
    <div class="view_rec">
        <form method="POST" action="?action=preview_readings">
            <div class="date-left"><span class="required">*</span><label>Pick start date <input type="date" required name="str_date"></label></div>
            <div class="date-right"><span class="required">*</span><label>Pick end date <input type="date" required name="end_date"></label></div>
       
            <div class="submit-area">
            <label class="required" style="font-size: small">All required fields marked with a red <strong>*</strong></label>
            <input type="submit" value="Find Readings">
            </div>
            <?php if(isset($readings)): ?>
            <table id="table">
                <tr>
                  <th>Date</th>
                  <th>Reading</th>
                </tr>
                <?php
                foreach ($readings as $value): ?>
                <tr>
                    <td><?php echo date_format($value[0], 'jS, F Y');?></td>
                    <td><?php echo $value[1];?></td>
                </tr>
                <?php endforeach;?>
          </table>
            <?php else:?>
            <p class="error">There aren't any reading for the selected time frame...</p>
            <?php endif;?>
         
        </form>
    </div>
    </div>
    <!--Divider-->
    
    <div class="title"><span class="fa fa-plus"></span>
        <h3> Add a reading</h3>
     
            <div class="add-record">
                    <form action="MainController.php?action=add_reading" method="POST">
                        <br>
                    <span class="required">*</span>
                    <label> <strong>Date:</strong></label><br><br>
                    <input type="date" title="You cannot select a date later than today." name="readingDate" max="<?php echo date("Y-m-d")?>" required ><span class="required">*</span>

                    <label> <strong>Reading:</strong></label><br>
                    <input type="number" max="99999" id="reading" name="reading" required title="Must be a 5 numbers field"><br>
                    <label class="required" style="font-size: small">All required fields marked with a red <strong>*</strong></label>
                    <p class="error"><?php 
                    if(isset($isReadingValid)!=NULL){
                        if(isset($message)){
                        echo "$message";
                        }
                    }
                    ?></p>
                    <input type="submit" name="submitReadings" value="Submit" onclick="ValidateReading()" class="registerbtn">   
                    </form>
            </div>
    </div>
</div>

</div>
 
    
    <?php if(isset($feedback)>0): ?> 
            <script src="../Resources/Scripts/toast.js"></script>
            <div  id="l1" onclick="toast('l1', '9000')">Meter Reading Recorded</div>
            <script>
                 document.getElementById('l1').click();
            </script>
     <?php elseif(isset($feedback)===0):?>
            <script src="../Resources/Scripts/toast.js"></script>
            <div  id="l1" onclick="toast('l1', '9000')">Unable to add Meter Reading</div>
            <script>
                 document.getElementById('l1').click();
            </script>
<?php endif; ?>
</body>
</html>
