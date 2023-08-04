<?php

use app\helpers\Utils;
use app\models\ClipboardCopierData;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ClipboardCopierDataSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clipboard Copier Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clipboard-copier-data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clipboard Copier Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'label' => 'Copy',
                'value' => function ($model) {
                    $value = Utils::js_string_escape($model->value);
                    return "<button onclick=\"navigator.clipboard.writeText('$value');\">Copy</button>";
                },
                'format' => 'raw'
            ],
            'value',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ClipboardCopierData $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
