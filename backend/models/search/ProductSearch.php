<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bproduct;

/**
 * ProductSearch represents the model behind the search form of `backend\models\Bproduct`.
 */
class ProductSearch extends Bproduct
{
    public $manufacturer;
    public $name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'quantity', 'stock_status_id', 'manufacturer_id', 'points', 'minimum', 'sort_order', 'viewed'], 'integer'],
            [['model', 'sku', 'location', 'image', 'shipping', 'date_available', 'subtract', 'status','is_fx', 'date_added','manufacturer','name','date_modified'], 'safe'],
            [['price'], 'number'],
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
        $query = Bproduct::find();
        $query->joinWith('manufacturer');
        $query->joinWith('productDesc');
        //ProductDesc
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
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'stock_status_id' => $this->stock_status_id,
            'manufacturer_id' => $this->manufacturer_id,
            'price' => $this->price,
            'points' => $this->points,
            'date_available' => $this->date_available,
            'minimum' => $this->minimum,
            'sort_order' => $this->sort_order,
            'viewed' => $this->viewed,
            'date_added' => $this->date_added,
            'date_modified' => $this->date_modified,
        ]);

        $query->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'sku', $this->sku])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'shipping', $this->shipping])
            ->andFilterWhere(['like', 'subtract', $this->subtract])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'is_fx', $this->is_fx])
            ->andFilterWhere(['like', 'manufacturer.name', $this->manufacturer])
            ->andFilterWhere(['like','product_description.name',$this->name]);

        return $dataProvider;
    }
}
