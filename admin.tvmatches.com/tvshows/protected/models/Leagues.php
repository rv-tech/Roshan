<?php
class Leagues extends CActiveRecord
{
	public $id,$league_name;
	
	public static function model($className=__CLASS__)
   	 {
        	return parent::model($className);
   	 }
   	
   	public function tableName()
   	{
        	return 'leagues';
   	}
	
	public function rules()
	{
		if(strtolower(Yii::app()->controller->action->id)=='addleague')
		{
			return array(
				array('league_name','required'),
				array('description','safe'),
				array('league_name','unique','message'=>'Already exists!'),
			);
		}
		else
		{
			return array(
				array('league_name','required'),
				array('description','safe'),
				
			);

		}
	} 
	/* public function getActiveOptions() 
	{
                return array(
                        1=>'Male',
                        2=>'Female',
                );
        }*/
	public function attributeLabels()
	{
		return array(
			'id'=>'Id',	
			'league_name' => 'League Name',
			'description' => 'Description',
			
		);
	}
	public function deleteLeague($id)
	{
		$table = $this->tableName();
		$command = Yii::app()->db->createCommand();
		$command->delete($table, 'id=:id', array(':id'=>$id));
		return 1;
	}

	
}
?>
