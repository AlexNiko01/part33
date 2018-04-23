<?php

namespace frontend\controllers;

use frontend\models\Product;
use yii\data\ActiveDataProvider;
use Yii;

class ProductController extends ApplicationController
{
    public function actionSave()
    {
        $product = new Product();
        $product->save();
    }

    public function actionIndex()
    {
        $product = new Product();
        if ($product->load(Yii::$app->request->post())) {
            if ($product->validate()) {
                $productData = Yii::$app->request->post('Product');
                $product->name = $productData['name'];

                $product->save();
                Yii::$app->session->setFlash('success', 'The data is received');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Something is went wrong. this is ERROR');
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'product' => $product]);
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        $product = new Product();
        $product->deleteAll(['id' => $request->get('id', 1)]);
        $this->redirect(['product/index']);

    }

    public function actionUpdate()
    {
        $request = Yii::$app->request;
        $product = Product::findOne($request->get('id', 1));

        if ($product->load(Yii::$app->request->post())) {
            if ($product->validate()) {
                $productData = Yii::$app->request->post('Product');
                $product->name = $productData['name'];

                $product->save();
                Yii::$app->session->setFlash('success', 'The data is received');

            } else {
                Yii::$app->session->setFlash('error', 'Something is went wrong. this is ERROR');
            }
        }

        return $this->render('update', ['product' => $product]);

    }
}