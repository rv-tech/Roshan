<?php


class EditForm extends CFormModel
{	
	public $id;
	public $firstname;
	public $lastname;
	public $email;
	public $status;
	public $newpassword;
	public $confpassword;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('id ,firstname ,lastname, email  ' ,'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// not mendatory 
			array('status', 'boolean'),
			// not required 
			array('newpassword , confpassword ','safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			
			'firstname'=>'Firstname :',
			'lastname'=>'lastname :',
			'email'=>'Email :',
			'status'=>'Status :',
			'newpassword'=>'New Password',
			'confpassword'=>'Confirm Password :',
			

		);
	}


}
