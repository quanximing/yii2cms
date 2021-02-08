<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Battribute */

$this->title = $model->attribute_id;
$this->params['breadcrumbs'][] = ['label' => 'Battributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="battribute-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->attribute_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->attribute_id], [
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
            'attribute_id',
            'attribute_group_id',
            'sort_order',
        ],
    ]) ?>

</div>
