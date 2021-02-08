<?php

namespace common\models;

use Yii;
use common\models\CategoryDescription;
/**
 * This is the model class for table "category".
 *
 * @property int $category_id
 * @property string $image
 * @property int $parent_id
 * @property int $top
 * @property int $column
 * @property int $sort_order
 * @property int $status
 * @property string $date_added
 * @property string $date_modified
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'top', 'column', 'sort_order', 'status'], 'integer'],
            [['top', 'column', 'status', 'date_added', 'date_modified'], 'required'],
            [['date_added', 'date_modified'], 'safe'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => '分类ID',
            'image' => '图片',
            'parent_id' => '父ID',
            'top' => '顶部菜单显示',
            'column' => '列排显示',
            'sort_order' => '排序',
            'status' => '状态',
            'date_added' => '添加时间',
            'date_modified' => '修改时间',
        ];
    }
    public function getCategoryDescription()
    {
        return $this->hasOne(CategoryDescription::className(), ['category_id' => 'category_id']);
    }

    public function getCategoryPath(){
        return $this->hasMany(CategoryPath::className(),['category_id' => 'category_id']);
    }
}
