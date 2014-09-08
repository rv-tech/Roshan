<?php  
foreach($model as $model){ ?>
<div class="panel_widget">
  <h2 class="heading">
    <?php $date = strtotime($model->start_date);
      $day = date("l j F, Y",$date);
      echo $day;
    ?>
  </h2>
  <ul class="content_list clearfix"> 
    <?php  if(@$model->sport->logo) {  $org_name = array();
             $org_name = explode('.',$model->sport->logo);
             $temp_logo = $model->sport->temp_logo;
                                                        //echo Yii::getPathOfAlias('application.upload.tvchannels');
     ?>
      <li><img src="<?php echo 'http://admin.tvmatches.com/protected/upload/sports/'.$temp_logo.'.'.$org_name[1];?>" ></li> 
      <?php } ?> 
      <li class="color"><?php echo $model->start_time; ?></li>
      <li><img src="<?php echo yii::app()->request->baseUrl; ?>/images/flag.jpg"></li>     
      <li class="team_name"><?php echo $model->team1; ?></li>
       <li class="line">-</li>
      <li class="team_name"><?php echo $model->team2; ?></li>
      <li><img src="<?php echo yii::app()->request->baseUrl; ?>/images/plus-icon.jpg"></li>   

       <?php  if(@$model->channel->logo) {  $channel_org = array();
             $channel_org = explode('.',$model->channel->logo);
             $channel_temp_logo = $model->channel->temp_logo;
                                                        //echo Yii::getPathOfAlias('application.upload.tvchannels');
     ?>
       <li><img src="<?php echo 'http://admin.tvmatches.com/protected/upload/tvchannels/'.$channel_temp_logo.'.'.$channel_org[1];?>" ></li> 
      <?php } ?> 
      <?php  if(@$model->channel2->logo) {  $channel2_org = array();
             $channel2_org = explode('.',$model->channel2->logo);
             $channel2_temp_logo = $model->channel2->temp_logo;
                                                        //echo Yii::getPathOfAlias('application.upload.tvchannels');
     ?>
       <li><img src="<?php echo 'http://admin.tvmatches.com/protected/upload/tvchannels/'.$channel2_temp_logo.'.'.$channel2_org[1];?>" ></li> 
      <?php } ?> 
  </ul>
   <ul class="content_list clearfix"> 
   <!--   <li><img src="<?php //echo yii::app()->request->baseUrl; ?>/images/yellow-icon.jpg"></li>  -->
  </ul>
  
</div>
<?php } ?>

