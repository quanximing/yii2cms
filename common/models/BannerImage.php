<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner_image".
 *
 * @property int $banner_image_id
 * @property int $banner_id
 * @property int $language_id
 * @property string $title
 * @property string $link
 * @property string $image
 * @property int $sort_order
 */
class BannerImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['banner_id', 'language_id', 'title', 'image'], 'required'],
            [['banner_id', 'language_id', 'sort_order'], 'integer'],
            [['title'], 'string', 'max' => 64],
            [['link', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'banner_image_id' => 'Banner Image ID',
            'banner_id' => 'Banner ID',
            'language_id' => 'Language ID',
            'title' => 'Title',
            'link' => 'Link',
            'image' => 'Image',
            'sort_order' => 'Sort Order',
        ];
    }
}