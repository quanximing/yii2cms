<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BattributeGroup */

$this->title = '修改属性组';
$this->params['breadcrumbs'][] = ['label' => '属性组', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="battribute-group-update">

    <?= $this->render('_form', [
        'model' => $model,
        'group_description'=>$group_description,
    ]) ?>

</div>
