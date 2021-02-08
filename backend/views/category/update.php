<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcategory */

$this->title = 'Update Bcategory: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Bcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category_id, 'url' => ['view', 'id' => $model->category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bcategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
