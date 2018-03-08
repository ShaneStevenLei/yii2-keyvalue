<?php
use stevenlei\keyvalue\assets\KvAsset;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model \stevenlei\keyvalue\models\KeyValue */

$this->title                   = $model->key;
$this->params['breadcrumbs'][] = ['label' => 'KeyValue', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
KvAsset::register($this);
?>
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
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'key',
            [
                'attribute' => 'value',
                'format'    => 'raw',
                'value'     => "<div  style='word-break: break-all;word-wrap: break-word'><textarea  onclick='copy()' style='width: 100%;resize:none;' rows='10' id='source'>" . $model->value . '</textarea></div>',
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
    <?php $this->beginBlock('js_import') ?>
    function copy() {
        copyToClipboard($('#source'));
        layer.msg("复制成功", {icon: 6});
    }

    function copyToClipboard(elem) {
        // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);

        // copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch (e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }

        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }

    $("table:eq(0) th").css("width", "10%");
    <?php
    $this->endBlock();
    $this->registerJs($this->blocks ['js_import'], \yii\web\View::POS_END);
    ?>
</script>

