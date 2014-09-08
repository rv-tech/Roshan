<!-- Right side column. Contains the navbar and content of the page -->
<style type="text/css"> 
.wq
rapper{ background-color: #ffffff; width: 800px; border: solid 1px #eeeeee; padding: 20px; margin: 0 auto; }
#tabs{ margin: 20px -20px; border: none; }
#tabs, #ui-datepicker-div, .ui-datepicker{ font-size: 85%; }
.clear{ clear: both; }
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { float: left; clear:left; padding: 0 0 0 5px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 40%; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
.ui-timepicker-rtl{ direction: rtl; }
.ui-timepicker-rtl dl { text-align: right; padding: 0 5px 0 0; }
.ui-timepicker-rtl dl dt{ float: right; clear: right; }
.ui-timepicker-rtl dl dd { margin: 0 40% 10px 10px; }
</style> 
<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" />

            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        General Form Elements
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
                                    <h3 class="box-title">Add Team</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                 <?php $form=$this->beginWidget('CActiveForm', array(
                                             'id'=>'addTeam-form',
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
                                            <?php echo $form->labelEx($model,'sport_id'); ?>
                                            <?php echo $form->dropDownList($model,'sport_id', CHtml::listData(Sports::model()->findAll(), 'id', 'name'), array('empty'=>'Select sports'));?>
                                            <?php echo $form->error($model,'sport_id'); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'team_name'); ?>
                                            <?php echo $form->textField($model,'team_name',array('class'=>'form-control'));?>
                                            <?php echo $form->error($model,'team_name'); ?>
                                        </div>
                                         <div class="form-group">
                                            <?php echo $form->labelEx($model,'gender'); ?>
                                           <?php echo $form->dropDownList($model,'gender', array('Men'=>'Men','Women'=>'Women'), array('empty'=>'Select Gender'));?>
                                            <?php echo $form->error($model,'gender'); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $form->label($model,'logo');?>
                                            <?php echo $form->fileField($model,'logo'); ?>
                                            <?php echo $form->error($model,'logo'); ?>
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
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/datepicker/timepicker.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){


$('#timepicker').timepicker({
controlType: 'select',
timeFormat: 'HH:mm tt'
});

$('#datepicker').datepicker({
minDate: new Date(2010, 0, 1),
controlType: 'select',
dateFormat: 'yy-mm-dd'  
});

});

</script>