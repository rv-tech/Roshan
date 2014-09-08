<!DOCTYPE html>
<html>
   
   
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
                <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">User Profile</h3>

                                </div><!-- /.box-header -->
                                <h3 class="box-title"> <?php 
                                if(Yii::app()->user->hasFlash('failpassword')):?>
                                <div class="errorMessage"><?php echo Yii::app()->user->getFlash('failpassword'); ?>
                                </div> 
                                <?php endif;?>
                                <?php
                                if(Yii::app()->user->hasFlash('success2')):?>
                                <div class="successMessage"><?php echo Yii::app()->user->getFlash('success2'); ?>
                                </div> 
                                <?php endif;?>
                                <?php
                                if(Yii::app()->user->hasFlash('Confpass')):?>
                                <div class="errorMessage"><?php echo Yii::app()->user->getFlash('Confpass'); ?> 
                                </div> 
                                <?php endif;?>
                                </h3>
                                <!-- form start -->
                               <div class="form">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                            'id'=>'edituser-form',
                                            'enableClientValidation'=>true,
                                            'clientOptions'=>array(
                                            'validateOnSubmit'=>true,
                                        ),
                                            'htmlOptions' => array(
                                            'enctype' => 'multipart/form-data',
                                            ),
                                    )); ?>
                                    <div class="box-body">
                                 <?php echo $form->hiddenField($model,'id',array('value'=>$data['id']));?>
                                        
                                        <div class="form-group">
                                            <label><?php echo $form->labelEx($model,'firstname'); ?> </label>
                                            <?php echo $form->textField($model,'firstname',array('size'=>50,'maxlength'=>50,'value'=>$data['firstname']));?>                          
                                            <?php echo $form->error($model,'firstname'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo $form->labelEx($model,'lastname'); ?> </label>
                                        <?php echo $form->textField($model,'lastname',array('size'=>50,'maxlength'=>50,'value'=>$data['lastname']));?> 
                                            <?php echo $form->error($model,'lastname'); ?>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><?php echo $form->labelEx($model,'email'); ?></label>
                                        <?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'value'=>$data['email']));?> 
                                        <?php echo $form->error($model,'email'); ?>
                                        </div>
                                        <!--div class="form-group">
                                             <label><?php //echo $form->label($model,'status'); ?></label-->
                                             <?php //if($data['status'] == 1){ 
                                            // echo $form->checkBox($model,'status',array('checked'=>'checked')); 
                                                       // }
                                                       // else{
                                            // echo $form->checkBox($model,'status',array('checked'=>'')); 

                                                        //}
                                            // echo $form->error($model,'status'); ?>
                                        <!--/div-->
                                        <h3 class="box-title">Change Password</h3>
                                        <div class="form-group">
                                            <label>  <?php echo $form->labelEx($model,'newpassword'); ?></label>
                                            <?php echo $form->passwordField($model,'newpassword',array('id'=>'newp')); ?>
                                            <?php echo $form->error($model,'newpassword'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>  <?php echo $form->labelEx($model,'confpassword'); ?></label>
                                            <?php echo $form->passwordField($model,'confpassword',array('id'=>'confp','onblur'=>'userchangepassword()')); ?>
                                            <?php echo $form->error($model,'confpassword'); ?>
                                        </div>
                                        <div class="checkpassclass">
                                         
                                         </div>   
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                       <!-- <button type="submit" class="btn btn-primary">Submit</button>-->
                                        <?php echo CHtml::submitButton('Save',array('class'=>'btn btn-primary')); ?>
                                    </div>
                                <?php $this->endWidget(); ?>
                            </div><!-- /.box -->

                        </div><!--/.col (left) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
 <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js" type="text/javascript"></script>       

         </body>
</html>
