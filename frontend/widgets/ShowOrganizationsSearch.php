<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 24.12.2016
 * Time: 12:45
 */

namespace frontend\widgets;


use common\models\db\CategoryOrganizations;
use yii\base\Widget;

class ShowOrganizationsSearch extends Widget
{

    public function run()
    {
        return $this->render('organizations_search',[
            'org' => CategoryOrganizations::find()->where(['parent_id' => 0])->all(),
        ]);
    }

}