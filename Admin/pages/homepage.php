
            <div class="">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align:center;">Welcome to the Droplit Admin Site</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<?php 
                        $data_desc = array(
                            "Total Current Registered Users",
                            "Total Approved Tips and Tricks",
                            "Total Tips and Tricks",
                            "Total Reported Leaks",
                            "Total News articles",
                            "Total Number of recongnized surburbs",
                            "Total Number of recongnized dams"
                        )
                        ?>
			<!--Loop over these-->
                        <div style="width: 100%; overflow: hidden;">
                    <?php for($i=0; $i< array_sum(array_map("count", $admin_overview)); $i++): ?>
                        <div class="" style="overflow: hidden; width: 40%; float: left;margin: 20px; ">
                <div class="">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class=" fa fa-info-circle" style="font-size:80px;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style="text-align:left;"><?php echo $admin_overview[0][$i] ?></div>
                                    <div style="text-align:center; font-size:20px;"><?php echo $data_desc[$i]; ?></div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
                <?php endfor; ?>
                        </div>