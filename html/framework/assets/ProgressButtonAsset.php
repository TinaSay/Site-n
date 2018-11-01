<?php
/**
 * Created by PhpStorm.
 * User: nsign
 * Date: 22.02.18
 * Time: 19:56
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class ProgressButtonAsset
 *
 * @package app\assets
 */
class ProgressButtonAsset extends AssetBundle
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
    public $js = [
        'static/default/js/modernizr.custom.js',
        'static/default/js/progressButton.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}
