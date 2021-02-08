<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Binsure;

/**
 * InsureSearch represents the model behind the search form of `backend\models\Binsure`.
 */
class InsureSearch extends Binsure
{
    public $pay_method;
    public $name;
    public $x_date;
    public $e_date;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['insure_id', 'customer_id', 'refer_customer_id', 'create_time'], 'integer'],
            [['insure_id','orderId', 'status','is_pt','channel_no', 'insure_title','name', 'insure_code', 'insure_product','manufacturer','channel', 'insure_extend','x_date','e_date','start_date', 'end_date', 'insure_name', 'sex', 'telephone', 'card_type', 'card_no', 'birthday', 'insure_json', 'return_insure_json', 'policyNO', 'policyURL','pay_method', 'email'], 'safe'],
            [['totalPremium', 'amount'], 'number'],
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
        $query = Binsure::find();
        $query->joinWith('insureinsured as isd');
        $query->joinWith('insurepayinfo as p');

       /* $start_date_s =
        $start_date_e =
        $end_date_s   =
        $end_date_e   =*/
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
            'insure.insure_id' => $this->insure_id, //insure_id 过滤
            'insure.customer_id' => $this->customer_id,
            'totalPremium' => $this->totalPremium,
            'amount' => $this->amount,
            'refer_customer_id' => $this->refer_customer_id,
            'create_time' => $this->create_time,
        ]);

        $query->andFilterWhere(['like', 'insure.orderId', $this->orderId])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'is_pt', $this->is_pt])
            ->andFilterWhere(['like', 'insure.insure_title', $this->insure_title])
            ->andFilterWhere(['like', 'insure_code', $this->insure_code])
            ->andFilterWhere(['like', 'insure_product', $this->insure_product])
            ->andFilterWhere(['like', 'insure_extend', $this->insure_extend])
            //->andFilterWhere(['between', 'start_date', $start_date_s,$start_date_e])
            //->andFilterWhere(['between', 'end_date', $end_date_s,$end_date_e])
            ->andFilterWhere(['like', 'insure_name', $this->insure_name])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'card_type', $this->card_type])
            ->andFilterWhere(['like', 'card_no', $this->card_no])
            ->andFilterWhere(['like', 'birthday', $this->birthday])
            ->andFilterWhere(['like', 'channel_no', $this->channel_no])//channel_no
            ->andFilterWhere(['like', 'insure_json', $this->insure_json])
            ->andFilterWhere(['like', 'return_insure_json', $this->return_insure_json])
            ->andFilterWhere(['like', 'policyNO', $this->policyNO])
            ->andFilterWhere(['like', 'policyURL', $this->policyURL])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'manufacturer', $this->manufacturer])
            ->andFilterWhere(['like', 'channel', $this->channel])//'manufacturer','channel'
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'p.pay_method', $this->pay_method]);

        if(!empty($params['x_date']) && !empty($params['e_date'])){
            $query ->andFilterWhere(['between', 'insure.create_time', strtotime($params['x_date'].' 00:00:00'),strtotime($params['e_date'].' 23:59:59')]);
        }elseif(!empty($params['x_date'])){
            $query ->andFilterWhere(['>=', 'insure.create_time', strtotime($params['x_date'].' 00:00:00')]);
        }
        return $dataProvider;
    }
}
