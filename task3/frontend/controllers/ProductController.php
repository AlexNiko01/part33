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

            $productData = Yii::$app->request->post('Product');
            $product->name = $productData['name'];

            $product->save();
            Yii::$app->session->setFlash('success', 'The data is received');
            return $this->refresh();

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
        $id = $request->get('id', 1);
        $product = Product::findOne($request->get('id', 1));

        if ($request->post('Product')['name']) {
            $product->name = $request->post('Product')['name'];

            $product->save();
            $this->redirect(['product/index']);

        }

        return $this->render('update', ['product' => $product]);

    }
}