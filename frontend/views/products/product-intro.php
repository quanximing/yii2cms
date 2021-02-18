<?php
/**
 * @var $product_img
 * @var $product
 */
 //var_dump($product);
?>
<div class="popup-main " id="productid1">
    <div class="product">
    <!-- === popup-title === -->
    <div class="popup-title">
        <div class="h1 title"><?=$product['name']?><small>product category</small></div>
    </div>
    <!-- === product gallery === -->
    <div class="owl-product-gallery">
        <?php
        foreach ($product_img as $value){
        ?>
        <img src="<?=\Yii::$app->params['image_url'].'/'.$value['image'] ?>" alt="" width="640" />

        <?php } ?>
    </div>
    <!-- === product-popup-info === -->
    <div class="popup-content">
        <div class="product-info-wrapper">
            <div class="row">
                <!-- === left-column === -->
                <div class="col-sm-6">
                    <div class="info-box">
                        <strong>Manufacturer</strong>
                        <span><?=$product['manufacturer']?></span>
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
                   <!-- <div class="info-box">
                        <strong>Choose size</strong>
                        <div class="product-colors clearfix">
                            <span class="color-btn color-btn-biege">S</span>
                            <span class="color-btn color-btn-biege checked">M</span>
                            <span class="color-btn color-btn-biege">XL</span>
                            <span class="color-btn color-btn-biege">XXL</span>
                        </div>
                    </div>-->
                </div>

            </div> <!--/row-->
        </div> <!--/product-info-wrapper-->
    </div> <!--/popup-content-->
    <!-- === product-popup-footer === -->
    <div class="popup-table">
        <div class="popup-cell">
            <div class="price">
                <span class="h3">
                    <?php if(!empty($product['special'])){ ?>
                       $ <?=$product['special']?> <small>$ <?=$product['price']?></small>
                    <?php }else{ ?>
                        $ <?=$product['price']?>
                    <?php }?>

                </span>
            </div>
        </div>
        <div class="popup-cell">
            <div class="popup-buttons">
                <a href="product.html"><span class="icon icon-eye"></span> <span class="hidden-xs">View more</span></a>
                <a href="javascript:void(0);"><span class="icon icon-cart"></span> <span class="hidden-xs">Contact Us</span></a>
            </div>
        </div>
    </div>
</div>
</div>
