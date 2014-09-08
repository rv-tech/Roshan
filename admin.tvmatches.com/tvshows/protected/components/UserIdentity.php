<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

public function authenticate()
	{
		$record= User::model()->findByAttributes(array('username'=>$this->username,'password'=>$this->password,'status'=>1));
		if(!isset($this->username) || !isset($this->password))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($record===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else{
			 $User = User::model()->findByPk($record['id']); 
			 $User->Flag = 1;
			 $User->update();
		 	
			Yii::app()->session['emp_id'] =$record['id'] ;
 			Yii::app()->session['admin_emp'] = $record['username'] ;
 			Yii::app()->session['admin_fn'] = $record['firstname'] ;
 			Yii::app()->session['admin_ln'] = $record['lastname'] ;
 			Yii::app()->session['admin_email'] = $record['email'] ;
 			Yii::app()->session['admin_pic'] = $record['profilepic'] ;
 			
            $this->errorCode=self::ERROR_NONE;
            return !$this->errorCode;
		}
}
	
		


}


