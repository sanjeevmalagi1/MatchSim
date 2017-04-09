<div id="page-wrapper" style="min-height: 401px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Your Task As Coordinator 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label>Show <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_desc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 172px;"> NickName </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 204px;">pts</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    foreach ($Tasks['Offers'] as $Task)
                                    {
                                       if($Task['Result']!="pending")
                                       {
                                    ?>    
                                    <tr class="gradeA" role="row">
                                            <td class="sorting_1"><?php echo $this->users_model->GetNameFromID($Task['MatchBy']); ?></td>
                                            <td class="">
                                            <?php
                                             if($Task['Result'] == "lost")
                                             {
                                            ?>
                                              <?php echo $Task['MatchPts']*$Task['Rate']; ?>
                                             <?php 
                                             }
                                            else {
                                             ?>
                                               <?php echo $Task['MatchPts']; ?>
                                             <?php 
                                             }  
                                             ?>   
                                            </td>
                                            <td class="center">
                                               <?php
                                             if($Task['Result'] == "lost")
                                             {
                                            ?>
                                              Collect
                                             <?php 
                                             }
                                            else {
                                             ?>
                                               Give
                                             <?php 
                                            }
                                             ?>
                                            </td>
                                            
                                    </tr>
                                    <?php 
                                       } 
                                    }
                                    ?>
                                    
                                    <?php 
                                    foreach ($Tasks['Matches'] as $Task1)
                                    {
                                        if($Task1['Result']!="pending")
                                       { 
                                    ?>    
                                    <tr class="gradeA" role="row">
                                            <td class="sorting_1"><?php echo $this->users_model->GetNameFromID($Task1['TakenBy']); ?></td>
                                            <td class="">
                                            <?php
                                             if($Task1['Result'] == "won")
                                             {
                                            ?>
                                              <?php echo $Task1['MatchPts']*$Task1['Rate']; ?>
                                             <?php 
                                             }
                                            else {
                                             ?>
                                               <?php echo $Task1['MatchPts']; ?>
                                             <?php 
                                            }
                                             ?>
                                            </td>
                                            <td class="center">
                                            <?php
                                             if($Task1['Result'] == "won")
                                             {
                                            ?>
                                               Collect
                                             <?php 
                                             }
                                            else {
                                             ?>
                                               Give
                                             <?php 
                                            }
                                             ?>  
                                            </td>
                                            
                                    </tr>
                                    <?php 
                                       }
                                    }
                                    ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <a class="btn btn-primary pull-right" onclick="window.print()"><span class="glyphicon glyphicon-print"> </span> Generate PDF</a>
                
                </div>
                        
                        
            
        </div>
 <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>