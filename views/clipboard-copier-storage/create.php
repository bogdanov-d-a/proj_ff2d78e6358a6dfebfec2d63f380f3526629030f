<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ClipboardCopierStorage $model */

$this->title = 'Create Clipboard Copier Storage';
$this->params['breadcrumbs'][] = ['label' => 'Clipboard Copier Storages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clipboard-copier-storage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
