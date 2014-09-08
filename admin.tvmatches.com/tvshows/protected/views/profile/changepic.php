
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
                                    <h3 class="box-title">My Avatar</h3>

                                </div><!-- /.box-header -->
                                <h3 class="box-title"> <?php 
                                if(Yii::app()->user->hasFlash('success1')):?>
                                <div class="successMessage"><?php echo Yii::app()->user->getFlash('success1'); ?>
                                </div> 
                                <?php endif;?>
                                <?php
                                if(Yii::app()->user->hasFlash('success2')):?>
                                <div class="successMessage"><?php echo Yii::app()->user->getFlash('success2'); ?>
                                </div> 
                                <?php endif;?>
                                
                                </h3>
                                <!-- form start -->
                               <div class="form">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                            'id'=>'changepic-form',
                                            'enableClientValidation'=>true,
                                            'clientOptions'=>array(
                                            'validateOnSubmit'=>true,
                                        ),
                                            'htmlOptions' => array(
                                            'enctype' => 'multipart/form-data',
                                            ),
                                    )); ?>
                                    <div class="box-body">
                                        <?php echo $form->hiddenField($model,'hiddenpic',array('value'=>$data['profilepic'])); ?>
                                        <div class="form-group">
                                    <?php  echo $form->label($model,'profilepic'); 
                                    
                                        if($data['profilepic'] == ''){
                                            ?>
                                                <img src = "<?php echo Yii::app()->baseUrl.'/protected/upload/defaulprofile/avatar3.png'; ?>">
                                                  <?php
                                                }
                                            else{
                                                ?>
                                                
                                            <img src = "<?php echo Yii::app()->baseUrl.'/protected/upload/avatar/'.$data['profilepic']; ?>">
                                                 <?php
                                                }

                                           ?>
                                       
                                            <?php echo $form->fileField($model,'profilepic'); ?>
                                            <?php echo $form->error($model,'profilepic'); 
                                        ?>
                                            
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
      
             
    </body>
</html>
