<!-- Right side column. Contains the navbar and content of the page -->
<?php //echo "<pre>";print_r($data); echo "<pre>";die;?>
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Upload CSV
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
                                    <h3 class="box-title">Upload CSV</h3>
                                   Download Sample CSV <a href="http://admin.tvmatches.com/protected/upload/csv/sample.xls" style="color:blue"><img src="/images/down.png"></a>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                 <?php $form=$this->beginWidget('CActiveForm', array(
                                             'id'=>'CSV-form',
                                            'enableClientValidation'=>true,
                                            'clientOptions'=>array(
                                            'validateOnSubmit'=>true,
                                        ),
                                        'htmlOptions' => array(
                                            'enctype' => 'multipart/form-data',
                                            ),
                                    )); ?>
                               
                                    <div class="box-body">
                                      
                                       <div class="form-group">
                                      
                                            <?php echo $form->label($model,'csv');?>
                                            <?php echo $form->fileField($model,'csv'); ?>
                                            <?php echo $form->error($model,'csv'); ?>
                                            
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
