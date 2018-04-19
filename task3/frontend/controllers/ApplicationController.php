<?php

namespace frontend\controllers;

use frontend\models\Product;
use Yii;
use yii\base\InvalidParamException;
use yii\base\Model;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class ApplicationController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');

    }

    public function actionSave()
    {
        $product = new Product();
        $product->save();
    }
}
