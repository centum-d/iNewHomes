<?php

namespace frontend\assets;

/**
 * Class AxiosAsset
 * @package frontend\assets
 */
class AxiosAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@npm/axios/dist';

    public $js = [
        'axios.min.js'
    ];
}
