
<!-- Right side column. Contains the navbar and content of the page -->


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Customer
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
                        <h3 class="box-title">Add Customer</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                     <?php $form=$this->beginWidget('CActiveForm', array(
                                 'id'=>'login-form',
                                'enableClientValidation'=>true,
                                'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                            ),
                        )); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'sport_bar'); ?>
                                 <?php echo $form->textField($model,'sport_bar',array('class'=>'form-control'));?>
                                <?php echo $form->error($model,'sport_bar'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'cust_name'); ?>
                                <?php echo $form->textField($model,'cust_name',array('class'=>'form-control'));?>
                                <?php echo $form->error($model,'cust_name'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'account_name'); ?>
                                <?php echo $form->textField($model,'account_name',array('class'=>'form-control'));?>
                                <?php echo $form->error($model,'account_name'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'email'); ?>
                                <?php echo $form->textField($model,'email',array('class'=>'form-control'));?>
                                <?php echo $form->error($model,'email'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'address'); ?>
                                <?php echo $form->textField($model,'address',array('class'=>'form-control'));?>
                                <?php echo $form->error($model,'address'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'zipcode'); ?>
                                <?php echo $form->textField($model,'zipcode',array('class'=>'form-control','id'=>"postal_code"));?>
                                <?php echo $form->error($model,'zipcode'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'country'); ?>
                                <?php echo $form->textField($model,'country',array('class'=>'form-control','id'=>"postal_code"));?>
                                <?php echo $form->error($model,'country'); ?>
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
