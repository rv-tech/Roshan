<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ProfileForm extends CFormModel
{	
	public $id;
	public $profilepic;
	public $firstname;
	public $lastname;
	public $username;
	public $password;
	public $newpassword;
	public $confpassword;
	public $status;
	public $email;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('firstname, lastname , username, email, password' ,'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// not mendatory 
			array('profilepic','file','types'=>'jpg,jpeg,gif,png',),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'firstname'=>'Firstname :',
			'lastname'=>'Lastname :',
			'username'=>'Username :',
			'email'=>'E-mail :',
			'password'=>'Password :',
			'newpassword'=>'New Password',
			'confpassword'=>'Confirm Password :',
			'profilepic'=>'Avatar :',
		);
	}


}
