<?php

namespace frontend\controllers;

use frontend\models\Product;
use yii\data\ActiveDataProvider;

class ProductController extends ApplicationController
{
    public function actionSave()
    {
        $product = new Product();
        $product->save();
        $redis = new \Redis();
        \var_dump($product->getId());
    }

    public function actionView()
    {
//        $product = new Product();
//        $products = $product->getAll();


        $product = new Product();
        $product->id = 123;
        $product->name = 'name';
        $product->insert();


        \var_dump(Product::find()->all());

//        $dataProvider = new ActiveDataProvider([
//            'query' => Product::find(),
//            'pagination' => [
//                'pageSize' => 20,
//            ],
//        ]);

//        return $this->render('view', ['dataProvider' => $dataProvider]);
    }
}