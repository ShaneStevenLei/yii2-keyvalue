<?php
namespace stevenlei\keyvalue\assets;

use yii\web\AssetBundle;

class SearchAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@stevenlei/keyvalue/assets/dist';
    /**
     * @inheritdoc
     */
    public $css = [
        'common-search.css',
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        'common-search.js',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'stevenlei\keyvalue\assets\DatetimePickerAsset',
        'stevenlei\keyvalue\assets\SelectAsset',
    ];
}