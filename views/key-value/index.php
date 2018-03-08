<?php
use stevenlei\keyvalue\assets\SearchAsset;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel stevenlei\keyvalue\models\KeyValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'KeyValue';
$this->params['breadcrumbs'][] = $this->title;
SearchAsset::register($this);
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
                'key',
                [
                    'attribute'      => 'value',
                    'contentOptions' => [
                        'style' => 'width:100px; word-break: break-all; word-wrap: break-word;',
                        'class' => 'text-left;',
                    ],
                    'value'          => function ($item) {
                        if (strlen($item->value) <= 100) {
                            return $item->value;
                        } else {
                            return substr($item->value, 0, 100) . ' ...';
                        }
                    },
                ],
                'memo:ntext',
                [
                    'attribute' => 'status',
                    'value'     => function ($item) use ($searchModel) {
                        if (key_exists($item->status, $searchModel->getStatus())) {
                            return $searchModel->getStatus()[$item->status];
                        }

                        return '未知';
                    },
                ],
                'created_user_id',
                'updated_user_id',
                'created_at',
                'updated_at',
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