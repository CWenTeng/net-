<?php

namespace backend\controllers;

use Yii;
use common\models\Reserve;
use common\models\ReserveSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;


/**
 * ReserveController implements the CRUD actions for Reserve model.
 */
class ReserveController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

            'access' =>[
                        'class' => AccessControl::className(),
                        'rules' =>
                        [
                                [
                                        'actions' => ['error'],
                                        'allow' => true,
                                        'roles' => ['?'],
                                ],
                                [
                                        'actions' => ['view', 'index', 'create','update','delete'],
                                        'allow' => true,
                                        'roles' => ['@'],
                                ],
                        ],
            ],
        ];
    }

    /**
     * Lists all Reserve models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReserveSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reserve model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Reserve model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->can('createReserve')){
            throw new ForbiddenHttpException('对不起，你没有进行该操作的权限。');
        }

        $model = new Reserve();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reserve model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        if(!Yii::$app->user->can('updateReserve')){
            throw new ForbiddenHttpException('对不起，你没有进行该操作的权限。');
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reserve model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->can('deleteReserve')){
            throw new ForbiddenHttpException('对不起，你没有进行该操作的权限。');
        }
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reserve model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reserve the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reserve::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
