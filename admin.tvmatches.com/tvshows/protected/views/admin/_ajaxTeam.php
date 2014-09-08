<?php if(@$sport_id) {?>
 <label class="required" for="TvMatches_team1">Team 1 <span class="required">*</span></label>     
    <select id="TvMatches_team1" name="TvMatches[team1]">
    <option value="">Select team1</option>
    <?php foreach($team as $team) { ?>
	
	<option value="<?php echo $team->team_name; ?>"><?php echo $team->team_name;?></option>
	<?php } ?>
</select>     
 <div style="display:none" id="TvMatches_team1_em_" class="errorMessage"></div> 
 <?php } else { ?>
 	  <?php echo $form->labelEx($model,'team1'); ?>
      <?php echo $form->dropDownList($model,'team1', CHtml::listData(Teams::model()->findAll(), 'team_name', 'team_name'), array('empty'=>'Select team1'));?>
      <?php echo $form->error($model,'team1'); ?>
 <?php } ?>


                                            