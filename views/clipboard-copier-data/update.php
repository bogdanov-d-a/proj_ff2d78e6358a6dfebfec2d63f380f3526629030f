<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ClipboardCopierData $model */

$this->title = 'Update Clipboard Copier Data: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clipboard Copier Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clipboard-copier-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
