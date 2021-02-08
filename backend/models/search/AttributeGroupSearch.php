<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BattributeGroup;

/**
 * AttributeGroupSearch represents the model behind the search form of `backend\models\BattributeGroup`.
 */
class AttributeGroupSearch extends BattributeGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attribute_group_id', 'sort_order'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BattributeGroup::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'attribute_group_id' =>$this->attribute_group_id,
            'sort_order' =>$this->sort_order,
        ]);

        return $dataProvider;
    }
}
