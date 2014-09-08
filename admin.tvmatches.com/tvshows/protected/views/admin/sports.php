
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Sport List
                        <small>advanced tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Sport List</h3>
                                    <span><?php echo CHtml::link('Add Sport',array('admin/AddSport'),array('class'=>'btn btn-primary','style'=>'float:right;margin-right:20px;color:white')); ?><span>
                                         <span class="downcsv"><?php echo CHtml::link('Get Sport ID',array('admin/ExportSportCSV'),array('class'=>'btn btn-primary','style'=>'float:right;margin-right:20px;color:white')); ?><span>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr><th>Sports ID<th>
                                                <th>Sport Name</th>
                                                <th>Logo</th>
                                                 <th>Modified</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($models)){ 
                                                $i=0;
                                                 foreach($models as $model){ 
                                                $i++;
                                                ?>
                                            <tr>
                                                <td><?php echo $model->id; ?></td>
                                                <td><?php  echo $model->name; ?></td>
                                                <td>
                                                    <?php if(@$model->logo) { $org_name = array();
                                                        $org_name = explode('.',$model->logo);
                                                        $temp_logo = $model->temp_logo;
                                                        //echo Yii::getPathOfAlias('application.upload.tvchannels');

                                                      ?>
                                                    <img src = "<?php echo Yii::app()->baseUrl.'/protected/upload/sports/'.$temp_logo.'.'.$org_name[1]; ?>" width="50px" height="50px" >
                                                    <?php } ?>
                                             </td>
                                                <td><?php echo $model->modified; ?></td>
                                                <td><?php echo CHtml::link('Edit',array("admin/EditSport?id=".$model->id),array('style'=>'float:left;margin-right:5px')); ?>
                                                    <span style="float:left; margin-right:6px;">|</span>
                                                    <?php echo CHtml::link('Delete',array("admin/DeleteSport?id=".$model->id),array('style'=>'float:left;margin-right:25px')); ?>
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


