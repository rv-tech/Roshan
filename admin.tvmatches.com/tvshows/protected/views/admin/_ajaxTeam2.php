<?php if(@$sport_id) {?>
<label class="required" for="TvMatches_team2">Team 2 <span class="required">*</span></label>     
    <select id="TvMatches_team2" name="TvMatches[team2]">
    <option value="">Select team2</option>
    <?php foreach($team as $team) { ?>
	
		<option value="<?php echo $team->team_name; ?>"><?php echo $team->team_name;?></option>
	<?php } ?>
</select>     
 <div style="display:none" id="TvMatches_team2_em_" class="errorMessage"></div> 
 <?php } else { ?>
 	  <?php echo $form->labelEx($model,'team2'); ?>
      <?php echo $form->dropDownList($model,'team2', CHtml::listData(Teams::model()->findAll(), 'team_name', 'team_name'), array('empty'=>'Select team2'));?>
      <?php echo $form->error($model,'team2'); ?>
 <?php } ?>


                                            