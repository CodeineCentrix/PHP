<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Droplit Admin Domain</title>

    
    <!-- localhost test -->
        <link href="../Admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="../Admin/dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="../Admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
        <script src="../Admin/js/widgEditor.js"></script>      
        <link rel="stylesheet" href="../Admin/css/widgEditor.css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: #C0C0C0; ">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="text-align: center;">DROPLIT Admin Domain</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?action=log_out"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="background-color: #C0C0C0;" >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="?action=admin_dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                       
                        <li>
                            <a href="."><i class="fa fa-cog fa-fw"></i>Manage Tips&Tricks</a>
                        </li>
                        
                        <li>
                            <a href="?action=news_page"><i class="fa fa-cog fa-fw"></i>Manage News Articles</a>
                        </li>
                        
                        <li>
                            <a href="."><i class="fa fa-cog fa-fw"></i>Manage Geographics</a>
                        </li>
                        
                        <li>
                            <a href="."><i class="fa fa-cog fa-fw"></i>Reports</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Thuli include your page here, just ensure that it only contains divs -->
              <?php 
           /*   Check the action variable and then trap it via the if statement then once that's done
               include the page that you want the user to see wrapped inside of the adminpage kinda domain
             Eg: 
               if(action =='home'):
               require_once'home.php'; --use either require_once or include_once, all up to you.
             Note: home.php shouldn't contain html, body tags - preferably divs only.  
            */
           
              ?>
             <?php if($action == 'news_page'): ?>
                <?php include 'pages/news.html'; ?>
              <?php elseif($action=='admin_dashboard'): ?>
                <?php include 'pages/homepage.php'; ?>
                
                <?php elseif($action=='dams-content'): ?>
                <?php include 'pages/adminViewMunicipalities.php'; ?>
                
                <?php elseif($action=='add-municipality-page'): ?>
                <?php include 'pages/add-municipality.php'; ?>
                
                <?php elseif($action=='add-municipality'): ?>
                <?php include 'pages/adminViewMunicipalities.php'; ?>
                
                <?php elseif($action=='updateMunicipality-page'): ?>
                <?php include 'pages/EditMunicipality.php'; ?>
                
                <?php elseif($action=='updateMunicipality'): ?>
                <?php include 'pages/adminViewMunicipalities.php'; ?>
                
                <?php elseif($action=='view-dams'): ?>
                <?php include 'pages/ViewDams.php'; ?>
                
                <?php elseif($action=='updateDam'): ?>
                <?php include 'pages/ViewDams.php'; ?>
                
                <?php elseif($action=='delete-dam'): ?>
                <?php include 'pages/ViewDams.php'; ?>
                
                <?php elseif($action=='add-dam'): ?>
                <?php include 'pages/ViewDams.php'; ?>
                
                <?php elseif($action=='updateStandAloneDam-page'): ?>
                <?php include 'pages/edit-dams.php'; ?>
                
                <?php elseif($action=='updateStandAloneDam'): ?>
                <?php include 'pages/ViewDams.php'; ?>
                
                <?php elseif($action=='addRateCharge-page'): ?>
                <?php include 'pages/Add_rateCharge.php'; ?>
                
                <?php elseif($action=='addRate'): ?>
                <?php include 'pages/Add_rateCharge.php'; ?>
                
                <?php elseif($action=='searchRate-page'): ?>
                <?php include 'pages/ViewRateCharge.php'; ?>
                
                <?php elseif($action=='edit-rateCharge-page'): ?>
                <?php include 'pages/updateRates.php'; ?>
                
                <?php elseif($action=='edit-rateCharge'): ?>
                <?php include 'pages/ViewRateCharge.php'; ?>
                
                <?php elseif($action=='unapprovedTips-page'): ?>
                <?php include 'pages/unapprovedTips.php'; ?>
                
                  <?php elseif($action=='approve-tips'): ?>
                <?php include 'pages/unapprovedTips.php'; ?>
            <?php endif;?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

     <script src="../Resources/Scripts/Scripts.js"></script>
    <!-- jQuery -->
    <script src="../Admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../Admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../Admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../Admin/dist/js/sb-admin-2.js"></script>

</body>

</html>
