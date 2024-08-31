<?php

use app\helpers\Utils;
use app\models\TaskDeferrerConfig;
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

$today = TaskDeferrerConfig::today()->format(Utils::DATE_FORMAT);

$this->title = 'Task Deferrer Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-deferrer-data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h2><?= "$storageId: $storageName&emsp;today: $today" ?></h2>

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
            [
                'label' => 'Defer Days',
                'value' => function (TaskDeferrerData $model) {
                    return Html::a(
                        "$model->defer_days days",
                        Url::toRoute([
                            'defer',
                            'id' => $model->id,
                            'days' => $model->defer_days
                        ])
                    );
                },
                'format' => 'raw'
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} {defer}',
                'urlCreator' => function (string $action, TaskDeferrerData $model) {
                    $route = [$action, 'id' => $model->id];

                    if ($action === 'defer') {
                        $route['days'] = 1;
                    }

                    return Url::toRoute($route);
                },
                'buttons' => [
                    'defer' => function ($url) {
                        return Html::a('D1D', $url);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
