<?php

namespace frontend\controllers;

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
use frontend\behaviors\UuidGeneratorBehavior;

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


}
