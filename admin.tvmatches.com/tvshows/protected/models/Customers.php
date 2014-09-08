<?php
class Customers extends CActiveRecord
{
	public $city,$id,$cust_name,$account_name,$email,$sport_bar,$zipcode,$password,$country,$state,$status,$latitude,$longitude;
	
	public static function model($className=__CLASS__)
   	 {
        	return parent::model($className);
   	 }
   	
   	public function tableName()
   	{
        	return 'customers';
   	}
	
	public function rules()
	{
		
		return array(
			array('sport_bar,account_name,cust_name,address,email,latitude,longitude,zipcode,country','required'),
			//array('zipcode','safe'),
			array('account_name','unique','message'=>'Already exists!'),
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
			'cust_name'=>'Customer Name',
			'account_name'=>'Account Name',
			'email'=>'Email Id',
			'address' => 'Address',
			'zipcode'=>'Zipcode',
			'status'=>'Status',
			'country'=>'Country',

			'sport_bar'=>'Sport bar',
			'password'=>'Password',
			);

	}
	public function deleteCustomer($id)
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
