<?php

class ProfileController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$check = $this->checkSession();
		if($check){
		$model = new ProfileForm;
		$id= Yii::app()->session['emp_id'];

		
		
		if(isset($_POST['ProfileForm']))
			{	
			
				$firstname= $_POST['ProfileForm']['firstname'];
				$lastname= $_POST['ProfileForm']['lastname'];
				$username= $_POST['ProfileForm']['username'];
				$email= $_POST['ProfileForm']['email'];
				$password= $_POST['ProfileForm']['password'];
				$newpassword= $_POST['ProfileForm']['newpassword'];
				$confpassword= $_POST['ProfileForm']['confpassword'];

				if(isset($_POST['ProfileForm']['confpassword']) && $_POST['ProfileForm']['confpassword'] != '')
				{
					if($newpassword == $confpassword){

					$user = User::model()->findByPk($id);
					$user->firstname = $firstname;
					$user->lastname = $lastname;
					$user->username = $username;
					$user->email = $email;
					$user->password = $confpassword;
					$user->update();
					Yii::app()->user->setFlash('success1','Updated with new password');
					$this->redirect(array('/profile/index'));
					//User::model()->updateByPk($id);	
					}
					else{
						Yii::app()->user->setFlash('Fail','Enter same password.');
						$this->redirect(array('/profile/index'));

					}
				}
				else{
					$user = User::model()->findByPk($id);
					$user->firstname = $firstname;
					$user->lastname = $lastname;
					$user->username = $username;
					$user->email = $email;
					$user->password = $password;
					$user->update();
					Yii::app()->user->setFlash('success2','Updated ');
					$this->redirect(array('/profile/index'));

				}
				
			}
		
		 
	 	$data= User::model()->findByPk($id);
		$this->layout = "admin";

		$this->render('index',array('model'=>$model,'data'=>$data));
		// collect user input data
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Add new Super admin 
	 */
	public function actionEmployee()
	{	
		$check = $this->checkSession();
		if($check){
		$model = new EmployeeForm;
		if(isset($_POST['EmployeeForm']))
			{	
				$firstname = $_POST['EmployeeForm']['firstname'];
				$lastname = $_POST['EmployeeForm']['lastname'];
				$email = $_POST['EmployeeForm']['email'];
				$password = $_POST['EmployeeForm']['password'];
				$status = $_POST['EmployeeForm']['status'];
				$data=User::model()->findByAttributes(array('email'=>$email));

				if($data['email'] == $email)
				{
					
				Yii::app()->user->setFlash('Fail','Email Already exist.Please re-enter');
				$this->redirect(array('/profile/employee'));
				$this->refresh();
    			} 
    			else {
    				
				$user = new User;
				$user->firstname=$firstname ;
				$user->lastname= $lastname ;
				$user->username = $email ;
				$user->email= $email ;
				$user->password = $password;
				$user->status =$status ;
				$user->profilepic = '';
				$user->save(); 
				$name=$firstname;
				$sub='Admin Account Created';
				$message = "<html><body>";
				$message .= "<h1>Hi ".$name."</h1>";
				$message .="<div><p>An Admin account has been created for you on tvmatches Admin Panel.</p>";
				$message .= "<p>Your login details:</p>";
				$message .= "<p>Admin Panel: http://admin.tvmatches.com</p>";
				$message .= "<p><span>Username:</span><span>".$email."</span></p>";
				$message .= "<p><span>Password:</span><span>".$password."</span></p></div>";
				$message .= "</body></html>";
				$subject='=?UTF-8?B?'.$sub.'?=';
				$headers="From: Michael <michael@cmarttech.com>\r\n".
					"Reply-To: <michael@cmarttech.com>\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/html; charset=UTF-8";

				mail($email,$subject,$message,$headers);
				Yii::app()->user->setFlash('success','added new User');
				$this->redirect(array('/profile/AllEmployee'));
				}
			
			}
		
		$this->layout = "admin";
		$this->render('addemployee',array('model'=>$model));
		
		}
	}
/* **  Show all user list   ** */
	public function actionAllEmployee()
	{	
		$check = $this->checkSession();
		if($check){

		$criteria=new CDbCriteria();
		$this->layout ="admin";
	    $count = User::model()->count($criteria);
	    $pages=new CPagination($count);
	    $pages->pageSize = 5;
	   	$pages->applyLimit($criteria);
	    $models=User::model()->findAll($criteria);
	  // echo "<pre>"; print_r($models); echo "<pre>";die; 
	    $this->render('allemployee', array(
	    'models' => $models,
		 'pages' => $pages
	    ));
		}
		
	}
/**  funtion to change user profie pic   **/
	public function actionChangePic()
	{
		$check = $this->checkSession();
		if($check){

		$model = new ChangepicForm;
		$id= Yii::app()->session['emp_id'];
		

		if(isset($_POST['ChangepicForm']))
			{
				
				$user = User::model()->findByPk($id);

				if($_POST['ChangepicForm']['hiddenpic']==$user->profilepic && $_FILES['ChangepicForm']['name']['profilepic']=="")
		   		{
				$user->profilepic = $_POST['ChangepicForm']['hiddenpic'];
				Yii::app()->session['admin_pic']=$_POST['ChangepicForm']['hiddenpic'];
				$user->update();
				Yii::app()->user->setFlash('success1','Old Avatar');
				$this->redirect(array('/profile/'));

				}
				else{

				$user = User::model()->findByPk($id);
				$model->profilepic = CUploadedFile::getInstance($model,'profilepic');
				$dest = Yii::getPathOfAlias('application.upload.avatar');
				$model->profilepic->saveAs(($dest.'/'.$model->profilepic));
				if($user->profilepic == ''){

				}
				else{
				unlink(Yii::app()->basePath.'/upload/avatar/'.$user->profilepic );
				}
				$user->profilepic = $model->profilepic;
				Yii::app()->session['admin_pic']=$model->profilepic;
				$user->update();

				Yii::app()->user->setFlash('success2','New Avatar Updated');
				$this->redirect(array('/profile/'));

				}
			}
		$data= User::model()->findByPk($id);
		$this->layout = "admin";
		$this->render('changepic',array('model'=>$model,'data'=>$data));
		}

	}
	/**  funtion to Delete user   **/
	public function actionDeleteEmployee()
	{
		$check = $this->checkSession();
		if($check){
		$id = Yii::app()->request->getParam('id');

		$model = new User;
		if($model->deleteUser($id))
		{	
			Yii::app()->user->setFlash('deleted',' User Deleted');
			$this->redirect(array('/profile/AllEmployee'));
		}
		}
	}
	/**  funtion to Edit user  data **/

	public function actionEditEmployee()
	{	
		$check = $this->checkSession();
		if($check){
		$model = new EditForm;
		
		$id = Yii::app()->request->getParam('id');

		
		if(isset($_POST['EditForm']))
		{	

			
		
				if(isset($_POST['EditForm']['confpassword']) && $_POST['EditForm']['confpassword'] != '' ){

					if($_POST['EditForm']['newpassword'] == $_POST['EditForm']['confpassword'] ){

						$User = User::model()->findByPk($id);
						$User->firstname = $_POST['EditForm']['firstname'];
				   		$User->lastname = $_POST['EditForm']['lastname'];
						$User->email = $_POST['EditForm']['email'];
				   		$User->username = $_POST['EditForm']['email'];
				   		//$User->status = $_POST['EditForm']['status'];
				   		$User->password = $_POST['EditForm']['confpassword'];


				   		if($User->validate())
						{
							if($User->update())
							{	
								Yii::app()->user->setFlash('updateuserpassword',' User informatoin with new password Updated');
								$this->redirect(array('/profile/AllEmployee'));	
							}
						
						}


					}
					else{

						Yii::app()->user->setFlash('failpassword','Please enter same Password to change');
						$this->redirect(array('/profile/EditEmployee?id='.$id));	

						}
						

				} 
				else{
						$User = User::model()->findByPk($id);
						$User->firstname = $_POST['EditForm']['firstname'];
				   		$User->lastname = $_POST['EditForm']['lastname'];
						$User->email = $_POST['EditForm']['email'];
				   		$User->username = $_POST['EditForm']['email'];
				   		//$User->status = $_POST['EditForm']['status'];


				   		if($User->validate())
						{
							if($User->update())
							{	
								Yii::app()->user->setFlash('updateuser',' User Data with old password Updated');
								$this->redirect(array('/profile/AllEmployee'));	
							}
						
						}

				}
				   				  
		}
		$data= User::model()->findByPk($id);
		$this->layout = "admin";

		$this->render('edituser',array('model'=>$model,'data'=>$data));
		}
	}
/**   funtion to activate and deactivate users **/
	public function actionProfileStatus()
	{
		$check = $this->checkSession();
		if($check){
		$model = new User;
		$id = $_GET['id'];
		if($_GET['status']==0)
		{
			$status = 1;
		}
		else
		{
			$status = 0;
		}
		$return = $model->statusUpdate($id,$status);
		$this->redirect(array('profile/AllEmployee'));
		}
			
	}

	function checkSession()
	{
		# code...
		if(!isset(Yii::app()->session['admin_emp'])){
			$this->redirect(array('/admin/index'));
		}
		else{

			return 1;
		}


	}
	
}
