<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Artigo */

$this->title = 'Update Artigo: ' . $model->idartigo;
$this->params['breadcrumbs'][] = ['label' => 'Artigos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idartigo, 'url' => ['view', 'id' => $model->idartigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="artigo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
