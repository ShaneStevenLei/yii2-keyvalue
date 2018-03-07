<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KeyValue */

$this->title = 'Update Key Value: ' . $model->key_value_id;
$this->params['breadcrumbs'][] = ['label' => 'Key Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->key_value_id, 'url' => ['view', 'id' => $model->key_value_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="key-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
