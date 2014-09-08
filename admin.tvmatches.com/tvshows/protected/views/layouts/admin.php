<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" type="text/css" media="all" />
        <!-- font Awesome -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" type="text/css" media="all" />
 	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" type="text/css" media="all" />
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ionicons.min.css" type="text/css" media="all" />
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/css/morris/morris.css" type="text/css" media="all" />
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css//jvectormap/jquery-jvectormap-1.2.2.css" type="text/css" media="all" />
        <!-- bootstrap wysihtml5 - text editor --> 
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" type="text/css" media="all" />
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/AdminLTE.css" type="text/css" media="all" />
        
    
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue" onload="JavaScript:AutoRefresh(898000);">
         <?php $action = strtolower(Yii::app()->controller->action->id);
      
       ?>
        <!-- header logo: style can be found in header.less -->
        <header class="header">



            <a href="<?php echo yii::app()->request->baseUrl?>/index.php/admin/index" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <img src="<?php echo yii::app()->request->baseUrl?>/images/Logo1.png" style="height:45px">
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                   
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo Yii::app()->session['admin_fn'] ." ". Yii::app()->session['admin_ln'] ; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <?php
                                    if(Yii::app()->session['admin_pic'] == ''){ ?>
                                     <img src = "<?php echo Yii::app()->baseUrl.'/protected/upload/defaulprofile/avatar3.png'; ?>">
                                        <?php
                                    }
                                    else{ ?>
                                     <img src = "<?php echo Yii::app()->baseUrl.'/protected/upload/avatar/'.Yii::app()->session['admin_pic']; ?>">
                                    <?php   

                                    }
                                    ?>

                                    <!--img src="<?php // echo Yii::app()->request->baseUrl; ?>/images/avatar3.png" class="img-circle" alt="User Image" /-->
                                    <p>
                                        <?php echo Yii::app()->session['admin_fn'] ." ". Yii::app()->session['admin_ln'] ; ?>
                                        <small>Welcome to TV Matches </small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                         <?php echo CHtml::link('Profile',array('/profile'),array('class'=>'btn btn-default btn-flat')); ?> 
                                    </div>
                                    <div class="pull-right">
                                        <?php echo CHtml::link('Sign out',array('admin/Logout'),array('class'=>'btn btn-default btn-flat')); ?> 
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php
                            if(Yii::app()->session['admin_pic'] == ''){ ?>
                             <img src = "<?php echo Yii::app()->baseUrl.'/protected/upload/defaulprofile/avatar3.png'; ?>">
                                <?php
                            }
                            else{ ?>
                             <img src = "<?php echo Yii::app()->baseUrl.'/protected/upload/avatar/'.Yii::app()->session['admin_pic']; ?>">
                            <?php   

                            }
                            ?>

                            <!--img src="<?php //echo Yii::app()->request->baseUrl; ?>/images/avatar3.png" class="img-circle" alt="User Image" /-->
                        </div>
                        <div class="pull-left info">
                            <p>Hello <?php echo Yii::app()->session['admin_fn'] ." ". Yii::app()->session['admin_ln'] ; ?> </p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?php echo yii::app()->request->baseUrl?>/index.php/admin">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <!--li>
                            <a href="pages/widgets.html">
                                <i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li-->
                        <li class="treeview">
                            <?php $match_action = array('sports','tvchannels','tvmatches','team','league');?>
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Match Table</span>
                                <i <?php if(in_array($action,$match_action)){ echo 'class="fa fa-angle-down pull-right"'; } else { echo 'class="fa fa-angle-left pull-right"'; }?> class="fa fa-angle-left pull-right"></i>
                            </a>
                                                     
                            <ul class="treeview-menu" <?php if(in_array($action,$match_action)){ echo 'style="display:block"'; }?>>
                                <li <?php if(@$action == 'tvmatches'){ echo 'class="active"'; } ?> ><?php echo CHtml::link('Add Match',array('admin/TvMatches')); ?></li>
                                <li <?php if(@$action == 'team'){ echo 'class="active"'; } ?> ><?php echo CHtml::link('Add Team',array('admin/Team')); ?></li>
                                <li <?php if(@$action == 'sports'){ echo 'class="active"'; } ?> ><?php echo CHtml::link('Add Sport',array('admin/Sports')); ?></li>
                                <li <?php if(@$action == 'league'){ echo 'class="active"'; } ?> ><?php echo CHtml::link('Add League',array('admin/League')); ?></li>
                                <li <?php if(@$action == 'tvchannels'){ echo 'class="active"'; } ?> ><?php echo CHtml::link('Add Channel',array('admin/TvChannels')); ?></li>
                                

                              <!--  <li><a href="pages/UI/icons.html"><i class="fa fa-angle-double-right"></i> TvChannels </a></li> -->
                          </ul>
                        </li>
                        <li class="treeview">
                            <?php $customer_action = array('addcustomer','customer','tvchannels','tvmatches','team','league');?>
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Customer Admin</span>
                                <i <?php if(in_array($action,$customer_action)){ echo 'class="fa fa-angle-down pull-right"'; } else { echo 'class="fa fa-angle-left pull-right"'; }?> class="fa fa-angle-left pull-right"></i>
                            </a>
                                                     
                            <ul class="treeview-menu" <?php if(in_array($action,$customer_action)){ echo 'style="display:block"'; }?>>
                                <li <?php if(@$action == 'customer'){ echo 'class="active"'; } ?> ><?php echo CHtml::link('Add Customer',array('admin/Customer')); ?></li>
                                <!--  <li><a href="pages/UI/icons.html"><i class="fa fa-angle-double-right"></i> TvChannels </a></li> -->
                          </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Settings </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <?php $setting_action = array('index','allemployee');?>
                            <ul class="treeview-menu" <?php  if(in_array($action,$setting_action)){ echo 'style="display:block"'; }?>>
                                <li <?php if(@$action == 'index'){ echo 'class="active"'; } ?>  ><?php echo CHtml::link('Profile',array('/profile')); ?></li>
                                <li <?php if(@$action == 'allemployee'){ echo 'class="active"'; } ?>  ><?php echo CHtml::link('Users',array('profile/allemployee')); ?></li>

                              <!--  <li><a href="pages/UI/icons.html"><i class="fa fa-angle-double-right"></i> TvChannels </a></li> -->
                            </ul>
                        </li>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            

                <!-- Main content -->
                <?php echo $content; ?>
                <!---End main content --->
                           </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <?php $script_action = array('addtvmatches','editmatch '); if(!in_array($action,$script_action)){ ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <?php } ?>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
       
        <!-- datepicker -->
        
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/AdminLTE/demo.js" type="text/javascript"></script>
<script type="text/javascript">
/*var show_close_alert = false;

$("a").bind("mouseup", function() {
    //show_close_alert = true;
});

$("form").bind("submit", function() {
    //show_close_alert = false;
});

$(window).bind("beforeunload", function() {
   
       location.href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/admin/logout";
       return true;
   
});*/

/*$(function(){
    alert(<?php Yii::app()->session['emp_id'] ?>);
    //uid = <?php echo Yii::app()->session['emp_id'] ?>;
  // $.ajax({url:"<?php echo Yii::app()->request->baseUrl; ?>/index.php/admin/timedifference",data:{id:uid},success:function(result){
    //$("#div1").html(result);
 // }});
});*/

function AutoRefresh( t ) {

    setTimeout("location.href='<?php echo Yii::app()->request->baseUrl; ?>/index.php/admin/logout';", t);
}
</script>
    </body>
</html>
