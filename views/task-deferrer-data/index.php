<?php

use app\models\TaskDeferrerData;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TaskDeferrerDataSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var int|null $storageId */
/** @var string|null $storageName */

$now = (new DateTime())->format('Y-m-d H:i:s');

$this->title = 'Task Deferrer Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-deferrer-data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h2><?= "$storageId: $storageName&emsp;now: $now" ?></h2>

    <p>
        <?= Html::a('Create Task Deferrer Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'text:ntext',
            'date',
            'defer_days',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} {defer}',
                'urlCreator' => function ($action, TaskDeferrerData $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'buttons' => [
                    'defer' => function ($url) {
                        return Html::a('Defer', $url);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
