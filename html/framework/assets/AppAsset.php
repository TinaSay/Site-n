<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot';

    /**
     * @var string
     */
    public $baseUrl = '@web';

    /**
     * @var array
     */
    public $css = [
        'static/default/css/normalize.css',
        'static/default/css/component.css',
        'static/default/css/main.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'static/default/js/modernizr.custom.js',
        'static/default/js/device.js',
        'static/default/js/classie.js',
        'static/default/js/three.min.js',
        'static/default/js/TweenMax.min.js',
        'static/default/js/granim.js',
        'static/default/js/charming.min.js',
        'static/default/js/anime.min.js',
        'static/default/js/lineMaker.js',
        'static/default/js/textfx.js',
        'static/default/js/progressButton.js',
        'static/default/js/jquery.fullPage.js',
        'static/default/js/slick.min.js',
        'static/default/js/main.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        JqueryAsset::class,
    ];
}
