<?php
/**
 *
 */

namespace frontend\controllers;



use gepard\mongodb\Connection;
use MongoDB\Driver\Cursor;
use yii\console\Controller;


class MongoController extends Controller
{
    public function actionIndex()
    {
        echo $this->stdout('1a. Найти все продукты категории Notebooks по id = 151 ');
        echo PHP_EOL;

        /** @var Connection $connection */
        $connection = $result = \Yii::$app->mongodb;

        /** @var Cursor $result */
        $result = $connection
            ->createCommand(['categoryId' => 151])
            ->count('products');
            //->query('products');

        \var_dump($result);


    }

}