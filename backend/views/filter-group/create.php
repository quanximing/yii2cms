<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FilterGroup */

$this->title = '添加 筛选分组';
$this->params['breadcrumbs'][] = ['label' => '筛选分组', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-group-create">
    <?= $this->render('_form', [
        'model' => $model,
        'group_description'=>$group_description,
    ]) ?>

</div>
