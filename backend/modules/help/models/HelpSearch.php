<?php

namespace backend\modules\help\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\help\models\Help;

/**
 * HelpSearch represents the model behind the search form about `backend\modules\help\models\Help`.
 */
class HelpSearch extends Help
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dt_add', 'dt_update', 'status', 'views', 'category_id'], 'integer'],
            [['title', 'content', 'slug'], 'safe'],
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
        $query = Help::find();

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
            'dt_add' => $this->dt_add,
            'dt_update' => $this->dt_update,
            'status' => $this->status,
            'views' => $this->views,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
