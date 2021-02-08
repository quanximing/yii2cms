<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\Battribute */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="panel panel-default">
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
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> 属性</h3>
        <div style="margin-top:15px;">
            <!--<button type="submit" form="form-product" data-toggle="tooltip" title="保存" class="btn btn-primary"><i class="fa fa-save"></i></button>-->
            <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
            <a href="<?php echo Yii::$app->request->referrer?>" data-toggle="tooltip" title="取消" class="btn btn-default"><i class="fa fa-reply"></i></a>
        </div>
    </div>
    <div class="panel-body">
            <div class="form-group required">
                <?= $form->field($description, 'name')->textInput() ?>
            </div>
            <div class="form-group required">
                <label class="control-label" for="input-attribute-group">属性分组</label>
                <select name="Battribute[attribute_group_id]" id="input-attribute-group" class="form-control">
                        <option value="0">请选择分组</option>
                        <?php foreach ($group as $value):?>
                            <?php if($value->attribute_group_id == $model->attribute_group_id):?>
                            <option value="<?=$value->attribute_group_id?>" selected="selected"><?=$value->groupdescription->name?></option>
                           <?php else:?>
                            <option value="<?=$value->attribute_group_id?>"><?=$value->groupdescription->name?></option>
                          <?php endif;?>

                        <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'sort_order')->textInput() ?>
            </div>
        </form>
    </div>
    <?php ActiveForm::end(); ?>
</div>








