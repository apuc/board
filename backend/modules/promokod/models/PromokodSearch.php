<?php

namespace backend\modules\promokod\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\promokod\models\Promokod;

/**
 * PromokodSearch represents the model behind the search form about `backend\modules\promokod\models\Promokod`.
 */
class PromokodSearch extends Promokod
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'one_time', 'dt_add'], 'integer'],
            [['name', 'code'], 'safe'],
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
        $query = Promokod::find();

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
            'one_time' => $this->one_time,
            'dt_add' => $this->dt_add,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
