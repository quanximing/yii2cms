<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bproduct */

$this->title = '添加产品';
$this->params['breadcrumbs'][] = ['label' => '产品列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bproduct-create">

    <?= $this->render('_form', [
        'product'=>$product,
        'product_description'=>$product_description,
        'product_image'=>$product_image ,
        'product_to_cate'=>$product_to_cate ,
//        'product_extend'=>$product_extend ,
    ]) ?>

</div>
