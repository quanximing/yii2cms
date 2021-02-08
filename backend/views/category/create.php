<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bcategory */

$this->title = 'Create Bcategory';
$this->params['breadcrumbs'][] = ['label' => 'Bcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
