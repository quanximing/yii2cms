<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'my website';
?>




<!-- ========================  Products widget ======================== -->

<section class="products">

    <div class="container">

        <!-- === header title === -->
        <?php
        if(!empty($data)){ ?>
        <header>
            <div class="row">
                <div class="col-md-offset-2 col-md-8 text-center">
                    <h2 class="title">Popular products</h2>
                    <div class="text">
                        <p>Check out our latest collections</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="row">
            <!-- === product-item === -->
            <?php
            foreach( $data as $k=>$value){
            ?>
            <div class="col-md-4 col-xs-6">
                <article>
                    <div class="info">
                        <span class="add-favorite added"><a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a></span>
                        <span><a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a></span>
                    </div>
                    <div class="btn btn-add">
                        <i class="icon icon-cart"></i>
                    </div>
                    <div class="figure-grid">
                        <div class="image">
                            <a href="#productid1" class="mfp-open">
                                <img src="<?=\Yii::$app->params['image_url'].'/'.$value['image']?>" alt="" width="360" />
                            </a>
                        </div>
                        <div class="text">
                            <h2 class="title h4"><a href="/"><?=$value['name']?></a></h2>
                            <?php if(isset($value['special'])){ ?>
                                <sub><?=$value['price']?></sub>
                                <sup><?=$value['special']?></sup>
                            <?php  }else{ ?>
                                <sup><?=$value['price']?></sup>
                            <?php }?>
                            <span class="description clearfix"><?=$value['tag']?></span>
                        </div>
                    </div>
                </article>
            </div>
            <?php }   ?>
        </div> <!--/row-->
        <!-- === button more === -->

        <div class="wrapper-more">
            <a href="<?=Url::to(['/products/index'])?>" class="btn btn-main">View more</a>
        </div>

        <!-- ========================  Product info popup - quick view ======================== -->
        <div class="popup-main mfp-hide" id="productid1">

            <!-- === product popup === -->
            <div class="product">

                <!-- === popup-title === -->

                <div class="popup-title">
                    <div class="h1 title">Laura <small>product category</small></div>
                </div>

                <!-- === product gallery === -->

                <div class="owl-product-gallery">
                    <img src="/images/product-1.png" alt="" width="640" />
                    <img src="/images/product-2.png" alt="" width="640" />
                    <img src="/images/product-3.png" alt="" width="640" />
                    <img src="/images/product-4.png" alt="" width="640" />
                </div>

                <!-- === product-popup-info === -->

                <div class="popup-content">
                    <div class="product-info-wrapper">
                        <div class="row">

                            <!-- === left-column === -->

                            <div class="col-sm-6">
                                <div class="info-box">
                                    <strong>Maifacturer</strong>
                                    <span>Brand name</span>
                                </div>
                                <div class="info-box">
                                    <strong>Materials</strong>
                                    <span>Wood, Leather, Acrylic</span>
                                </div>
                                <div class="info-box">
                                    <strong>Availability</strong>
                                    <span><i class="fa fa-check-square-o"></i> in stock</span>
                                </div>
                            </div>

                            <!-- === right-column === -->

                            <div class="col-sm-6">
                                <div class="info-box">
                                    <strong>Available Colors</strong>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-red"></span>
                                        <span class="color-btn color-btn-blue checked"></span>
                                        <span class="color-btn color-btn-green"></span>
                                        <span class="color-btn color-btn-gray"></span>
                                        <span class="color-btn color-btn-biege"></span>
                                    </div>
                                </div>
                                <div class="info-box">
                                    <strong>Choose size</strong>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-biege">S</span>
                                        <span class="color-btn color-btn-biege checked">M</span>
                                        <span class="color-btn color-btn-biege">XL</span>
                                        <span class="color-btn color-btn-biege">XXL</span>
                                    </div>
                                </div>
                            </div>

                        </div> <!--/row-->
                    </div> <!--/product-info-wrapper-->
                </div> <!--/popup-content-->
                <!-- === product-popup-footer === -->

                <div class="popup-table">
                    <div class="popup-cell">
                        <div class="price">
                            <span class="h3">$ 1999,00 <small>$ 2999,00</small></span>
                        </div>
                    </div>
                    <div class="popup-cell">
                        <div class="popup-buttons">
                            <a href="product.html"><span class="icon icon-eye"></span> <span class="hidden-xs">View more</span></a>
                            <a href="javascript:void(0);"><span class="icon icon-cart"></span> <span class="hidden-xs">Buy</span></a>
                        </div>
                    </div>
                </div>

            </div> <!--/product-->
        </div> <!--popup-main-->
        <?php  } ?>
    </div> <!--/container-->
</section>

<!-- ========================  Stretcher widget ======================== -->

<section class="stretcher-wrapper">

    <!-- === stretcher header === -->

    <header class="hidden">
        <!--remove class 'hidden'' to show section header -->
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 text-center">
                    <h1 class="h2 title">Popular categories</h1>
                    <div class="text">
                        <p>
                            Whether you are changing your home, or moving into a new one, you will find a huge selection of quality living room furniture,
                            bedroom furniture, dining room furniture and the best value at Furniture factory
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- === stretcher === -->

    <ul class="stretcher">

        <!-- === stretcher item === -->

        <li class="stretcher-item" style="background-image:url(/images/gallery-1.jpg);">
            <!--logo-item-->
            <div class="stretcher-logo">
                <div class="text">
                    <span class="f-icon f-icon-bedroom"></span>
                    <span class="text-intro">Bedroom</span>
                </div>
            </div>
            <!--main text-->
            <figure>
                <h4>Modern furnishing projects</h4>
                <figcaption>New furnishing ideas</figcaption>
            </figure>
            <!--anchor-->
            <a href="#">Anchor link</a>
        </li>

        <!-- === stretcher item === -->

        <li class="stretcher-item" style="background-image:url(/images/gallery-2.jpg);">
            <!--logo-item-->
            <div class="stretcher-logo">
                <div class="text">
                    <span class="f-icon f-icon-sofa"></span>
                    <span class="text-intro">Living room</span>
                </div>
            </div>
            <!--main text-->
            <figure>
                <h4>Furnishing and complements</h4>
                <figcaption>Discover the design table collection</figcaption>
            </figure>
            <!--anchor-->
            <a href="#">Anchor link</a>
        </li>

        <!-- === stretcher item === -->

        <li class="stretcher-item" style="background-image:url(/images/gallery-3.jpg);">
            <!--logo-item-->
            <div class="stretcher-logo">
                <div class="text">
                    <span class="f-icon f-icon-office"></span>
                    <span class="text-intro">Office</span>
                </div>
            </div>
            <!--main text-->
            <figure>
                <h4>Which is Best for Your Home</h4>
                <figcaption>Wardrobes vs Walk-In Closets</figcaption>
            </figure>
            <!--anchor-->
            <a href="#">Anchor link</a>
        </li>

        <!-- === stretcher item === -->

        <li class="stretcher-item" style="background-image:url(/images/gallery-4.jpg);">
            <!--logo-item-->
            <div class="stretcher-logo">
                <div class="text">
                    <span class="f-icon f-icon-bathroom"></span>
                    <span class="text-intro">Bathroom</span>
                </div>
            </div>
            <!--main text-->
            <figure>
                <h4>Keeping Things Minimal</h4>
                <figcaption>Creating Your Very Own Bathroom</figcaption>
            </figure>
            <!--anchor-->
            <a href="#">Anchor link</a>
        </li>

        <!-- === stretcher item more=== -->

        <li class="stretcher-item more">
            <div class="more-icon">
                <span data-title-show="Show more" data-title-hide="+"></span>
            </div>
            <a href="#"></a>
        </li>

    </ul>
</section>

<!-- ========================  Blog Block ======================== -->

<section class="blog blog-block">

    <div class="container">

        <!-- === blog header === -->

        <header>
            <div class="row">
                <div class="col-md-offset-2 col-md-8 text-center">
                    <h2 class="title">Interior ideas</h2>
                    <div class="text">
                        <p>Keeping things minimal</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="row">

            <!-- === blog item === -->

            <div class="col-sm-4">
                <article>
                    <a href="#">
                        <div class="image">
                            <img src="/images/project-1.jpg" alt="" />
                        </div>
                        <div class="entry entry-block">
                            <div class="date">28 Mart 2017</div>
                            <div class="title">
                                <h2 class="h3">Creating the Perfect Gallery Wall </h2>
                            </div>
                            <div class="description">
                                <p>
                                    You’ve finally reached this point in your life- you’ve bought your first home, moved
                                    into your very own apartment, moved out of the dorm room or you’re finally downsizing
                                    after all of your kids have left the nest.
                                </p>
                            </div>
                        </div>
                        <div class="show-more">
                            <span class="btn btn-main btn-block">Read more</span>
                        </div>
                    </a>
                </article>
            </div>

            <!-- === blog item === -->

            <div class="col-sm-4">
                <article>
                    <a href="#">
                        <div class="image">
                            <img src="/images/project-2.jpg" alt="" />
                        </div>
                        <div class="entry entry-block">
                            <div class="date">25 Mart 2017</div>
                            <div class="title">
                                <h2 class="h3">Making the Most Out of Your Kids Old Bedroom</h2>
                            </div>
                            <div class="description">
                                <p>
                                    You’ve finally reached this point in your life- you’ve bought your first home, moved
                                    into your very own apartment, moved out of the dorm room or you’re finally downsizing
                                    after all of your kids have left the nest.
                                </p>
                            </div>
                        </div>
                        <div class="show-more">
                            <span class="btn btn-main btn-block">Read more</span>
                        </div>
                    </a>
                </article>
            </div>

            <!-- === blog item === -->

            <div class="col-sm-4">
                <article>
                    <a href="#">
                        <div class="image">
                            <img src="/images/project-3.jpg" alt="" />
                        </div>
                        <div class="entry entry-block">
                            <div class="date">28 Mart 2017</div>
                            <div class="title">
                                <h2 class="h3">Have a look at our new projects!</h2>
                            </div>
                            <div class="description">
                                <p>
                                    You’ve finally reached this point in your life- you’ve bought your first home, moved
                                    into your very own apartment, moved out of the dorm room or you’re finally downsizing
                                    after all of your kids have left the nest.
                                </p>
                            </div>
                        </div>
                        <div class="show-more">
                            <span class="btn btn-main btn-block">Read more</span>
                        </div>
                    </a>
                </article>
            </div>

        </div> <!--/row-->
        <!-- === button more === -->

        <div class="wrapper-more">
            <a href="#" class="btn btn-main">View all posts</a>
        </div>

    </div> <!--/container-->
</section>

<!-- ========================  Banner ======================== -->

<section class="banner" style="background-image:url(/images/gallery-4.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 text-center">
                <h2 class="title">Our story</h2>
                <p>
                    We believe in creativity as one of the major forces of progress. With this idea, we traveled throughout Italy to find exceptional
                    artisans and bring their unique handcrafted objects to connoisseurs everywhere.
                </p>
                <p><a href="about.html" class="btn btn-clean">Read full story</a></p>
            </div>
        </div>
    </div>
</section>

<!-- ========================  Blog ======================== -->

<section class="blog">

    <div class="container">

        <!-- === blog header === -->

        <header>
            <div class="row">
                <div class="col-md-offset-2 col-md-8 text-center">
                    <h1 class="h2 title">Blog</h1>
                    <div class="text">
                        <p>Latest news from the blog</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="row">

            <!-- === blog item === -->

            <div class="col-sm-4">
                <article>
                    <a href="#">
                        <div class="image" style="background-image:url(/images/blog-1.jpg)">
                            <img src="/images/blog-1.jpg" alt="" />
                        </div>
                        <div class="entry entry-table">
                            <div class="date-wrapper">
                                <div class="date">
                                    <span>MAR</span>
                                    <strong>08</strong>
                                    <span>2017</span>
                                </div>
                            </div>
                            <div class="title">
                                <h2 class="h5">The 3 Tricks that Quickly Became Rules</h2>
                            </div>
                        </div>
                        <div class="show-more">
                            <span class="btn btn-main btn-block">Read more</span>
                        </div>
                    </a>
                </article>
            </div>

            <!-- === blog item === -->

            <div class="col-sm-4">
                <article>
                    <a href="#">
                        <div class="image" style="background-image:url(/images/blog-2.jpg)">
                            <img src="/images/blog-1.jpg" alt="" />
                        </div>
                        <div class="entry entry-table">
                            <div class="date-wrapper">
                                <div class="date">
                                    <span>MAR</span>
                                    <strong>03</strong>
                                    <span>2017</span>
                                </div>
                            </div>
                            <div class="title">
                                <h2 class="h5">Decorating When You're Starting Out or Starting Over</h2>
                            </div>
                        </div>
                        <div class="show-more">
                            <span class="btn btn-main btn-block">Read more</span>
                        </div>
                    </a>
                </article>
            </div>

            <!-- === blog item === -->

            <div class="col-sm-4">
                <article>
                    <a href="#">
                        <div class="image" style="background-image:url(/images/blog-8.jpg)">
                            <img src="/images/blog-8.jpg" alt="" />
                        </div>
                        <div class="entry entry-table">
                            <div class="date-wrapper">
                                <div class="date">
                                    <span>MAR</span>
                                    <strong>01</strong>
                                    <span>2017</span>
                                </div>
                            </div>
                            <div class="title">
                                <h2 class="h5">What does your favorite dining chair say about you?</h2>
                            </div>
                        </div>
                        <div class="show-more">
                            <span class="btn btn-main btn-block">Read more</span>
                        </div>
                    </a>
                </article>
            </div>

        </div> <!--/row-->
        <!-- === button more === -->

        <div class="wrapper-more">
            <a href="#" class="btn btn-main">View all posts</a>
        </div>

    </div> <!--/container-->
</section>

<!-- ========================  Instagram ======================== -->

<section class="instagram">

    <!-- === instagram header === -->

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 text-center">
                    <h2 class="h2 title">Follow us <i class="fa fa-instagram fa-2x"></i> Instagram </h2>
                    <div class="text">
                        <p>@InstaFurnitureFactory</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- === instagram gallery === -->

    <div class="gallery clearfix">
        <a class="item" href="#">
            <img src="/images/square-1.jpg" alt="Alternate Text" />
        </a>
        <a class="item" href="#">
            <img src="/images/square-2.jpg" alt="Alternate Text" />
        </a>
        <a class="item" href="#">
            <img src="/images/square-3.jpg" alt="Alternate Text" />
        </a>
        <a class="item" href="#">
            <img src="/images/square-4.jpg" alt="Alternate Text" />
        </a>
        <a class="item" href="#">
            <img src="/images/square-5.jpg" alt="Alternate Text" />
        </a>
        <a class="item" href="#">
            <img src="/images/square-6.jpg" alt="Alternate Text" />
        </a>

    </div> <!--/gallery-->

</section>
