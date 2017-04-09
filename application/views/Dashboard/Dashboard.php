<div id="page-wrapper" ng-app="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-eye fa-5x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div>MI VS RCB</div>
                                    <div class="huge">2-126</div>
                                    <div>Overs : 5.2</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                                <span class="pull-left">Target 165 from 50 balls</span>
                                <a href="#" class="pull-right">
                                    More Info
                                <span ><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10 col-md-offset-1" >
                    <?php 
                    if($this->input->get("notify"))
                    {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $this->input->get("notify"); ?>. Thank you!!
                    </div>
                    <?php 
                    }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Match Feeds
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <!--div class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Win <span class="btn btn-outline btn-success">1000 pts</span> if RCB Wins By matching <span class="btn btn-outline btn-danger">600pts</span>
                                    <span class="text-muted small"><em>4 minutes ago</em>
                                    </span>
                                    <a class="pull-right btn btn-warning">Match</a>
                                    <div class="clearfix"></div>
                                </div-->
                                <?php 
                                foreach ($Offers as $Offer) 
                                {
                                ?>
                                <div class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Win <span class="btn btn-outline btn-success"><?php echo $Offer['Rate']*$Offer['MatchPts']; ?> pts</span> if <?php echo $Offer['MatchOn']; ?> Loses By matching <span class="btn btn-outline btn-danger"><?php echo $Offer['MatchPts']; ?> pts</span>
                                    <span class="text-muted small"><em>4 minutes ago</em>
                                    </span>
                                    <a class="pull-right btn btn-warning" href="<?php echo base_url(); ?>index.php/Operations/Match/<?php echo $Offer['ID']; ?>">Match</a>
                                    <div class="clearfix"></div>
                                </div>
                                <?php 
                                }
                                ?>
                                
                            </div>
                            <!-- /.list-group -->
                            Did not Like Any offers?
                            <a href="<?php echo base_url(); ?>index.php/Operations/MakeOffer" class="btn btn-default btn-block">Make your Offer!</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        <script src="<?php echo base_url(); ?>js/angular.min.js" type="text/javascript"></script>