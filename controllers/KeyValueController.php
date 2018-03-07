<?php
namespace stevenlei\keyvalue\controller;

use common\modules\keyvalue\models\KeyValue;
use common\modules\keyvalue\models\KeyValueSearch;
use yii\base\UserException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;

class KeyValueController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel  = new KeyValueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\UserException
     */
    public function actionCreate()
    {
        $model = new KeyValue();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->created_user_id = Yii::$app->user->id;
            $model->updated_user_id = Yii::$app->user->id;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                throw new UserException(json_encode($model->getErrors(), JSON_UNESCAPED_UNICODE));
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        Yii::$app->cache->delete(KeyValue::getCacheKey($model->key_value_key));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->cache->delete(KeyValue::getCacheKey($model->key_value_key));

            return $this->redirect(['view', 'id' => $model->key_value_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Yii::$app->cache->delete(KeyValue::getCacheKey($model->key_value_key));
        $model->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = KeyValue::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
