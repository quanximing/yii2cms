<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FilterGroup */

$this->title = $model->filter_group_id;
$this->params['breadcrumbs'][] = ['label' => 'Filter Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->filter_group_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->filter_group_id], [
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
            'filter_group_id',
            'sort_order',
        ],
    ]) ?>

</div>
