<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class EmployeeForm extends CFormModel
{
	public $firstname;
	public $lastname;
	public $email;
	public $password;
	public $status;
	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
				array('firstname, lastname , email, password , status' ,'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			array('status', 'boolean'),
		);
	}

	/***
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'firstname'=>'Firstname :',
			'lastname'=>'Lastname :',
			'email'=>'E-mail id:',
			'password'=>'Password :',
			'status'=>'Please tick to activate',
		);
	}

}