<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 15.11.17
 * Time: 17:11
 */

namespace frontend\modules\personal_area\models;

use yii\data\ActiveDataProvider;

class UserScoreSearch extends UserScore
{
    public function search()
    {
        $query = UserScore::find();

        // add conditions that should always apply here


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //$query->where(['status' => 1]);

        // grid filtering conditions
        $query->where([
            'user_id' => \Yii::$app->user->id,
        ]);

        $query->orderBy('dt_add DESC');

        return $dataProvider;
    }
}