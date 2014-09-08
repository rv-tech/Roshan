<?php

class OtherController extends Controller
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
		
		/* $file_path = Yii::app()->basePath. '/upload/test.xls';
		$sheet_array = Yii::app()->yexcel->readActiveSheet($file_path);
		$c= count($sheet_array);
		
		//print_r($sheet_array);

		for($i=5; $i<=$c; $i++){

			
			 $title = $sheet_array[$i]['A'];

			$data=Excel::model()->findByAttributes(array('title'=>$title));

				if($data['title'] != $title)
				{
					$Excel = new Excel;
					$Excel->title=$sheet_array[$i]['A'];		
					$Excel->url=$sheet_array[$i]['B'];
					$Excel->Visitors=$sheet_array[$i]['C'];
					$Excel->Accesses=$sheet_array[$i]['D'];
					$Excel->save();
					
				}
			
		
		}*/
		$sports = Sports::model()->findAll();
		
		$temp = array();
           $i=0;
           foreach($sports as $key=>$val)
           {
                   //echo "<pre>";print_r($val);
                   $temp[$i]=array($val->id,$val->name);
                   $i++;
           }
           
		/* code forexporting file */
		Yii::Import('application.extensions.ExportXLS.ExportXLS');
		// Xls Header Row
		
		$headercolums =array('id','name'); 
 
		// Xls Data
		
	
		 
		// Xls File Name
		$filename = 'my.xls';
		    $xls      = new ExportXLS($filename);
		    $header = null;
		    $xls->addHeader($headercolums);
		    $xls->addRow($temp);
		    $xls->sendFile();	
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
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}