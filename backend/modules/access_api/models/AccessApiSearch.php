<?php

namespace backend\modules\access_api\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\access_api\models\AccessApi;

/**
 * AccessApiSearch represents the model behind the search form about `backend\modules\access_api\models\AccessApi`.
 */
class AccessApiSearch extends AccessApi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'visible_ads'], 'integer'],
            [['name', 'mail', 'site', 'api_key'], 'safe'],
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
        $query = AccessApi::find();

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
            'visible_ads' => $this->visible_ads,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'api_key', $this->api_key]);

        return $dataProvider;
    }
}
