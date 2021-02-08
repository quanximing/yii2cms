<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MobelAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/bootstrap.css",
        "css/animate.css",
        "css/font-awesome.css" ,
        "css/furniture-icons.css" ,
        "css/linear-icons.css" ,
        "css/magnific-popup.css" ,
        "css/owl.carousel.css" ,
        "css/theme.css" ,
    ];
    public $js = [
        "js/jquery.min.js",
        "js/jquery.bootstrap.js",
        "js/jquery.magnific-popup.js",
        "js/jquery.owl.carousel.js",
        "js/jquery.ion.rangeSlider.js",
        "js/jquery.isotope.pkgd.js",
        "js/main.js",
    ];
    public $depends = [
    ];
}
