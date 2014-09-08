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
                                    <h3 class="box-title">Add Employee</h3>
                                </div><!-- /.box-header -->
                                <h3 class="box-title"> <?php 
                                if(Yii::app()->user->hasFlash('success')):?>
                                <div class="successMessage"><?php echo Yii::app()->user->getFlash('success'); ?>
                                </div> 
                                <?php endif;?>
                                <?php 
                                if(Yii::app()->user->hasFlash('Fail')):?>
                                <div class="errorMessage"><?php echo Yii::app()->user->getFlash('Fail'); ?>
                                </div> 
                                <?php endif;?>
                            </h3>
                                <!-- form start -->
                               <div class="form">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                            'id'=>'Employee-form',
                                            'enableClientValidation'=>true,
                                            'clientOptions'=>array(
                                            'validateOnSubmit'=>true,
                                        ),
                                    )); ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label><?php echo $form->labelEx($model,'firstname'); ?> </label>
                                            <?php echo $form->textField($model,'firstname',array('size'=>30,'maxlength'=>50,'value'=>''));?>                          
                                            <?php echo $form->error($model,'firstname'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo $form->labelEx($model,'lastname'); ?> </label>
                                        <?php echo $form->textField($model,'lastname',array('size'=>30,'maxlength'=>50,'value'=>''));?> 
                                            <?php echo $form->error($model,'lastname'); ?>
                                        </div>
                                        <div class="form-group">
                                        <label><?php echo $form->labelEx($model,'email'); ?></label>
                                        <?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>50,'value'=>''));?> 
                                        <?php echo $form->error($model,'email'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>  <?php echo $form->labelEx($model,'password'); ?></label>
                                            <?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>50,'value'=>''));?> 
                                            <?php echo $form->error($model,'password'); ?>
                                        </div>
                                         <div class="form-group">
                                             <label><?php echo $form->label($model,'status'); ?></label>
                                             <?php echo $form->checkBox($model,'status'); ?>
                                             <?php echo $form->error($model,'status'); ?>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                       <!-- <button type="submit" class="btn btn-primary">Submit</button>-->
                                        <?php echo CHtml::submitButton('Add',array('class'=>'btn btn-primary')); ?>
                                    </div>
                                <?php $this->endWidget(); ?>
                            </div><!-- /.box -->

                        </div><!--/.col (left) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        </body>
</html>
