<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskDeferrerStorage $model */

$this->title = 'Update Task Deferrer Storage: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Task Deferrer Storages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-deferrer-storage-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
