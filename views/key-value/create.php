<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model stevenlei\keyvalue\models\KeyValue */

$this->title                   = '创建KeyValue';
$this->params['breadcrumbs'][] = ['label' => 'KeyValue', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="key-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
