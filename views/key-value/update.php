<?php
use stevenlei\keyvalue\assets\KvAsset;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model stevenlei\keyvalue\models\KeyValue */

$this->title                   = '更新：' . $model->key;
$this->params['breadcrumbs'][] = ['label' => 'KeyValue', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="key-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
