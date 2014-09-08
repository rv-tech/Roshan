<?php
class Channels extends CActiveRecord
{
	public $id,$name,$modified,$logo,$temp_logo;
	
	public static function model($className=__CLASS__)
   	 {
        	return parent::model($className);
   	 }
   	
   	public function tableName()
   	{
        	return 'channels';
   	}
	
	public function rules()
	{
		return array(
			array('name','required'),
			array('modified,$temp_logo,logo','safe'),
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
			'logo'=>'Image',
			'temp_logo'=>'Temp Image',
		);
	}
	public function deleteChannel($id)
	{
		$table = $this->tableName();
		$command = Yii::app()->db->createCommand();
		$command->delete($table, 'id=:id', array(':id'=>$id));
		return 1;
	}

	
}
?>
