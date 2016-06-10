<?php

namespace backend\modules\ads_fields_default_value\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\ads_fields_default_value\models\Ads_fields_default_value;

/**
 * Ads_fields_default_valueSearch represents the model behind the search form about `backend\modules\ads_fields_default_value\models\Ads_fields_default_value`.
 */
class Ads_fields_default_valueSearch extends Ads_fields_default_value
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ads_field_id'], 'integer'],
            [['value'], 'safe'],
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
        $query = Ads_fields_default_value::find();

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
            'ads_field_id' => $this->ads_field_id,
        ]);

        $query->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
