<?php

namespace frontend\assets;


/**
 * Class VueAsset
 * @package frontend\assets
 */
class VueAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@npm/vue/dist';

    public $js = [
        YII_ENV_DEV ? 'vue.js' : 'vue.min.js'
    ];
}