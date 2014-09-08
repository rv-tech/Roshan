<?php
class Sports extends CActiveRecord
{
	public $id,$name,$modified,$temp_logo,$logo;
	
	public static function model($className=__CLASS__)
   	 {
        	return parent::model($className);
   	 }
   	public function tableName()
   	 {
        	return 'sports';
   	}
	public function rules()
	{
		return array(
			array('name','required'),
			array('id,logo,modified,temp_logo','safe'),
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
			'name'=>'Name',
			'modified'=>'Modified',
			'temp_logo'=>'temp_logo',
			'logo'=>'logo',
		);
	}

	public function getsports()
	{	
		$table = $this->tableName();
		$sql = "SELECT * FROM $table";
		$command = Yii::app()->db->createCommand($sql);	
		return $command->queryall();
	}
	public function deleteSport($id)
	{
		$table = $this->tableName();
		$command = Yii::app()->db->createCommand();
		$command->delete($table, 'id=:id', array(':id'=>$id));
		return 1;
	}

	
}
?>
