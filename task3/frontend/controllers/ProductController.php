<?php

namespace frontend\controllers;

use frontend\models\Product;
use yii\data\ActiveDataProvider;
use Yii;

class ProductController extends ApplicationController
{
    /**
     * @param Product $product
     */
    private function dataSave(Product $product): void
    {
        if (false === $product->save()) {
            Yii::$app->session->setFlash('error', 'Error save!');
        } else {
            Yii::$app->session->setFlash('success', 'The data is received');
        }
    }

    /**
     * @return mixed|string|\yii\web\Response
     */
    public function actionIndex()
    {
        $product = new Product();
        if ($product->load(Yii::$app->request->post()) && $product->validate()) {

            $this->dataSave($product);

            return $this->refresh();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'product' => $product]);
    }

    /**
     * @param $id integer
     */
    public function actionDelete(int $id): void
    {
        $product = new Product();
        $product->deleteAll(['id' => $id]);
        $this->redirect(['product/index']);

    }

    /**
     * @return string
     */
    public function actionUpdate(): string
    {
        $request = Yii::$app->request;
        $product = Product::findOne($request->get('id', 1));

        if ($product->load(Yii::$app->request->post()) && $product->validate()) {
            $this->dataSave($product);

            $this->redirect(['product/index']);
        }

        return $this->render('update', ['product' => $product]);

    }
}