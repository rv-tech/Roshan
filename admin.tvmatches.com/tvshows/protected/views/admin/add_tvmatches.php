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
                                    <h3 class="box-title">Add TvMatches</h3>
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
                                            <?php echo $form->labelEx($model,'sport_id'); ?>
                                            <?php echo $form->dropDownList($model,'sport_id', CHtml::listData(Sports::model()->findAll(), 'id', 'name'), array('empty'=>'Select sports'));?>
                                            <?php echo $form->error($model,'sport_id'); ?>
                                        </div>
                                        <div class="form-group" id="team1">
                                           <?php $this->renderPartial('_ajaxTeam',array('model'=>$model,'form'=>$form)); ?>
                                            
                                        </div>
                                        <div class="form-group" id="team2">
                                           <?php $this->renderPartial('_ajaxTeam2',array('model'=>$model,'form'=>$form)); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'league_name'); ?>
                                             <?php echo $form->dropDownList($model,'league_name', CHtml::listData(Leagues::model()->findAll(), 'league_name', 'league_name'), array('empty'=>'Select league'));?>
                                            <?php echo $form->error($model,'league_name'); ?>
                                        </div>
                                         <div class="form-group">
                                            <?php echo $form->labelEx($model,'start_date'); ?>
                                            <?php echo $form->textField($model,'start_date',array('class'=>'form-control','id'=>'datepicker'));?>
                                            <?php echo $form->error($model,'start_date'); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'date_time'); ?>
                                            <?php echo $form->textField($model,'start_time',array('class'=>'form-control','id'=>'timepicker'));?>
                                            <?php echo $form->error($model,'start_time'); ?>
                                        </div>
					                    <div class="form-group">
                                            <?php echo $form->labelEx($model,'channel_id'); ?>
                                            <?php echo $form->dropDownList($model,'channel_id', CHtml::listData(Channels::model()->findAll(), 'id', 'name'), array('empty'=>'Select channel'));?>
                                            <?php echo $form->error($model,'channel_id'); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'channel_id2'); ?>
                                            <?php echo $form->dropDownList($model,'channel_id2', CHtml::listData(Channels::model()->findAll(), 'id', 'name'), array('empty'=>'Select channel'));?>
                                            <?php echo $form->error($model,'channel_id2'); ?>
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
timeFormat: 'HH:mm'
});

$('#datepicker').datepicker({
minDate: new Date(2010, 0, 1),
controlType: 'select',
dateFormat: 'yy-mm-dd'  
});

    $('#TvMatches_sport_id').change(function(){
        var sport_id = $(this).val(); 
        myAction = "<?php echo Yii::app()->getBaseUrl().'/index.php/Admin/AjaxTeam/id/'; ?>"+sport_id, 
                  
        $.ajax({
        type: "get",
        url: myAction, 
        success: function(html) 
        {   
            
            $('#team1').html(html);
                myAction1 = "<?php echo Yii::app()->getBaseUrl().'/index.php/Admin/AjaxTeam2/id/'; ?>"+sport_id, 
                      
                    $.ajax({
                    type: "get",
                    url: myAction1, 
                    success: function(html) 
                    {   
                        $('#team2').html(html);
                    } 
                })    
            }
        });

    });
});


</script>