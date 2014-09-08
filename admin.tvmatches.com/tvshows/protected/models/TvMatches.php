<?php
class TvMatches extends CActiveRecord
{
	public $id,$sport_id,$team1,$team2,$start_time,$start_date,$channel_id,$channel_id2,$status,$league_name;
	
	public static function model($className=__CLASS__)
   	 {
        	return parent::model($className);
   	 }
   	
   	public function tableName()
   	{
        	return 'tv_matches';
   	}
	
	public function rules()
	{
		return array(
			array('sport_id,team1,team2,start_date,start_time,start_date,league_name,channel_id','required'),
			array('channel_id2','safe'),
		);
	}
	public function relations()
    {
        return array(
            'sport'=>array(self::BELONGS_TO, 'Sports', 'sport_id'),
            'channel'=>array(self::BELONGS_TO, 'Channels', 'channel_id'),
            'channel2'=>array(self::BELONGS_TO, 'Channels', 'channel_id2'),

            
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
			'sport_id'=>'Select Sport',	
			'team1'=>'Team 1',
			'team2'=>'Team 2',
			'league_name'=>'League',

			'date_time'=>'Start Time',
			'start_date'=>'Start Date',
			'channel_id'=>'Select first Channel',
			'channel_id2'=>'Select Second Channel',
		);
	}
	public function deleteMatch($id)
	{
		$table = $this->tableName();
		$command = Yii::app()->db->createCommand();
		$command->delete($table, 'id=:id', array(':id'=>$id));
		return 1;
	}
	public function statusUpdate($id,$status)
	{
		$table = $this->tableName();
		$command = Yii::app()->db->createCommand();
		$command->update($table, array(
			    'status'=>$status,
			), 'id=:id', array(':id'=>$id));
		return 1;
		
	}

	
}
?>
