
<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" />

            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Add League
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
                                    <h3 class="box-title">Add League</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                 <?php $form=$this->beginWidget('CActiveForm', array(
                                             'id'=>'addLeague-form',
                                            'enableClientValidation'=>true,
                                            'clientOptions'=>array(
                                            'validateOnSubmit'=>true,
                                        ),
                                         'htmlOptions'=>array(

                                            'enctype' => 'multipart/form-data',
                                     ),

                                    )); ?>
                                    <div class="box-body">
                                        
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'league_name'); ?>
                                            <?php echo $form->textField($model,'league_name',array('class'=>'form-control'));?>
                                            <?php echo $form->error($model,'league_name'); ?>
                                        </div>
                                         <div class="form-group">
                                            <?php echo $form->labelEx($model,'description'); ?>
                                           <?php echo $form->textArea($model,'description',array('class'=>'form-control'));?>
                                            <?php echo $form->error($model,'gender');?>
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
