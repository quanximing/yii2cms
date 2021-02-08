<?php

namespace common\models;

use Yii;
use common\models\BannerImage;
/**
 * This is the model class for table "banner".
 *
 * @property int $banner_id
 * @property string $name
 * @property int $status
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'banner_id' => 'Banner ID',
            'name' => '横幅广告名称',
            'status' => '状态',
        ];
    }

    public function getBannerImage()
    {
        return $this->hasMany(BannerImage::className(), ['banner_id' => 'banner_id']);
    }
}
