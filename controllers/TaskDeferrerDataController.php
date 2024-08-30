<?php

namespace app\controllers;

use app\models\TaskDeferrerData;
use app\models\TaskDeferrerDataSearch;
use app\models\TaskDeferrerStorage;
use DateInterval;
use DateTime;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaskDeferrerDataController implements the CRUD actions for TaskDeferrerData model.
 */
class TaskDeferrerDataController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TaskDeferrerData models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TaskDeferrerDataSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $storageId = $this->request->queryParams['TaskDeferrerDataSearch']['storage_id'] ?? null;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'storageId' => $storageId,
            'storageName' => $storageId !== null ? TaskDeferrerStorage::findOne(['id' => $storageId])?->name : null,
        ]);
    }

    /**
     * Displays a single TaskDeferrerData model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TaskDeferrerData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TaskDeferrerData();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TaskDeferrerData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TaskDeferrerData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $storageId = $model->storage_id;
        $model->delete();

        return $this->indexRedirectWithStorageId($storageId);
    }

    public function actionDefer($id, $days)
    {
        $model = $this->findModel($id);

        $model->date = (new DateTime())
            ->add(new DateInterval('P' . $days . 'D'))
            ->format('Y-m-d');

        $model->save();

        return $this->indexRedirectWithStorageId($model->storage_id);
    }

    /**
     * Finds the TaskDeferrerData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TaskDeferrerData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TaskDeferrerData::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function indexRedirectWithStorageId($storageId)
    {
        return $this->redirect([
            'index',
            'TaskDeferrerDataSearch' => ['storage_id' => $storageId]
        ]);
    }
}
