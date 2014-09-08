<?php

class AdminController extends Controller
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
	/*public function actionIndex()
	{
		$this->layout = "default";
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$this->render('index');
	}*/

	public function actionDashboard()
	{	
		 //echo Yii::app()->session->timeout;
		
		$check = $this->checkSession();
		if($check){
		
		$criteria = new CDbCriteria();
		$tvmatch = TvMatches::model()->count($criteria);
		$channels = Channels::model()->count($criteria);
		$sports = Sports::model()->count($criteria);
		$user = User::model()->count($criteria);
		$this->layout = "admin";
		$this->render('dashboard',array('tvmatch'=>$tvmatch , 'channels' => $channels , 'sports'=>$sports ,'user'=>$user));
		}
	}

// Start: Match Table Module...

	public function actionTvmatches()
	{	
		$check = $this->checkSession();
		if($check){
		$criteria = new CDbCriteria();
		$this->layout = "admin"; 

		$count = TvMatches::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->pageSize = 10;

		$criteria->order = "start_date ASC,start_time ASC";
		$pages->applyLimit($criteria);
		$models = TvMatches::model()->with('sport','channel','channel2')->findAll($criteria);

		$this->render('tvmatches',array(
				'models' => $models,
				'pages' => $pages
			));
		}
	}
	public function actionAddTvmatches()
	{	
		$check = $this->checkSession();
		if($check){
		$model = new TvMatches();
		$this->layout = "admin";
		if(isset($_POST['TvMatches']))
		{
			$model->attributes = $_POST['TvMatches'];
			$model->modified = date('Y-m-d');
			//echo "<pre>";print_r($model);echo "<pre>";die;
			if($model->validate())
			{
				if($model->save())
				{
					$this->redirect(array('admin/TvMatches'));
				}
				
			}
			
		}
		
		$this->render('add_tvmatches',array('model'=>$model));
		}
	}
	public function actionEditMatch()
	{

		$check = $this->checkSession();
		if($check){
		$this->layout = "admin";
		$id = Yii::app()->request->getParam('id');
		$criteria = new CDbCriteria();
		$criteria->condition ='id=:id';
		$criteria->params = array(':id'=>$id);
		$data = TvMatches::model()->findall($criteria);
		//echo "<pre>"; print_r($data); echo "<pre>";die;
		$model = new TvMatches();
			
		if(isset($_POST['TvMatches']))
		{
		    $TvMatches = TvMatches::model()->findByPk($id);
		  
	   		$TvMatches->sport_id = $_POST['TvMatches']['sport_id'];
	   		$TvMatches->team1 = $_POST['TvMatches']['team1'];
			$TvMatches->team2 = $_POST['TvMatches']['team2'];
	   		$TvMatches->start_date = $_POST['TvMatches']['start_date'];
	   		$TvMatches->start_time = $_POST['TvMatches']['start_time'];
	   		$TvMatches->channel_id = $_POST['TvMatches']['channel_id'];
			$TvMatches->modified = date('Y-m-d');
	   		if($TvMatches->validate())
			{
				if($TvMatches->update())
				{
					$this->redirect(array('/admin/TvMatches'));	
				}
			
			}
		  
		 		  
		}
		$this->render('edit_match',array('model' => $model,'data'=>$data));
		}
	}
	public function actionMatchStatus()
	{   

		$check = $this->checkSession();
		if($check){
		$model = new TvMatches();
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
		$this->redirect(array('admin/TvMatches'));
		}	
	}
	public function actionMatchDelete()
	{	
		$check = $this->checkSession();
		if($check){
		$id = $_GET['id'];
		$model = new TvMatches;
		if($model->deleteMatch($id))
		{
			$this->redirect(array('/admin/tvmatches'));
		}
	}

	}
//End : Match Module
//Start : Sport Module

	public function actionAddSport()
	{
		$check = $this->checkSession();
		if($check){

		$model = new Sports();
	//	echo "<pre>";print_r($model);echo "<pre>";die;
		$this->layout = "admin";
		if(isset($_POST['Sports']))
		{

			$model->attributes = $_POST['Sports'];

			$model->logo = CUploadedFile::getInstance($model,'logo');

			$model->modified = date('Y-m-d');
			$dest = Yii::getPathOfAlias('application.upload.sports');
			//echo "<pre>";print_r($model);echo "<pre>";die;
			if($model->validate())
			{
				$model->temp_logo = time();
				if($model->save())
				{
					if(!empty($model->logo))
					{
						$model->logo->saveAs(($dest.'/'.$model->temp_logo.'.'.$model->logo->extensionName));
							
					}
					$this->redirect(array('/admin/sports'));
				}
				
			}
			
		}
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//echo 'hii';die;
		$this->render('add_sport',array('model'=>$model));

	}
		
	}
	public function actionEditSport()
	{	
		$check = $this->checkSession();
		if($check){
		$this->layout = "admin";
		$id = Yii::app()->request->getParam('id');
		$criteria = new CDbCriteria();
		$criteria->condition ='id=:id';
		$criteria->params = array(':id'=>$id);
		$data = Sports::model()->findall($criteria);
		$model = new Sports();
		if(isset($_POST['Sports']))
		{
		   $sport = Sports::model()->findByPk($id);
		   if($_POST['Sports']['logo_hidden']==$sport->logo && $_FILES['Sports']['name']['logo']=="")
		   {
		   		$sport->logo = $_POST['Sports']['logo_hidden'];
		   		$sport->modified = date('Y-m-d');
		   		$sport->name = $_POST['Sports']['name'];
		   		if($sport->validate())
				{
					if($sport->update())
					{
						$this->redirect(array('/admin/sports'));	
					}
				
				}
		   		// updame same logo
		   }
		   else
		   {
		   
		   		$sport->name = $_POST['Sports']['name'];
		   		$sport->logo = CUploadedFile::getInstance($sport,'logo');
		   		$sport->temp_logo = time();
           		$dest = Yii::getPathOfAlias('application.upload.sports');
           		$sport->logo->saveAs(($dest.'/'.$sport->temp_logo.'.'.$sport->logo->extensionName));
           		//for unlink the previous uploaded image  
           		$old_imageArray = explode('.',$_POST['Sports']['logo_hidden']);
           		$old_extention = $old_imageArray[1];
           		unlink(Yii::app()->basePath.'/upload/sports/'.$data[0]->temp_logo.'.'.$old_extention);
           		//end of unlink
           		$sport->modified = date('Y-m-d');
          		if($sport->validate())
				{
					if($sport->update())
					{
						$this->redirect(array('/admin/sports'));	
					}
				
				}
		   	    // new image update
		   }
		  
		}
		$this->render('edit_sport',array('model' => $model,'data'=>$data));
	}
	}

	public function actionSports()
	{	
		$check = $this->checkSession();
		if($check){

		$criteria=new CDbCriteria();

		$this->layout ="admin";

	    $count = Sports::model()->count($criteria);
	   // echo $count;die;
	    $pages=new CPagination($count);
	    $pages->pageSize = 10;
	   	$pages->applyLimit($criteria);
	    $models=Sports::model()->findAll($criteria);

	    $this->render('sports', array(
	    'models' => $models,
		 'pages' => $pages
	    ));
		
		}
	}
	
	public function actionDeleteSport()
	{	$check = $this->checkSession();
		if($check){
		$id = $_GET['id'];
		$model = new Sports;
		if($model->deleteSport($id))
		{
			$this->redirect(array('/admin/sports'));
		}
		}
 	}
 	//End Sport Module
	// Channel Module Start..........

	public function actionEditChannel()
	{	

		$check = $this->checkSession();
		if($check){

		$this->layout = "admin";
		$id = Yii::app()->request->getParam('id');
		$criteria = new CDbCriteria();
		$criteria->condition ='id=:id';
		$criteria->params = array(':id'=>$id);
		$data = Channels::model()->findall($criteria);
		$model = new Channels();
			
		if(isset($_POST['Channels']))
		{
		   $channel = Channels::model()->findByPk($id);
		   if($_POST['Channels']['logo_hidden']==$channel->logo && $_FILES['Channels']['name']['logo']=="")
		   {
		   		$channel->logo = $_POST['Channels']['logo_hidden'];
		   		$channel->modified = date('Y-m-d');
		   		$channel->name = $_POST['Channels']['name'];
		   		if($channel->validate())
				{
					if($channel->update())
					{
						$this->redirect(array('/admin/TvChannels'));	
					}
				
				}
		   		// updame same logo
		   }
		   else
		   {
		   		$channel->name = $_POST['Channels']['name'];
		   		$channel->logo = CUploadedFile::getInstance($channel,'logo');
           		$channel->temp_logo = time();
           		$dest = Yii::getPathOfAlias('application.upload.tvchannels');
           		$channel->logo->saveAs(($dest.'/'.$channel->temp_logo.'.'.$channel->logo->extensionName));

           		//for unlink the previous uploaded image  
           		$old_imageArray = explode('.',$_POST['Channels']['logo_hidden']);
           		$old_extention = $old_imageArray[1];
           		unlink(Yii::app()->basePath.'/upload/tvchannels/'.$data[0]->temp_logo.'.'.$old_extention);
           		//end of unlink

           		$channel->modified = date('Y-m-d');
          		if($channel->validate())
				{
					if($channel->update())
					{
						$this->redirect(array('/admin/TvChannels'));	
					}
				
				}
		   	    // new image update
		   }
		  
		}
		$this->render('edit_channel',array('model' => $model,'data'=>$data));
		
		}

		
	}

	public function actionAddChannel()
	{
		$check = $this->checkSession();
		if($check){
		$model = new Channels();
		$this->layout = "admin";
		if(isset($_POST['Channels']))
		{

			$model->attributes = $_POST['Channels'];
			$model->logo = CUploadedFile::getInstance($model,'logo');
			$model->modified = date('Y-m-d');
			$dest = Yii::getPathOfAlias('application.upload.tvchannels');
			if($model->validate())
			{

				$model->temp_logo = time();
				if($model->save())
				{
					if(!empty($model->logo))
					{
						$model->logo->saveAs(($dest.'/'.$model->temp_logo.'.'.$model->logo->extensionName));
							
					}
					$this->redirect(array('/admin/tvchannels'));
				}
				
			}
			
		}
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//echo 'hii';die;
		$this->render('add_channel',array('model'=>$model));
		}
		
	}
	public function actionTvchannels()
	{
		$check = $this->checkSession();
		if($check){
		$criteria = new CDbCriteria();
		$this->layout = "admin"; 

		$count = Channels::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->pageSize = 10;
		$pages->applyLimit($criteria);
		$models = Channels::model()->findAll($criteria);
 		//echo "<pre>"; print_r($models); echo "<pre>";die;	
		$this->render('tvchannels',array(
				'models' => $models,
				'pages' => $pages
			));
		}

	}

	public function actionDeleteChannel()
	{	$check = $this->checkSession();
		if($check){
			$id = $_GET['id'];
			$model = new Channels;
			if($model->deleteChannel($id))
			{
				$this->redirect(array('/admin/tvchannels'));
			}
		}

	}

//  Channel Module End....

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
	public function actionIndex()
	{		
			$model=new LoginForm;
			$this->layout = "default";

			if(isset(Yii::app()->session['admin_emp'])){

				$this->redirect(array('/admin/dashboard'));
			}
		else{
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
				if($model->validate() && $model->login()){

					if(isset(Yii::app()->session['admin_emp']))
					$this->redirect(array('/admin/dashboard'));
				
					}
			}
			
			// display the login form
			$this->render('index',array('model'=>$model));
		}
	}

	//  Forgot Password

	public function actionForgetpassword()
	{
		$this->layout = "default";
		$model = new LoginForm;

		if(isset($_POST['LoginForm']))
		{
			$check_username = $_POST['LoginForm']['username'];
			

			$criteria = new CDbCriteria();
			$criteria->condition = 'username = :username';
			$criteria->params = array(':username'=>$check_username);
			$get_user = LoginForm::model()->findAll($criteria);
			//echo "<pre>";print_r($count); echo "<pre>";die;
			if(!empty($get_user))
			{
				$password = $this->generateRandomString();
				$table = $model->tableName();
				$command = Yii::app()->db->createCommand();

				$command->update($table, array(
			    'password'=>$password,
				), 'username=:username', array(':username'=>$check_username));
				

			  
			   $name=$get_user[0]->firstname;
			   $email=$get_user[0]->email;

          	   $sub='New password created';
	           $message = "<html><body>";
	           $message .= "<h1>Hi ".$name."</h1>";
	           $message .="<div><p>A new password has been created for you on tvmatches Admin Panel.</p>";
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
            	Yii::app()->user->setFlash('success','A new password has been successfully created.Please check your email to see the password.');

			}
			else
			{
				$wrongEmail = "Please enter correct emailId";
				$this->render('forgetpassword',array('model'=>$model,'wrongEmail'=>$wrongEmail));
			}

		}
		$this->render('forgetpassword',array('model'=>$model));

	}

	public function actionAddTeam()
	{	
		//$check = $this->checkSession();
		//if($check){
		$model = new Teams();
		$this->layout = "admin";

		if(isset($_POST['Teams']))
		{
			$model->attributes = $_POST['Teams'];
			$model->logo = CUploadedFile::getInstance($model,'logo');
			$dest = Yii::getPathOfAlias('application.upload.teams');
			if($model->validate())
			{

				$model->temp_logo = time();
				if($model->save())
				{
					if(!empty($model->logo))
					{
						$model->logo->saveAs(($dest.'/'.$model->temp_logo.'.'.$model->logo->extensionName));
							
					}
					$this->redirect(array('/admin/Team'));
				}
				
			}
			
		}
		
		$this->render('add_team',array('model'=>$model));
		//}
	}

	public function actionTeam()
	{	
		$check = $this->checkSession();
		if($check){
				
		$criteria = new CDbCriteria();
		$this->layout = "admin"; 

		$count = Teams::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->pageSize = 10;
		$criteria->order = 'team_name ASC';
		$pages->applyLimit($criteria);
		$models = Teams::model()->with('sport')->findAll($criteria);

		$this->render('team',array(
				'models' => $models,
				'pages' => $pages
			));
		}
	}

	public function actionEditTeam()
	{	

		$check = $this->checkSession();
		if($check){

		$this->layout = "admin";
		$id = Yii::app()->request->getParam('id');
		$criteria = new CDbCriteria();
		$criteria->condition ='id=:id';
		$criteria->params = array(':id'=>$id);
		$data = Teams::model()->findall($criteria);
		$model = new Teams();
			
		if(isset($_POST['Teams']))
		{

		   $team = Teams::model()->findByPk($id);
		   if($_POST['Teams']['logo_hidden']==$team->logo && $_FILES['Teams']['name']['logo']=="")
		   {
		   		$team->logo = $_POST['Teams']['logo_hidden'];
		   		$team->team_name = $_POST['Teams']['team_name'];
		   		$team->gender = $_POST['Teams']['gender'];
		   		$team->sport_id = $_POST['Teams']['sport_id'];


		   		if($team->validate())
				{
					if($team->update())
					{
						$this->redirect(array('/admin/Team'));	
					}
				
				}
		   		// updame same logo
		   }
		   else
		   {
		   		$team->team_name = $_POST['Teams']['team_name'];
		   		$team->gender = $_POST['Teams']['gender'];
		   		$team->sport_id = $_POST['Teams']['sport_id'];
		   		$team->logo = CUploadedFile::getInstance($team,'logo');
           		$team->temp_logo = time();
           		$dest = Yii::getPathOfAlias('application.upload.teams');
           		$team->logo->saveAs(($dest.'/'.$team->temp_logo.'.'.$team->logo->extensionName));

           		//for unlink the previous uploaded image  
           		$old_imageArray = explode('.',$_POST['Teams']['logo_hidden']);
           		$old_extention = $old_imageArray[1];
           		unlink(Yii::app()->basePath.'/upload/teams/'.$data[0]->temp_logo.'.'.$old_extention);
           		//end of unlink

           		
          		if($team->validate())
				{
					if($team->update())
					{
						$this->redirect(array('/admin/Team'));	
					}
				
				}
		   	    // new image update
		   }
		  
		}
		$this->render('edit_team',array('model' => $model,'data'=>$data));
		
		}

		
	}
	public function actionSportcsv()
	{
		$this->layout = "admin";
		$check = $this->checkSession();
		if($check)
		{
		
			$model = new Teams;
			if(@$_POST['Teams'])
			{
			
				$uploadFile = CUploadedFile::getInstance($model,'csv');
				$dest = Yii::getPathOfAlias('application.upload.csv');
				$uploadFile->saveAs(($dest.'/'.$uploadFile));
				$file_path = Yii::app()->basePath. '/upload/csv/'.$uploadFile;
               	$sheet_array = Yii::app()->yexcel->readActiveSheet($file_path);
            	$c = count($sheet_array);
          	    for($i=2; $i<=$c; $i++)
          	    {

                   $team_name = $sheet_array[$i]['B'];
                   $data=Teams::model()->findByAttributes(array('team_name'=>$team_name));

                   if($data['team_name'] != $team_name)
                   {
                           $Excel = new Teams;
                           $Excel->sport_id=$sheet_array[$i]['A'];                
                           $Excel->team_name=$sheet_array[$i]['B'];
                           $Excel->gender=$sheet_array[$i]['C'];
                           $Excel->save();
                           
                   	}
                } 
               $this->redirect(array('/admin/team'));
            }
               
			$this->render('sportcsv',array('model'=>$model));
			
		}
	}

	public function actionExportSportCSV()
	{	$check = $this->checkSession();
		if($check){

			$sports = Sports::model()->findAll();
            $temp = array();
          	$i=0;
          	foreach($sports as $key=>$val)
          	{
                $temp[$i]=array($val->id,$val->name);
                $i++;
          	}
         
           /* code forexporting file */
           Yii::Import('application.extensions.ExportXLS.ExportXLS');
           // Xls Header Row
           
           $headercolums =array('sport_id','name');

           // Xls Data $temp
   
           // Xls File Name
           $filename = 'sports.xls';
           $xls      = new ExportXLS($filename);
           $header = null;
           $xls->addHeader($headercolums);
           $xls->addRow($temp);
           $xls->sendFile();
		}

	}

	public function actionDeleteTeam()
	{	$check = $this->checkSession();
		if($check){
			$id = $_GET['id'];
			$model = new Teams;
			if($model->deleteTeam($id))
			{
				$this->redirect(array('/admin/team'));
			}
		}

	}


	public function actionAddLeague()
	{
		$this->layout ="admin";
		$model = new Leagues;
		if(isset($_POST['Leagues']))
		{
			$model->attributes = $_POST['Leagues'];
			//echo "<pre>";print_r($model);echo "<pre>";die;
			if($model->validate())
			{
				if($model->save())
				{
					$this->redirect(array('admin/league'));
				}
				
			}
			
		}
		$this->render('add_league',array('model'=>$model));
	}

	public function actionLeague()
	{	
		//$check = $this->checkSession();
		//if($check){
		$criteria = new CDbCriteria();
		$this->layout = "admin"; 

		$count = Leagues::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->pageSize = 10;

		$criteria->order = "league_name ASC";
		$pages->applyLimit($criteria);
		$models = Leagues::model()->findAll($criteria);

		$this->render('league',array(
				'models' => $models,
				'pages' => $pages
			));
		//}
	}
	public function actionAjaxTeam($sport=null)
	{
		$model = new Teams;
		$sport_id = Yii::app()->getRequest()->getParam('id');
		$criteria = new CDbCriteria();
		$criteria->condition ='sport_id=:sport_id';
		$criteria->params = array(':sport_id'=>$sport_id);
		$team = Teams::model()->findall($criteria);
		//echo "<pre>";print_r($team);die;
			 
 		$this->renderPartial('_ajaxTeam',array('team'=>$team,'sport_id'=>$sport_id),false,true);
	}
	public function actionAjaxTeam2($sport=null)
	{
		$model = new Teams;
		$sport_id = Yii::app()->getRequest()->getParam('id');
		$criteria = new CDbCriteria();
		$criteria->condition ='sport_id=:sport_id';
		$criteria->params = array(':sport_id'=>$sport_id);
		$team = Teams::model()->findall($criteria);
		//echo "<pre>";print_r($team);die;
			 
 		$this->renderPartial('_ajaxTeam2',array('team'=>$team,'sport_id'=>$sport_id),false,true);
	}

	public function actionEditLeague()
	{

		//$check = $this->checkSession();
		//if($check){
		$this->layout = "admin";
		$id = Yii::app()->request->getParam('id');
		$criteria = new CDbCriteria();
		$criteria->condition ='id=:id';
		$criteria->params = array(':id'=>$id);
		$data = Leagues::model()->findall($criteria);
		//echo "<pre>"; print_r($data); echo "<pre>";die;
		$model = new Leagues();
			
		if(isset($_POST['Leagues']))
		{
		    $Leagues = Leagues::model()->findByPk($id);
		  
	   		$Leagues->league_name = $_POST['Leagues']['league_name'];
	   		$Leagues->description = $_POST['Leagues']['description'];
			if($Leagues->validate())
			{
				if($Leagues->update())
				{
					$this->redirect(array('/admin/league'));	
				}
			
			}
		  
		 		  
		}
		$this->render('edit_league',array('model' => $model,'data'=>$data));
		//}
	}

	public function actionLeagueDelete()
	{	
		$check = $this->checkSession();
		if($check)
		{
			$id = $_GET['id'];
			$model = new Leagues;
			if($model->deleteLeague($id))
			{
				$this->redirect(array('/admin/league'));
			}
		}

	}

	/**
	 * Customer module start here
	 */
	public function actionAddCustomer()
	{	
		$check = $this->checkSession();
		if($check){
		$model = new Customers();
		$this->layout = "admin";
		if(isset($_POST['Customers']))
		{
			
			$model->attributes = $_POST['Customers'];
			$password = $this->generateRandomString();

			$add = $_POST['Customers']['zipcode'].' '.$_POST['Customers']['address'].' '.$_POST['Customers']['country'];
			$addresss = urlencode($add);
		/*	$urll      = "http://maps.google.com/maps/api/geocode/json?address=$addresss";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $urll);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$response = curl_exec($ch);
			curl_close($ch);
			$response_a = json_decode($response);
			$latitude = $response_a->results[0]->geometry->location->lat;
			$longitude =  $response_a->results[0]->geometry->location->lng; */

			$model->latitude = $latitude;
			$model->longitude = $longitude;
			$model->password = $password;
			$model->status = 0;

			$user_name =  $_POST['Customers']['account_name'];
			$name =  $_POST['Customers']['cust_name'];
    		$email = $_POST['Customers']['email'];
			if($model->validate())
			{
				if($model->save())
				{
						$message =	'<html>
						<title></title>
						<head>
						</head>
						<body>
						<table width="750" border="0" cellspacing="0" cellpadding="0" style=" margin:0 auto; display:block; font-family:arial;">
						<tr>
						<td>
						    <table width="100%" cellspacing="0" cellpadding="0">
						        <tr>
						            <td>
						                <img src="http://admin.tvmatches.com/images/custlogo.png">
						            </td>
						        </tr>
						    </table>

						<table width="100%" cellspacing="0" cellpadding="0" style="padding:0 15px;">
						    <tr>
						<td>
						<h3>Dear '.$name.'</h3>
						<p style="margin:0;">Welcome to tvmatches!</p>
						<p style="margin:0;">We at cmarttech are thrilled to have you onboard.</p><br><br>
						</td>
						    </tr>



						    <tr>
						<td>
						    <h3 style="margin:0;">Get Started on tvmatches</h3>
						    <p style="margin:0;">Username: '.$user_name.'</p>
						    <p style="margin:0;">Password: '.$password.'</p>
						    <p style="margin:0;">Admin Panel:http://customer.tvmatches.com</p><br>
						</td>
						    </tr>
						    <tr>
						<td>
						    <h3 style="margin:0;">Contact Details</h3>
						    <p style="margin:0;">Support</p>
						    <p style="margin:0;">support@cmarttech.com</p>
						    <p style="margin:0;">+90530 1569631</p><br>
						</td>
						</tr>
						<tr>
						<td>
						    <p style="margin:0;">Anything else</p>
						    <p style="margin:0;">contact@cmarttech.com</p><br><br>
						</td>
						</tr>
						<tr>
						<td><p>We are excited you are here !<p>
						    <p style="margin:0;">Sincerely,</p><br>
						    <p style="margin:0;">cmarttech</p></td>
						</tr>


						</table>

						   
						</td>
						</tr>
						</table>
						</body>
						</html>';
	          	   $sub='New Account Created';
		           
		           $subject='=?UTF-8?B?'.$sub.'?=';
		           $headers="From: Michael <contact@cmarttech.com>\r\n".
	               "Reply-To: <contact@cmarttech.com>\r\n".
	               "MIME-Version: 1.0\r\n".
	               "Content-Type: text/html; charset=UTF-8";

	            	mail($email,$subject,$message,$headers);
					$this->redirect(array('admin/Customer'));
				}
				
			}
			
		}
		
		$this->render('add_customer',array('model'=>$model));
		}
	}

	public function actionCustomer()
	{	
		$check = $this->checkSession();
		if($check){
		$criteria = new CDbCriteria();
		$this->layout = "admin"; 

		$count = Customers::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->pageSize = 10;
		$pages->applyLimit($criteria);
		$models = Customers::model()->findAll($criteria);

		$this->render('customer',array(
				'models' => $models,
				'pages' => $pages
			));
		}
	}

	public function actionEditCustomer()
	{

		$check = $this->checkSession();
		if($check){
		$this->layout = "admin";
		$id = Yii::app()->request->getParam('id');
		$criteria = new CDbCriteria();
		$criteria->condition ='id=:id';
		$criteria->params = array(':id'=>$id);
		$data = Customers::model()->findall($criteria);
		//echo "<pre>"; print_r($data); echo "<pre>";die;
		$model = new Customers();
			
		if(isset($_POST['Customers']))
		{
		    $Customers = Customers::model()->findByPk($id);
		  
	   		$Customers->sport_bar = $_POST['Customers']['sport_bar'];
	   		$Customers->cust_name = $_POST['Customers']['cust_name'];
			$Customers->account_name = $_POST['Customers']['account_name'];
	   		$Customers->email = $_POST['Customers']['email'];
	   		$Customers->address = $_POST['Customers']['address'];
	   		$Customers->zipcode = $_POST['Customers']['zipcode'];
	   		$Customers->country = $_POST['Customers']['country'];


	   		$add = $_POST['Customers']['zipcode'].' '.$_POST['Customers']['address'].' '.$_POST['Customers']['country'];
			$addresss = urlencode($add);
			$urll      = "http://maps.google.com/maps/api/geocode/json?address=$addresss";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $urll);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$response = curl_exec($ch);
			curl_close($ch);
			$response_a = json_decode($response);
			$latitude = $response_a->results[0]->geometry->location->lat;
			$longitude =  $response_a->results[0]->geometry->location->lng;

			$Customers->latitude = $latitude;
			$Customers->longitude = $longitude;
	   		if($Customers->validate())
			{
				if($Customers->update())
				{
					$this->redirect(array('/admin/Customer'));	
				}
			
			}
		  
		 		  
		}
		$this->render('edit_customer',array('model' => $model,'data'=>$data));
		}
	}
	public function actionCustomerDelete()
	{	
		$check = $this->checkSession();
		if($check){
		$id = $_GET['id'];
		$model = new Customers;
		if($model->deleteCustomer($id))
		{
			$this->redirect(array('/admin/Customer'));
		}
	}

	}
	public function actionTest()
	{
		$this->layout="admin";
		$string_data = '';
		$data =Customers::model()->findAll();
		$i=0;
		foreach ($data as $key => $value)
		{
			if($i==0)
			{
				$i++;
				$string_data .='{"DisplayText":"'.$value->cust_name.'","Address":"'.$value->address.'","LatitudeLongitude":"'.$value->latitude.','.$value->longitude.'","MarkerId": "Customer"}';
			}
			else
			{
				$string_data .=',{"DisplayText":"'.$value->cust_name.'","Address":"'.$value->address.'","LatitudeLongitude":"'.$value->latitude.','.$value->longitude.'","MarkerId": "Customer"}';
			}

		}
		$new_string = "'[".$string_data."]'";
		$this->render('test',array('string_data'=>$new_string));
	}
	public function actionCustomerStatus()
	{   

		$check = $this->checkSession();
		if($check){
		$model = new Customers();
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
		$this->redirect(array('admin/Customer'));
		}	
	}
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{	
		$id= Yii::app()->session['emp_id'] ;

		if(@$id)
		{
			$User = User::model()->findByPk($id); 
			$User->Flag = 0;
			$User->update();
			
			unset(Yii::app()->session['admin_emp']);
			unset(Yii::app()->session['emp_id']) ;
	 		unset(Yii::app()->session['admin_emp']) ;
	 		unset(Yii::app()->session['admin_fn']) ;
	 		unset(Yii::app()->session['admin_ln']);
	 		unset(Yii::app()->session['admin_email']) ;
	 		unset(Yii::app()->session['admin_pic']) ;
	 	
			Yii::app()->user->logout();
		}
			$this->redirect(Yii::app()->homeUrl);
	}
// Common function for genrate random function
	function generateRandomString($length = 10)
	{
 	  	 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   		 $randomString = '';
   		 for ($i = 0; $i < $length; $i++)
   		 {

        	$randomString .= $characters[rand(0, strlen($characters) - 1)];
   		 }
    	return $randomString;
	}

	function timedifference()
	{
		echo 'sdfsd';
		exit;
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
