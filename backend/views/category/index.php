<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Bcategory;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品分类';
$this->params['breadcrumbs'][] = $this->title;
$status =['0'=>'停用','1'=>'启用'];
?>
<div class="bcategory-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('添加分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'category_id',
            [
                'attribute' => '类别目录',
                'value' => function ($model) {
                    $path = Bcategory::getCategory($model->category_id);

                    return !empty($path['path'])?$path['path']:'' ;
                },
                'format'=>'raw',
                //'filter' => Yii::$app->params['category_top'],
            ],
            'categoryDescription.name',
            //'parent_id',
            [
                'attribute' => 'top',
                'value' => function ($model) {
                    if(!empty($model->top)){
                        return Yii::$app->params['category_top'][$model->top]??'';
                    }
                },
                'filter' => Yii::$app->params['category_top'],
            ],
            'column',
            'sort_order',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return Yii::$app->params['category_status'][$model->status];
                },
                'filter' => Yii::$app->params['category_status'],
            ],
            'date_added',
            //'date_modified',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
