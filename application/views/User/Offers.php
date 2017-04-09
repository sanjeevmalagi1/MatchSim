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
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label>Show <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_desc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 172px;"> Match On Team </th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 172px;"> Matched Pts </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 204px;">Rate</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 185px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 185px;">Result</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    foreach ($Offers as $Offer)
                                    {   
                                    ?>    
                                    <tr class="gradeA" role="row">
                                            <td class="sorting_1"><?php echo $Offer['MatchOn']; ?></td>
                                            <td class="sorting_1"><?php echo $Offer['MatchPts']; ?></td>
                                            <td class="">
                                            <?php echo $Offer['Rate']; ?>
                                            </td>
                                            <td class="">
                                            <?php 
                                            if(!$Offer['TakenBy'])
                                            {
                                            ?>
                                                Not Taken
                                            <?php 
                                            }
                                            else
                                            {
                                            ?>
                                                Taken
                                            <?php 
                                            }
                                            ?>
                                            </td>
                                            <td><?php echo $Offer['Result']; ?></td>
                                            <td class="center">
                                                <?php 
                                                if(!$Offer['TakenBy'])
                                                {
                                                ?>
                                                <a class="btn btn-primary">Cancel</a>
                                                <?php 
                                                }
                                                else
                                                {
                                                ?>
                                                <a class="btn btn-primary">Request Decline</a>
                                                <?php 
                                                }
                                                ?>
                                            </td>
                                            
                                    </tr>
                                    <?php 
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
            </div>
            
            
        </div>
 <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>