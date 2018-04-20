<?php

namespace frontend\controllers;

use frontend\models\Product;
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
        $product = new Product();
        $products = $product->getAll();
        return $this->render('view', ['product' => $product]);
    }
}