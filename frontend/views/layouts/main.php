<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\MobelAsset;
use common\widgets\Alert;
use common\models\Category;
use common\models\BannerImage;
MobelAsset::register($this);
$home_banner = BannerImage::findAll(['banner_id'=>1]);

$product_cate = Category::find()->joinWith('categoryDescription')->andwhere(['top'=>1,'status'=>1,'parent_id'=>0])->all();
//print_r($product_cate);
/*foreach($product_cate as $k => $v){
 var_dump($v->categoryDescription->name  );
}*/

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Mobile Web-app fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Meta tags -->
    <meta name="description" content="<?=\Yii::$app->params['website_description']?>">
    <meta name="author" content="<?=\Yii::$app->params['website_author']?>">
    <link rel="icon" href="favicon.ico">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php $this->beginBody() ?>

<div class="page-loader"></div>
<div class="wrapper">
    <?= $this->render(
        'navbar.php',
        ['product_cate'=>$product_cate ]
    ) ?>
    <?php
    if(Yii::$app->controller->action->id === 'index' && Yii::$app->controller->id ==='site'){
        echo $this->render(
            'header_content.php',
            ['hbanner'=>$home_banner,'product_cate'=>$product_cate ]
        ) ;
    }elseif(Yii::$app->controller->action->id === 'index' && Yii::$app->controller->id ==='products'){ ?>
        <section class="main-header" style="background-image:url(/images/gallery-3.jpg)">
            <header>
                <div class="container">
                    <h1 class="h2 title">Shop</h1>
                    <?= Breadcrumbs::widget(
                        [
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'options'=>['class'=>'breadcrumb breadcrumb-inverted'],
                        ]
                    ) ?>
                </div>
            </header>
        </section>
     <?php }else{ ?>
        <section class="main-header" style="background-image:url(/images/gallery-3.jpg)">
            <header>
                <div class="container">
                    <h1 class="h2 title">Shop</h1>
                    <?= Breadcrumbs::widget(
                        [
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'options'=>['class'=>'breadcrumb breadcrumb-inverted'],
                        ]
                    ) ?>
                </div>
            </header>
        </section>
   <?php }
    ?>


    <?= $content ?>
    <!-- ================== Footer  ================== -->

    <footer>
        <div class="container">

            <!--footer showroom-->
            <div class="footer-showroom">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Visit our showroom</h2>
                        <p>200 12th Ave, New York, NY 10001, USA</p>
                        <p>Mon - Sat: 10 am - 6 pm &nbsp; &nbsp; | &nbsp; &nbsp; Sun: 12pm - 2 pm</p>
                    </div>
                    <div class="col-sm-4 text-center">
                        <a href="#" class="btn btn-clean"><span class="icon icon-map-marker"></span> Get directions</a>
                        <div class="call-us h4"><span class="icon icon-phone-handset"></span> 333.278.06622</div>
                    </div>
                </div>
            </div>

            <!--footer links-->
            <div class="footer-links">
                <div class="row">
                    <div class="col-sm-4 col-md-2">
                        <h5>Browse by</h5>
                        <ul>
                            <li><a href="#">Brand</a></li>
                            <li><a href="#">Product</a></li>
                            <li><a href="#">Category</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-2">
                        <h5>Recources</h5>
                        <ul>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Sales</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-2">
                        <h5>Our company</h5>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h5>Sign up for our newsletter</h5>
                        <p><i>Add your email address to sign up for our monthly emails and to receive promotional offers.</i></p>
                        <div class="form-group form-newsletter">
                            <input class="form-control" type="text" name="email" value="" placeholder="Email address" />
                            <input type="submit" class="btn btn-clean btn-sm" value="Subscribe" />
                        </div>
                    </div>
                </div>
            </div>

            <!--footer social-->

            <div class="footer-social">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="/20382155" target="_blank"><i class="fa fa-download"></i> Mobel</a> &nbsp; | <a href="#">Sitemap</a> &nbsp; | &nbsp; <a href="#">Privacy policy</a>
                    </div>
                    <div class="col-sm-6 links">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
