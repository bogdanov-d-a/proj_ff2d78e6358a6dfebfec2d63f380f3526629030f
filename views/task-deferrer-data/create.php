<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskDeferrerData $model */

$this->title = 'Create Task Deferrer Data';
$this->params['breadcrumbs'][] = ['label' => 'Task Deferrer Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-deferrer-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
