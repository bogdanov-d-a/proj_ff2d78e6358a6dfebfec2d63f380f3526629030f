<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskDeferrerStorage $model */

$this->title = 'Create Task Deferrer Storage';
$this->params['breadcrumbs'][] = ['label' => 'Task Deferrer Storages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-deferrer-storage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
