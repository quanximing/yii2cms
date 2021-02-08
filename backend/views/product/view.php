<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bproduct */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Bproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bproduct-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            'model',
            'sku',
            'location',
            'quantity',
            'stock_status_id',
            'image',
            'manufacturer_id',
            'shipping',
            'price',
            'points',
            'date_available',
            'subtract',
            'minimum',
            'sort_order',
            'status',
            'viewed',
            'date_added',
            'date_modified',
        ],
    ]) ?>

</div>
