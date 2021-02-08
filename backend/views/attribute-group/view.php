<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BattributeGroup */

$this->title = $model->attribute_group_id;
$this->params['breadcrumbs'][] = ['label' => 'Battribute Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="battribute-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->attribute_group_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->attribute_group_id], [
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
            'attribute_group_id',
            'sort_order',
        ],
    ]) ?>

</div>
