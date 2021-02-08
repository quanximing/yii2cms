<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BbannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '横幅广告';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbanner-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('添加广告', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
           // 'banner_id',
            'name',
           // 'status',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    switch ($model->status){
                        case 1 :
                            return '启用';
                            break;
                        case 0:
                            return '禁用';
                            break;
                    }
                },
                'filter' =>[1=>'启用',0=>'禁用'],
            ],
            [
                "class" => "yii\grid\ActionColumn",
                "template" => "{update} ",
                "header" => "操作",
            ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
