<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Battribute */

$this->title = '添加属性';
$this->params['breadcrumbs'][] = ['label' => '属性列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="battribute-create">

    <?= $this->render('_form', [
        'model' => $model,
        'description'=>$description,
        'group'=>$group,
    ]) ?>

</div>
