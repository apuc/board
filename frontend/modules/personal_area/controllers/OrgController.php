<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 22.02.2017
 * Time: 22:45
 */

namespace frontend\modules\personal_area\controllers;

use common\models\db\Ads;
use common\models\db\Organizations;
use common\models\db\OrgInfo;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;

class OrgController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionOrg_user_active()
    {

        $query = OrgInfo::find()
            ->where(['user_id' => \Yii::$app->user->id, 'status' => 2])
            ->orderBy('dt_update DESC');

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        $org = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $request = Yii::$app->request;

        return $this->render('org-active', ['org' => $org, 'pagination' => $pagination, 'request' => $request]);
    }

    public function actionOrg_user_not_active()
    {

        $query = OrgInfo::find()
            ->where(['user_id' => \Yii::$app->user->id, 'status' => [5,6]])
            ->orderBy('dt_update DESC');

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        $org = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $request = Yii::$app->request;

        return $this->render('org-not-active', ['org' => $org, 'pagination' => $pagination, 'request' => $request]);
    }

    public function actionOrg_user_moder()
    {

        $query = OrgInfo::find()
            ->where(['user_id' => \Yii::$app->user->id, 'status' => [1,6]])
            ->orderBy('dt_update DESC');

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        $org = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $request = Yii::$app->request;

        return $this->render('org-not-active', ['org' => $org, 'pagination' => $pagination, 'request' => $request]);
    }

    public function actionDelete(){
        $request = Yii::$app->request;

        Organizations::updateAll(['status' => 3], ['id' => $request->post('id')]);
        Ads::updateAll(['status' => 3], ['business_id' => $request->post('id')]);
        if($request->post('org') == 'active'){
            $url = 'org_user_active';
        }
        else{
            $url = 'org_user_not_active';
        }
        Yii::$app->session->setFlash('success','Организация успешно удалена.');
        return $this->redirect([$url, 'page' => $request->post('page')]);
    }

    public function actionDelete_all(){
        $request = Yii::$app->request;
        $arrOrg = explode(',', $request->post('id'));
        array_splice($arrOrg, -1);
        if($request->post('org') == 'active'){
            $url = 'org_user_active';
        }
        else{
            $url = 'org_user_not_active';
        }
        Yii::$app->session->setFlash('success','Организации успешно удалены.');
        Organizations::updateAll(['status' => 3], ['id' => $arrOrg]);
        Ads::updateAll(['status' => 3], ['business_id' => $arrOrg]);
        return $this->redirect([$url, 'page' => $request->post('page')]);
        //Debug::prn($arrAds);
    }
}