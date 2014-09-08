
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Match List
                        <small>advanced tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Match List</h3>
                                    <span><?php echo CHtml::link('Add New Match',array('admin/AddTvmatches'),array('class'=>'btn btn-primary','style'=>'float:right;margin-right:20px;color:white')); ?><span>
                                      
                                </div> <!-- /.box-header -->
                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Sport</th>
                                                <th>Team 1 </th>
                                                <th>Team 2</th>
                                                <th>League</th>
                                                
                                                <th>First Channel</th>
                                                <th>Second Channel</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($models)){
                                               
                                                 foreach($models as $model){ 

                                                ?>
                                            <tr>
                                                
                                               <td><?php echo $model->start_date; ?></td>
                                               <td><?php echo $model->start_time; ?></td>
                                               <td><?php  echo $model->sport->name; ?></td>
                                               <td><?php echo $model->team1; ?></td>
                                               <td><?php echo $model->team2; ?></td>
                                               <td><?php echo $model->league_name; ?></td>

                                               <td><?php echo $model->channel->name; ?></td>
                                               <td><?php echo @$model->channel2->name; ?></td>

                                               <td> <?php if($model->status==0){ echo "InActive"; } else { echo "Active"; } ?>   </td>                                              
                                                <td><?php echo CHtml::link('Edit',array("admin/EditMatch?id=".$model->id),array('style'=>'float:left;margin-right:5px')); ?>
                                                      <span style="float:left; margin-right:6px;">|</span>
                                                    <?php echo CHtml::link('Delete',array("admin/MatchDelete?id=".$model->id),array('style'=>'float:left;margin-right:5px'));?>
                                                    <span style="float:left; margin-right:6px;">|</span>
                                                    <?php echo CHtml::link('Status',array("admin/MatchStatus?id=".$model->id."&status=".$model->status),array('style'=>'float:left')); ?>
                                                  
                                                </td> 
                                            </tr>
                                           <?php }  }
                                            else
                                              { 
                                                 ?> 
                                             <tr>
                                               No Record Found
                                            </tr>
                                       <?php  }  ?>                                        
                                            
                                        </tbody>
                                       
                                    </table>
                                    <div class="pagination">
                                    <?php $this->widget('CLinkPager', array(
                                     'pages' => $pages,
                                    )) ?>
                                </div><!-- /.box-body -->

                                        </div><!-- ./wrapper -->

                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->


