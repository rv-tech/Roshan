<aside class="right-side">
     <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User List
                
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Settings</a></li>
                <li class="active">All User</li>
            </ol>
        </section>

<!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">User List
                            <?php 
                                if(Yii::app()->user->hasFlash('success')):?>
                                <div class="successMessage"><?php echo Yii::app()->user->getFlash('success'); ?>
                                </div> 
                            <?php endif;?>
                            <?php 
                                if(Yii::app()->user->hasFlash('updateuser')):?>
                                <div class="successMessage"><?php echo Yii::app()->user->getFlash('updateuser'); ?>
                                </div> 
                            <?php endif;?>
                            <?php 
                                if(Yii::app()->user->hasFlash('updateuserpassword')):?>
                                <div class="successMessage"><?php echo Yii::app()->user->getFlash('updateuserpassword'); ?>
                                </div> 
                            <?php endif;?>
                            <?php 
                                if(Yii::app()->user->hasFlash('deleted')):?>
                                <div class="successMessage"><?php echo Yii::app()->user->getFlash('deleted'); ?>
                                </div> 
                            <?php endif;?>


                    </h3>
                        <span><?php echo CHtml::link('Add User',array('/profile/employee'),array('class'=>'btn btn-primary','style'=>'float:right;margin-right:20px;margin-top:10px;color:white')); ?><span>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr><th>Name</th><th>Email Id</th><th>Status</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                    <?php if(isset($models)){ 
                                $i=0;
                                foreach($models as $model){  
                                    $i++;
                            ?>
                            <tr>
                                <td><?php  echo $model->firstname." ".$model->lastname; ?></td>
                                <td> <?php echo $model->email;?></td>
                                <td><?php if($model->Flag == 1){ ?> <img src="<?php echo Yii::app()->baseUrl.'/images/green.png'; ?>"> <?php }
                                else{ ?> <img src="<?php echo Yii::app()->baseUrl.'/images/red.png'; ?>"> <?php } ?></td>
                                <td><?php 
                                    echo CHtml::link('Edit',array("/profile/EditEmployee?id=".$model->id),array('style'=>'float:left;margin-right:5px'));?>

                                    <span style="float:left; margin-right:6px;">|</span>
                                    <?php
                                     echo CHtml::link('Delete',array("/profile/DeleteEmployee?id=".$model->id),array('style'=>'float:left;margin-right:25px'));?>
                                      <span style="float:left; margin-right:6px;">|</span>
                                                    <?php if($model->status==1)
                                                    {
                                                        $view_status = 'Disable User';
                                                    } 
                                                    else
                                                    {
                                                        $view_status = 'Enable User';
                                                    }
                                                    echo CHtml::link($view_status,array("profile/ProfileStatus?id=".$model->id."&status=".$model->status),array('style'=>'float:left;margin-right:25px')); ?>
                                </td> 
                             </tr>
                            <?php 
                                 } 
                        }
                else{ 
                        ?> 
                            <tr>
                                No Record Found
                            </tr>
                        <?php  }  ?>                                        
                                            
                        </tbody>
                                       
                    </table>
                    <div class="pagination">
                        <?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>
                                    </div><!-- /.box-body -->

                                </div><!-- ./wrapper -->

                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
