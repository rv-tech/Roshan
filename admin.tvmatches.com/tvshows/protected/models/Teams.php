<?php
class Teams extends CActiveRecord
{
	public $id,$team_name,$logo,$temp_logo,$sport_id,$gender;
	
	public static function model($className=__CLASS__)
   	 {
        	return parent::model($className);
   	 }
   	
   	public function tableName()
   	{
        	return 'teams';
   	}
	
	public function rules()
	{
		if(strtolower(Yii::app()->controller->action->id)=='addteam')
		{
			return array(
				array('sport_id,team_name','required'),
				array('gender,$temp_logo,logo','safe'),
				array('team_name','unique','message'=>'Already exists!'),

			);
		}
		else
		{
			return array(
				array('sport_id,team_name','required'),
				array('gender,$temp_logo,logo','safe'),
				
			);

		}
	} 
	public function relations()
	{
		return array(
				'sport'=>array(self::BELONGS_TO, 'Sports', 'sport_id'),
			);

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
			'team_name'=>'Team Name',
			'logo'=>'Image',
			'temp_logo'=>'Temp Image',
			'gender' => 'Gender',
			'sport_id' => 'Sport',
			'csv'=>'Upload CSV'
					);
	}
	public function deleteTeam($id)
	{
		$table = $this->tableName();
		$command = Yii::app()->db->createCommand();
		$command->delete($table, 'id=:id', array(':id'=>$id));
		return 1;
	}

	
}
?>
