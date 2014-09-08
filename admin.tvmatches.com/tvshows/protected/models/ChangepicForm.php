<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ChangepicForm extends CFormModel
{	
	public $id;
	public $profilepic;
	public $hiddenpic;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('hiddenpic','safe'),
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
			
			'profilepic'=>'Avatar :',
		);
	}


}
