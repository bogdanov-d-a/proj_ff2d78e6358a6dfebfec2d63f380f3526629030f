<?php

use app\models\TaskDeferrerStorage;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TaskDeferrerStorageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Task Deferrer Storages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-deferrer-storage-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task Deferrer Storage', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} {browse}',
                'urlCreator' => function ($action, TaskDeferrerStorage $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'buttons' => [
                    'browse' => function ($url, $model) {
                        return Html::a('Browse', [
                            '/task-deferrer-data/index',
                            'TaskDeferrerDataSearch' => [
                                'storage_id' => $model->id
                            ]
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
