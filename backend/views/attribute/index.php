<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '属性';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="battribute-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加属性', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            //'attribute_id',
            'description.name',
            //'attribute_group_id',
            'groupdescription.name',
            'sort_order',
            [
                "class" => "yii\grid\ActionColumn",
                "template" => "{update} {delete}  ",
                "header" => "操作",
            ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
