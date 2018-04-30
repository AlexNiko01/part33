<?php

namespace frontend\controllers;

use frontend\models\Product;
use gepard\mongodb\Connection;
use yii\console\Controller;
use yii\mongodb\Collection;
use yii\mongodb\Database;

class MongoController extends Controller
{
    /**
     * @var $database Database
     */
    private $database;
    /**
     * @var $collection Collection
     */
    private $collection;

    public function setDatabase()
    {
        /** @var Connection Connection */
        $connection = \Yii::$app->mongodb;
        $this->database = $connection->getDatabase('test');
    }

    public function setCollection()
    {
        $this->collection = $this->database->getCollection('products');
    }

    public function actionIndex()
    {
        $this->setDatabase();
        $this->setCollection();
//        $this->firstA();
//        $this->firstB();
//        $this->firstC();
//        $this->firstD();
//        $this->firstE();
        $this->firstF();
    }

    private function firstA()
    {
        echo $this->stdout('Найти все продукты категории Notebooks по id = 151:');
        echo PHP_EOL;
        $result = $this->collection->find(
            ['categoryId' => 151, 'categoryName.name' => 'notebooks'], ['limit' => 1])->toArray();

        dd($result);

    }

    private function firstB()
    {
        echo $this->stdout('Найти все продукты у которых есть EAN');
        echo PHP_EOL;
        $result = $this->collection->find(
            ['ean' => ['$exists' => true, '$not' => ['$size' => 0]]], [])->toArray();

        \print_r($result);
    }

    private function firstC()
    {
        echo $this->stdout('Найти все продукты не содержащие категорию Notebooks');
        echo PHP_EOL;
        $result = $this->collection->find(
            ['categoryName' => ['$ne' => 'notebooks']], [])->toArray();

        \print_r($result);
    }

    private function firstD()
    {
        echo $this->stdout('Найти продукты где EAN содержит значения: 0882780045675, 
        0882780045132, 0882780260214');
        echo PHP_EOL;
        $result = $this->collection->find(
            ['ean' => ['$in' => ['0882780045675', '0882780045132', '0882780260214']]], [])->toArray();

        \print_r($result);
    }

    private function firstE()
    {
        echo $this->stdout('Найти продукты где releaseDate старше 2018-01-01');
        echo PHP_EOL;
        $result = $this->collection->find(
            ['releaseDate' => ['$gt' => '2018-01-01']], [])->toArray();

        \print_r($result);
    }

    private function firstF()
    {
        echo $this->stdout('Найти продукты где updated между 20180201000000 и 20180401000000');
        echo PHP_EOL;
//        $result = $this->collection->find(
//        [
//            '$and' => [
//                ['updated' => ['$gt' => '20180201000000']],
//                ['updated' => ['$lte' => '20180401000000']]
//            ]
//        ])->toArray();
//        $result = $this->collection->find([]);
//
//
//        $collection = Product::getCollection();
//        $result = $collection->find(
//            [
//                '$and' => [
//                    ['updated' => ['$gt' => '20180201000000']],
//                    ['updated' => ['$lte' => '20180401000000']]
//                ]
//            ],
//            ['$limit' => 1]
//        )->toArray();

        $result = Product::find()->limit(5)->all();


        dd($result);
    }
}