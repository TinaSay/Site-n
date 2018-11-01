<?php

namespace app\modules\contactus\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\View;

/**
 * Class YandexMapAsset
 *
 * @package app\modules\contactus\assets
 */
class YandexMapAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@app/modules/contactus/assets/dist';

    /**
     * @var array
     */
    public $js = [
        'https://api-maps.yandex.ru/2.1/?lang=ru_RU',
        'js/yandexMap.js',
    ];

    /**
     * @var array
     */
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    /**
     * @var array
     */
    public $publishOptions = [
        'forceCopy' => YII_ENV_DEV,
    ];

    /**
     * @var array
     * @var array
     */
    public $depends = [
        JqueryAsset::class,
    ];
}
