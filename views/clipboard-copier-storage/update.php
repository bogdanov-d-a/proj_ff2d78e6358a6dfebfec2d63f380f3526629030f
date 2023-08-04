<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ClipboardCopierStorage $model */

$this->title = 'Update Clipboard Copier Storage: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clipboard Copier Storages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clipboard-copier-storage-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
