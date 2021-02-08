<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com,
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    "bootstrap/css/bootstrap.min.css",
    "css/style.css",
	"css/font-awesome/css/font-awesome.min.css",
	"css/et-line-font/et-line-font.css",
	"css/themify-icons/themify-icons.css",
    ];
    public $js = [
        "bootstrap/js/bootstrap.min.js",
		"js/niche.js",
		"plugins/raphael/raphael-min.js",

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
