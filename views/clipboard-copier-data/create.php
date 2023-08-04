<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ClipboardCopierData $model */

$this->title = 'Create Clipboard Copier Data';
$this->params['breadcrumbs'][] = ['label' => 'Clipboard Copier Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clipboard-copier-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
