<?php //echo "hii";die; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" type="text/css" media="all" />
        <!-- font Awesome -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" type="text/css" media="all" />
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ionicons.min.css" type="text/css" media="all" />
       
         <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/AdminLTE.css" type="text/css" media="all" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
                <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            

            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="adminlogin"><!-- admin custom div   -->
                <!-- Content Header (Page header) -->
                <section class="content-header">
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
                    
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <a href="<?php echo yii::app()->request->baseUrl?>/index.php/admin/index" >
        <img src="<?php echo yii::app()->request->baseUrl?>/images/Logo1.png" class="logologin">
            </a>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                     <div class="main-login">   
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Forgot Password</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                               <div class="form">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                             'id'=>'forgotpassword-form',
                                            'enableClientValidation'=>true,
                                            'clientOptions'=>array(
                                            'validateOnSubmit'=>true,
                                        ),
                                    )); ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label> <?php echo $form->labelEx($model,'username'); ?> </label>
                                                <?php echo $form->textField($model,'username'); ?>
                                                 <?php echo $form->error($model,'username'); ?>

                                        </div>
                                        <span style="color:red"><?php if(@$wrongEmail){ echo $wrongEmail; } ?></span>
                                        
                                       
                                    </div><!-- /.box-body -->
                                   
                                    <div class="box-footer">
                                       <!-- <button type="submit" class="btn btn-primary">Submit</button>-->
                                         <?php echo CHtml::submitButton('Submit',array('class'=>'loginsubmit')); ?>
                                     
                                    </div>
                                <?php $this->endWidget(); ?>
                            </div><!-- /.box -->

                        </div><!--/.col (left) -->
                    </div>   <!-- /.row -->
                </div>
                </section><!-- /.content -->
            </div><!-- admin custom div   -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/AdminLTE/demo.js" type="text/javascript"></script>        
    </body>
</html>
