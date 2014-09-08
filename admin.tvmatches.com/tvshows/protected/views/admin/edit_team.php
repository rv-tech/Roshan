<!-- Right side column. Contains the navbar and content of the page -->
<?php //echo "<pre>";print_r($data); echo "<pre>";die;?>
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Edit Team
                        <small>Preview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">General Elements</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Edit Team</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                 <?php $form=$this->beginWidget('CActiveForm', array(
                                             'id'=>'editTeam-form',
                                            'enableClientValidation'=>true,
                                            'clientOptions'=>array(
                                            'validateOnSubmit'=>true,
                                        ),
                                        'htmlOptions' => array(
                                            'enctype' => 'multipart/form-data',
                                            ),
                                    )); ?>
                                    <?php echo $form->hiddenField($model,'id',array('value'=>$data[0]->id)); ?>
                                    
                                    <div class="box-body">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'sport_id'); ?>
                                            <?php echo $form->dropDownList($model,'sport_id', CHtml::listData(Sports::model()->findAll(), 'id', 'name'), array('options'=>array($data[0]->sport_id=>array('selected'=>true))));?>
                                            <?php echo $form->error($model,'sport_id'); ?>
                                      </div>
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'gender'); ?>
                                            <?php echo $form->dropDownList($model,'gender', array('Men'=>'Men','Women'=>'Women'), array('options'=>array($data[0]->gender=>array('selected'=>true))));?>
                                            <?php echo $form->error($model,'gender'); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $form->label($model,'team_name')?>
                                            <?php echo $form->textField($model,'team_name',array('class'=>'form-control','value'=>$data[0]->team_name));?>
                                            <?php echo $form->error($model,'team_name')?>
                                        </div>
                                       <div class="form-group">
                                        <?php echo $form->hiddenField($model,'logo_hidden',array('value'=>$data[0]->logo)); ?>
                                            <?php echo $form->label($model,'logo');?>
                                            <?php echo $form->fileField($model,'logo'); ?>
                                            <?php echo $form->error($model,'logo'); ?>
                                             <?php  if(@$data[0]->logo){ $org_name = array();
                                                        $org_name = explode('.',$data[0]->logo);
                                                        $temp_logo = $data[0]->temp_logo;
                                                        //echo Yii::getPathOfAlias('application.upload.tvchannels');

                                                      ?>
                                                       
                                            <span ><img src = "<?php echo Yii::app()->baseUrl.'/protected/upload/teams/'.$temp_logo.'.'.$org_name[1]; ?>" width="80px" height="80px" ><span>
                                            <?php } ?>
                                        </div>
					                                    
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                <?php $this->endWidget(); ?>
                            </div><!-- /.box -->

                        </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
