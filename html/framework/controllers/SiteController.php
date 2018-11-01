<?php
/**
 * Created by PhpStorm.
 * User: nsign
 * Date: 22.02.18
 * Time: 15:55
 */

namespace app\controllers;

use krok\system\components\frontend\Controller;

/**
 * Class SiteController
 *
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * @var string
     */
    public $layout = 'layout';

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
