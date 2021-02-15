<?php
use yii\helpers\Url;
?>
<!-- ========================  Header content ======================== -->

<section class="header-content">

    <div class="owl-slider">

        <!-- === slide item === -->
        <?php
        foreach($hbanner as $k=>$value){ ?>
            <?php //var_dump($value->image)?>
            <div class="item" style="background-image:url(<?=\Yii::$app->params['image_url'].$value->image?>)">
                <div class="box">
                    <div class="container">
                        <h2 class="title animated h1" data-animation="fadeInDown"><?=$value->title?></h2>
                        <div class="animated" data-animation="fadeInUp">
                            <?=$value->text?>
                        </div>
                        <div class="animated" data-animation="fadeInUp">
                            <a href=" <?=$value->link?>" target="_blank" class="btn btn-clean" ><?=$value->title?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div> <!--/owl-slider-->
</section>

<!-- ========================  Icons slider ======================== -->

<section class="owl-icons-wrapper owl-icons-frontpage">

    <!-- === header === -->

    <header class="hidden">
        <h2>Product categories</h2>
    </header>

    <div class="container">

        <div class="owl-icons">

            <!-- === icon item === -->
            <?php foreach($product_cate as $k => $v){  ?>
                <a href="<?=Url::to(['/products/index','cate_id'=>$v->category_id])?>">
                    <figure>
                        <i class="<?=$v->categoryDescription->icon?>"></i>
                        <figcaption><?=$v->categoryDescription->name?></figcaption>
                    </figure>
                </a>
            <?php  } ?>
        </div> <!--/owl-icons-->
    </div> <!--/container-->
</section>
