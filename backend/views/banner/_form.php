<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
use common\library\image\image;
$res_image = new image();
$this->registerJsFile('@web/js/common.js',['depends'=>['backend\assets\AppAsset']]);
/* @var $this yii\web\View */
/* @var $model backend\models\Bbanner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">
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
    <div class="panel panel-default">
        <?php $form = ActiveForm::begin(); ?>
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-pencil"></i> 横幅广告</h3>
            <div style="margin-top:15px;">
                <!--<button type="submit" form="form-product" data-toggle="tooltip" title="保存" class="btn btn-primary"><i class="fa fa-save"></i></button>-->
                <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
                <a href="<?php echo Yii::$app->request->referrer?>" data-toggle="tooltip" title="取消" class="btn btn-default"><i class="fa fa-reply"></i></a>
            </div>

        </div>
        <div class="panel-body">

           <!-- <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-banner" class="form-horizontal">-->
                <div class="form-group required">
                    <div class="col-sm-10">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true,'id'=>"input-name"]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <?= $form->field($model, 'status')->dropDownList(['0'=>'停用','1'=>'启用']) ?>
                    </div>
                </div>
                <br />

                <div class="tab-content">
                    <?php $image_row = 0;?>
                    <div class="tab-pane001" id="language1">
                        <table id="images" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <td class="text-left">标题</td>
                                <td class="text-left">链接</td>
                                <td class="text-center">图像</td>
                                <td class="text-right">排序</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($banner_images)):
                                //var_dump($banner_images);
                                ?>
                            <?php foreach ($banner_images as $k=> $banner_image):?>
                            <tr id="image-row<?=$k?>">
                                <td class="text-left">
                                    <input type="text" name="banner_image[<?=$k?>][title]" value="<?=$banner_image['title']?>" placeholder="标题" class="form-control" />
                                </td>
                                <td class="text-left" style="width: 30%;">
                                    <input type="text" name="banner_image[<?=$k?>][link]" value="<?=$banner_image['link']?> " placeholder="链接" class="form-control" />
                                </td>
                                <td class="text-center">
                                    <a href="" id="thumb-image{{ image_row }}" data-toggle="image" class="img-thumbnail">
                                        <img src="<?=!empty($banner_image['image'])?$res_image->resize($banner_image['image'],100,100):Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" alt="" title="" data-placeholder="<?=isset($banner_image['image'])?$banner_image['image']:Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" />
                                    </a>
                                    <input type="hidden" name="banner_image[<?=$k?>][image]" value="<?=$banner_image['image']?>" id="input-image<?=$k?>" />
                                </td>
                                <td class="text-right" style="width: 10%;">
                                    <input type="text" name="banner_image[<?=$k?>][sort_order]" value="<?=$banner_image['sort_order']?> " placeholder="排序" class="form-control" />
                                </td>
                                <td class="text-left">
                                    <button type="button" onclick="$('#image-row<?=$k?>, .tooltip').remove();" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                                </td>
                            </tr>
                            <?php $image_row = $image_row + 1;?>
                            <?php endforeach;?>
                            <?php endif;?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-left">
                                    <button type="button" onclick="addImage();" data-toggle="tooltip" title="添加横幅广告" class="btn btn-primary">
                                        <i class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>

           <!-- </form>-->
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script type="text/javascript"><!--
    var image_row = <?=isset($image_row)?$image_row:0?>;

    function addImage() {
        html  = '<tr id="image-row' + image_row + '">';
        html += '  <td class="text-left"><input type="text" name="banner_image[' + image_row + '][title]" value="" placeholder="标题" class="form-control" /></td>';
        html += '  <td class="text-left" style="width: 30%;"><input type="text" name="banner_image[' + image_row + '][link]" value="" placeholder="链接" class="form-control" /></td>';
        html += '  <td class="text-center"><a href="" id="thumb-image' + image_row + '" data-toggle="image" class="img-thumbnail"><img src="<?php echo Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" alt="" title="" data-placeholder="" /></a><input type="hidden" name="banner_image[' + image_row + '][image]" value="" id="input-image' + image_row + '" /></td>';
        html += '  <td class="text-right" style="width: 10%;"><input type="text" name="banner_image[' + image_row + '][sort_order]" value="" placeholder="排序" class="form-control" /></td>';
        html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + ', .tooltip\').remove();" data-toggle="tooltip" title="删除" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        html += '</tr>';

        $('#images' + ' tbody').append(html);

        image_row++;
    }
    //--></script>




