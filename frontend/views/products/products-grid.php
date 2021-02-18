<?php
use yii\helpers\Url;
?>
  <!-- ======================== Products ======================== -->

        <section class="products">
            <div class="container">

                <header class="hidden">
                    <h3 class="h3 title">Product category grid</h3>
                </header>

                <div class="row">

                    <!-- === product-filters === -->
                    <?= $this->render(
                        'filters.php'
                    ) ?>
                    <!--product items-->

                    <div class="col-md-9 col-xs-12">

                        <div class="sort-bar clearfix">
                            <div class="sort-results pull-left">
                                <!--Showing result per page-->
                                <select>
                                    <option value="1">10</option>
                                    <option value="2">50</option>
                                    <option value="3">100</option>
                                    <option value="4"><?=$totalCount?></option>
                                </select>
                                <!--Items counter-->
                                <span>Showing all <strong><?=$pageSize?></strong> of <strong><?=$totalCount?></strong> items</span>
                            </div>
                            <!--Sort options-->
                            <div class="sort-options pull-right">
                                <span class="hidden-xs">Sort by</span>
                                <select>
                                    <option value="1">Name</option>
                                    <option value="2">Popular items</option>
                                    <option value="3">Price: lowest</option>
                                    <option value="4">Price: highest</option>
                                </select>
                                <!--Grid-list view-->
                                <span class="grid-list">
                                    <a href="<?=Url::to(['products/index'])?>"><i class="fa fa-th-large"></i></a>
                                    <a href="<?=Url::to(['products/index','display'=>'list'])?>"><i class="fa fa-align-justify"></i></a>
                                    <a href="javascript:void(0);" class="toggle-filters-mobile"><i class="fa fa-search"></i></a>
                                </span>
                            </div>
                        </div>

                        <div class="row">

                            <!-- === product-item === -->
                            <?php
                            foreach( $data as $k=>$value){
                                    //var_dump($value);
                            ?>
                            <div class="col-md-6 col-xs-6">
                                <article>
                                    <div class="info">
                                        <span class="add-favorite">
                                            <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                        </span>
                                        <span>
                                            <a href="<?=Url::to(['/products/product-intro?product_id='.$value['product_id']])?>" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                                        </span>
                                    </div>
                                    <div class="btn btn-add">
                                        <i class="icon icon-cart"></i>
                                    </div>
                                    <div class="figure-grid">
                                        <?php if(isset($value['discount'])){ ?>
                                        <span class="label label-info"><?=$value['discount']?></span>
                                        <?php }?>
                                        <div class="image">
                                            <a href="<?=Url::to(['/products/product-intro?product_id='.$value['product_id']])?>" class="mfp-open">
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
                            <?php  } ?>
                        </div><!--/row-->
                        <!--Pagination-->
                        <?= $this->render(
                            'pagination.php',
                            [ 'pages' => $pages,
                                'pageSize'=>$pageSize,
                            ]
                        ) ?>

                    </div> <!--/product items-->

                </div><!--/row-->
                <!-- ========================  Product info popup - quick view ======================== -->

               <!--popup-main-->
            </div><!--/container-->
        </section>



