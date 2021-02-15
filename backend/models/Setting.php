<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "setting".
 *
 * @property integer $setting_id
 * @property string $code
 * @property string $key
 * @property string $value
 * @property integer $serialized
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'key', 'value', 'serialized'], 'required'],
            [['value'], 'string'],
            [['serialized'], 'integer'],
            [['code'], 'string', 'max' => 32],
            [['key'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'setting_id' => 'ID',
            'code' => 'Code',
            'key' => 'Key',
            'value' => 'Value',
            'serialized' => '是否序列号',
        ];
    }

    public static function getValue($code)
    {
        $model = Setting::findAll(array('code'=>$code));
        return ArrayHelper::map($model,'key','value');
    }

    public static function getSettingName($code,$key)
    {
        $model = Setting::findOne(array('code'=>$code,'key'=>$key));
        return $model['value'];
    }
}
