<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\grid\CheckboxColumn;
use yii\bootstrap\Alert;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bproduct-index">

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
  <?php
  if( Yii::$app->getSession()->hasFlash('save-error') ) {
      echo Alert::widget([
          'options' => [
              'class' => 'alert-error',
          ],
          'body' => Yii::$app->getSession()->getFlash('save-error'),
      ]);
  }
  ?>
    <p>
        <?= Html::a('添加产品', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'id' => 'grid',
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            [
                'class'=>CheckboxColumn::className(),
                'name'=>'product_id',  //设置每行数据的复选框属性
                'headerOptions' => ['width'=>'30'],
                'footer' => '<button href="#" class="btn btn-default btn-xs btn-delete" url="'. Url::toRoute('admin/') .'">批量投保</button>',
                'footerOptions' => ['colspan' => 5],  //设置删除按钮垮列显示；
            ],
            [   'label' => '图像',
                'format' => [
                    'image',
                    [
                        'width'=>'42',
                        'height'=>'42'
                    ]
                ],
                'value' => function ($model) {
                    return Yii::$app->params['image_url'].'/images/'.$model->image;
                }
            ],
            'product_id',
            [
                'attribute'=>'name',
                'label'=>'产品名称',
                'value'=>'productDesc.name',
            ],
            'model',
            'sku',
            //'location',
            'quantity',
            //'stock_status_id',
            [
                'attribute' => 'manufacturer',
                'label' => '渠道品牌',
                'value' => 'manufacturer.name',
            ],
            //'manufacturer_id',
            //'shipping',
            'price',
            //'points',
            //'date_available',
            //'subtract',
            //'minimum',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return Yii::$app->params['product_status'][$model->status];
                },
                'filter' => Yii::$app->params['product_status'],
            ],
            [
                'attribute' => 'is_fx',
                'value' => function ($model) {
                    return Yii::$app->params['product_is_fx'][$model->is_fx];
                },
                'filter' => Yii::$app->params['product_is_fx'],
            ],

            'viewed',
            'sort_order',
            //'date_added',
            //'date_modified',
            [
                "class" => "yii\grid\ActionColumn",
                "template" =>"{update}" ,//"{get} ",
                "header" => "操作",
               /* "buttons" => [
                    "get" => function ($url, $model, $key) {
                        return Html::a("获取", $url, ["title" => "获取"] );
                    },
                ],*/
            ],

        ],
    ]); ?>
</div>
