<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BinsurePayInfo;

/**
 * BinsurePayInfoSearch represents the model behind the search form of `backend\models\BinsurePayInfo`.
 */
class BinsurePayInfoSearch extends BinsurePayInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'insure_id', 'notice_status', 'addtime'], 'integer'],
            [['orderId', 'insure_title', 'pay_method', 'pay_bank', 'pay_No', 'contract_id', 'pay_status', 'recurring_pay_date', 'pay_back_json', 'return_methon', 'tradeTime', 'chargebacknotice', 'payFinishTime', 'sign'], 'safe'],
            [['totalPremium'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = BinsurePayInfo::find();

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
            'id' => $this->id,
            'insure_id' => $this->insure_id,
            'totalPremium' => $this->totalPremium,
            'notice_status' => $this->notice_status,
            'addtime' => $this->addtime,
        ]);

        $query->andFilterWhere(['like', 'orderId', $this->orderId])
            ->andFilterWhere(['like', 'insure_title', $this->insure_title])
            ->andFilterWhere(['like', 'pay_method', $this->pay_method])
            ->andFilterWhere(['like', 'pay_bank', $this->pay_bank])
            ->andFilterWhere(['like', 'pay_No', $this->pay_No])
            ->andFilterWhere(['like', 'contract_id', $this->contract_id])
            ->andFilterWhere(['like', 'pay_status', $this->pay_status])
            ->andFilterWhere(['like', 'recurring_pay_date', $this->recurring_pay_date])
            ->andFilterWhere(['like', 'pay_back_json', $this->pay_back_json])
            ->andFilterWhere(['like', 'return_methon', $this->return_methon])
            ->andFilterWhere(['like', 'tradeTime', $this->tradeTime])
            ->andFilterWhere(['like', 'chargebacknotice', $this->chargebacknotice])
            ->andFilterWhere(['like', 'payFinishTime', $this->payFinishTime])
            ->andFilterWhere(['like', 'sign', $this->sign]);

        return $dataProvider;
    }
}
