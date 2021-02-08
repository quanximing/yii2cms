<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bbanner */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bbanners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbanner-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->banner_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->banner_id], [
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
            'banner_id',
            'name',
            'status',
        ],
    ]) ?>

</div>
