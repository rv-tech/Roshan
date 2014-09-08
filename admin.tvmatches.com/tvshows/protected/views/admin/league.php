
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        League List
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
                                    <h3 class="box-title">League List</h3>
                                    <span><?php echo CHtml::link('Add League',array('admin/AddLeague'),array('class'=>'btn btn-primary','style'=>'float:right;margin-right:20px;color:white')); ?><span>
                                </div> <!-- /.box-header -->
                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>League Name</th>
                                                <th>Description</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($models)){
                                               
                                                 foreach($models as $model){ 

                                                ?>
                                            <tr>
                                               <td><?php  echo $model->league_name; ?></td>
                                               <td><?php echo $model->description; ?></td>
                                                                                         
                                                <td>
                                                      <?php echo CHtml::link('Edit',array("admin/EditLeague?id=".$model->id),array('style'=>'float:left;margin-right:5px')); ?>
                                                      <span style="float:left; margin-right:6px;">|</span>
                                                      <?php echo CHtml::link('Delete',array("admin/LeagueDelete?id=".$model->id),array('style'=>'float:left;margin-right:5px'));?>
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


