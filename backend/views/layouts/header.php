<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo blue-bg">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="/img/logo-n-blue.png" alt=""></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="/img/logo-blue.png" alt=""></span> </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar blue-bg navbar-static-top">
        <!-- Sidebar toggle button-->
        <ul class="nav navbar-nav pull-left">
            <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
        </ul>
        <div class="pull-left search-box">
            <form action="#" method="get" class="search-form">
                <div class="input-group">
                    <input name="search" class="form-control" placeholder="Search..." type="text">
                    <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
            </span></div>
            </form>
            <!-- search form --> </div>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 new messages</li>
                        <li>
                            <ul class="menu">
                                <li><a href="#">
                                        <div class="pull-left"><img src="/img/img1.jpg" class="img-circle" alt="User Image"> <span class="profile-status online pull-right"></span></div>
                                        <h4>Alex C. Patton</h4>
                                        <p>I've finished it! See you so...</p>
                                        <p><span class="time">9:30 AM</span></p>
                                    </a></li>
                                <li><a href="#">
                                        <div class="pull-left"><img src="/img/img4.jpg" class="img-circle" alt="User Image"> <span class="profile-status busy pull-right"></span></div>
                                        <h4>Florence S. Kasper</h4>
                                        <p>I've finished it! See you so...</p>
                                        <p><span class="time">12:15 AM</span></p>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Notifications</li>
                        <li>
                            <ul class="menu">
                                <li><a href="#">
                                        <div class="pull-left icon-circle red"><i class="icon-lightbulb"></i></div>
                                        <h4>Alex C. Patton</h4>
                                        <p>I've finished it! See you so...</p>
                                        <p><span class="time">9:30 AM</span></p>
                                    </a></li>
                                <li><a href="#">
                                        <div class="pull-left icon-circle yellow"><i class="fa  fa-plane"></i></div>
                                        <h4>Florence S. Kasper</h4>
                                        <p>I've finished it! See you so...</p>
                                        <p><span class="time">11:10 AM</span></p>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">Check all Notifications</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/img/img1.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo Yii::$app->user->identity->username;?></span> </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <div class="pull-left user-img">
                                <img src="/img/img1.jpg" class="img-responsive" alt="User">
                            </div>
                            <p class="text-left"><?php echo Yii::$app->user->identity->username;?> <small><?php echo Yii::$app->user->identity->email;?></small> </p>
                            <div class="view-link text-left"><a href="#"> 个人信息</a> </div>
                        </li>
                        <li><a href="#"><i class="icon-profile-male"></i> 资料信息</a></li>
                        <!--<li><a href="#"><i class="icon-wallet"></i> My Balance</a></li>-->
                        <li><a href="#"><i class="icon-envelope"></i> 邮件信息</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="icon-gears"></i> 系统设置</a></li>
                        <li role="separator" class="divider"></li>
                        <li><?= Html::a(
                            '<i class="fa-refresh"></i> 清空缓存',
                            ['/site/flush']
                            ) ?></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="">
                                <?= Html::a(
                                    '<i class="fa fa-power-off"></i>退出',
                                    ['/site/logout'],
                                    ['data-method' => 'post']
                                ) ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
