<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bproduct */

$this->title = '修改商品';
$this->params['breadcrumbs'][] = ['label' => 'Bproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $product->product_id, 'url' => ['view', 'id' => $product->product_id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="bproduct-update">

    <?= $this->render('_form', [
        'product'=>$product,
        'product_description'=>$product_description,
        'product_customtab'=>$product_customtab ,
        'product_image'=>$product_image ,
        'product_to_cate'=>$product_to_cate ,
        'product_options'=>$product_options,
        'product_categories'=> $product_categories,
        'product_extend'=>$product_extend,
        'product_recurring'=>$product_recurring
    ]) ?>

</div>
