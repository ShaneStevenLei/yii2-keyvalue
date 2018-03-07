<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model \stevenlei\keyvalue\models\KeyValue */

$this->title                   = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Key Value', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/layer/skin/default/layer.css');
$this->registerJsFile('/layer/layer.js', ['depends' => 'backend\assets\AdminLteAsset']);
?>

<script src="/js/utils.js"></script>

<div class="key_value-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => '确定删除该项?',
                'method'  => 'post',
            ],
        ]) ?>
        <?= Html::a('继续添加', ['/key-value/create'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('返回列表', ['/key-value/index'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'key',
            [
                'label'  => 'Value',
                'format' => 'raw',
                'value'  => "<div  style='word-break: break-all;word-wrap: break-word'><textarea  onclick='copy()' style='width: 100%;resize:none;' rows='10' id='source'>" . $model->value . '</textarea></div>',
            ],
            'memo:ntext',
            'status',
            'created_user_id',
            'updated_user_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

<script>
    function copy() {
        copyToClipboard(document.getElementById("source"));
        layer.msg("复制成功", {icon: 6});
    }

    $("table:eq(0) th").css("width", "10%");
</script>

