<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
//"plugins/morris/morris.js",
// "plugins/functions/morris-init.js",
//$this->registerJsFile('@web/plugins/morris/morris.js',['depends'=>['backend\assets\AppAsset']]);
//$this->registerJsFile('@web/plugins/functions/morris-init.js',['depends'=>['backend\assets\AppAsset']]);
?>

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-12">
            <div class="info-box">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div> <i class="ti-face-smile f-20 text-blue"></i>
                            <div class="info-box-content">
                                <h1 class="f-25 text-black">1,150</h1>
                                <span class="progress-description">New Orders</span> </div>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:40%; height:6px;"> <span class="sr-only">40% Complete</span> </div>
                            </div>
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div> <i class="ti-bar-chart f-20 text-danger"></i>
                            <div class="info-box-content">
                                <h1 class="f-25 text-black">2,030</h1>
                                <span class="progress-description">New Orders</span> </div>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div> <i class="ti-panel f-20 text-info"></i>
                            <div class="info-box-content">
                                <h1 class="f-25 text-black">4,250</h1>
                                <span class="progress-description">Online Revenue</span> </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:65%; height:6px;"> <span class="sr-only">65% Complete</span> </div>
                            </div>
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div> <i class="ti-wallet f-20 text-green"></i>
                            <div class="info-box-content">
                                <h1 class="f-25 text-black">8,350</h1>
                                <span class="progress-description">Total Profit</span> </div>
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:85%; height:6px;"> <span class="sr-only">85% Complete</span> </div>
                            </div>
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="info-box">
                <div class="col-12">
                    <div class="d-flex flex-wrap">
                        <div>
                            <h5>Yearly Earning</h5>
                        </div>
                        <div class="ml-auto">
                            <ul class="list-inline">
                                <li class="text-aqua"> <i class="fa fa-circle"></i> Sales</li>
                                <li class="text-blue"> <i class="fa fa-circle"></i> Earning ($)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="earning"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="info-box">
                <div class="col-12">
                    <div class="d-flex flex-wrap">
                        <div>
                            <h5>Donut Chart</h5>
                        </div>
                    </div>
                </div>
                <div id="donut"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="info-box">
                <div class="col-12">
                    <div class="d-flex flex-wrap">
                        <div>
                            <h5>Area Chart</h5>
                        </div>
                        <div class="ml-auto">
                            <ul class="list-inline">
                                <li class="text-purple"> <i class="fa fa-circle"></i> India</li>
                                <li class="text-muted"> <i class="fa fa-circle"></i> USA</li>
                                <li class="text-info"> <i class="fa fa-circle"></i> UK</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="area"></div>
            </div>
            <div class="info-box">
                <div class="card tab-style1">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">Activity</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">Profile</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="user-img pull-left"> <img src="/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="mail-contnet">
                                            <h5>Florence Douglas</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                                            <div class="row">
                                                <div class="col-lg-3 col-xs-4 m-bot-2"><img src="/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                                                <div class="col-lg-3 col-xs-4 m-bot-2"><img src="/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                                                <div class="col-lg-3 col-xs-4 m-bot-2"><img src="/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                                                <div class="col-lg-3 col-xs-4 m-bot-2"><img src="/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                                            </div>
                                            <div class="like-comm m-t-1"> <a href="#">150 comment</a> <a href="#"><i class="fa fa-heart text-danger"></i> 25 Love</a> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-3">
                                    <div class="col-lg-2">
                                        <div class="user-img pull-left"> <img src="/img/img5.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="mail-contnet">
                                            <h5>Florence Douglas</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                                            <div class="like-comm m-t-1"> <a href="#">150 comment</a> <a href="#"><i class="fa fa-heart text-danger"></i> 25 Love</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--second tab-->
                        <div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-xs-6 b-r"> <strong>Full Name</strong> <br>
                                        <p class="text-muted">Florence Douglas</p>
                                    </div>
                                    <div class="col-lg-3 col-xs-6 b-r"> <strong>Mobile</strong> <br>
                                        <p class="text-muted">(123) 456 7890</p>
                                    </div>
                                    <div class="col-lg-3 col-xs-6 b-r"> <strong>Email</strong> <br>
                                        <p class="text-muted">florencedouglas@admin.com</p>
                                    </div>
                                </div>
                                <hr>
                                <p>Lorem Ipsum is simply dummy text of the printing vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                <p>Suspen disse potenti. Sed lectus est, commodo eu pre tium eu, pulvinar porttitor feugiat. Aliquam efficitur feugiat accumsan. Nulla hendrerit cursus nisi nec mattis. </p>
                                <h4 class="font-medium m-t-3">Skill Set</h4>
                                <hr>
                                <div>
                                    <h6 class="m-t-3">Wordpress <span class="pull-right">80%</span></h6>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5 class="m-t-3">HTML 5 <span class="pull-right">90%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5 class="m-t-3">jQuery <span class="pull-right">50%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5 class="m-t-3">Photoshop <span class="pull-right">70%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel">
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input placeholder="Florence Douglas" class="form-control form-control-line" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input placeholder="florencedouglas@admin.com" class="form-control form-control-line" name="example-email" id="example-email" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input value="password" class="form-control form-control-line" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input placeholder="123 456 7890" class="form-control form-control-line" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Message</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line">
                                                <option>London</option>
                                                <option>India</option>
                                                <option>Usa</option>
                                                <option>Canada</option>
                                                <option>Thailand</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 m-b-3">
            <div>
                <div class="soci-wid-box bg-twitter m-b-3">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item">
                                <div class="col-lg-12 text-center">
                                    <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                                    <p class="text-italic pt-1">- John Doe -</p>
                                </div>
                            </div>
                            <div class="carousel-item active carousel-item-left">
                                <div class="col-lg-12 text-center">
                                    <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                                    <p class="text-italic pt-1">- John Doe -</p>
                                </div>
                            </div>
                            <div class="carousel-item carousel-item-next carousel-item-left">
                                <div class="col-lg-12 text-center">
                                    <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                                    <p class="text-italic pt-1">- John Doe -</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                </div>
            </div>
        </div>

