<?php
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Key Value';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/common-search.css', ['depends' => 'backend\assets\AppAsset']);
$this->registerJsFile('/js/common-search.js', ['depends' => 'backend\assets\AdminLteAsset']);
?>
<section class="panel panel-default section-search">
    <header class="panel-heading search-options">搜索条件
        <i class="fa fa-arrow-circle-down text-danger"></i>
    </header>
    <div class="panel-body">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider'   => $dataProvider,
            'columns'        => [
                ['class' => 'yii\grid\ActionColumn'],
                'key_value_id',
                'key_value_key',
                [
                    'attribute'      => 'key_value_value',
                    'contentOptions' => [
                        'style' => 'width:100px; word-break: break-all; word-wrap: break-word;',
                        'class' => 'text-left;',
                    ],
                    'value'          => function ($data) {
                        if (strlen($data->key_value_value) <= 100) {
                            return $data->key_value_value;
                        } else {
                            return substr($data->key_value_value, 0, 100) . ' ...';
                        }
                    },
                ],
                'key_value_memo:ntext',
                [
                    'attribute' => 'key_value_status',
                    'value'     => function ($item) use ($searchModel) {
                        if (key_exists($item->key_value_status, $searchModel->getStatus())) {
                            return $searchModel->getStatus()[$item->key_value_status];
                        }

                        return '未知';
                    },
                ],
                'key_value_create_user',
                'key_value_update_user',
                'key_value_create_at',
                'key_value_update_at',
            ],
            'layout'         => "{summary}\n{items}\n{summary}",
            'summaryOptions' => [
                'class' => 'summary',
                'style' => 'margin-left:10px;',
            ],
            'options'        => ['style' => 'overflow-x: scroll;',],
            'tableOptions'   => [
                'class' => 'table table-hover table-bordered',
                'style' => 'min-width:100%',
            ],
        ]); ?>
    </div>
    <div class="panel-footer">
        <?= LinkPager::widget([
            'pagination'     => $dataProvider->pagination,
            'nextPageLabel'  => '下一页',
            'prevPageLabel'  => '上一页',
            'firstPageLabel' => '首页',
            'lastPageLabel'  => '末页',
            'options'        => [
                'class' => 'pagination pagination-sm m-t-none m-b-none',
            ],
        ]) ?>
    </div>
</section>