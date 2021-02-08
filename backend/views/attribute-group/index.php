<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AttributeGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '属性分组';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="battribute-group-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加属性组', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'groupdescription.name',
            'sort_order',
            [
                "class" => "yii\grid\ActionColumn",
                "template" => "{update} {delete} ",
                "header" => "操作",
            ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
