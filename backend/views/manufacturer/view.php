<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bmanufacturer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '合作伙伴', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bmanufacturer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->manufacturer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->manufacturer_id], [
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
            'manufacturer_id',
            'name',
            'image',
            'config_input:ntext',
            'sort_order',
        ],
    ]) ?>

</div>
