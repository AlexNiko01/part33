<?php

namespace frontend\models\mongo;

class Product extends \gepard\mongodb\ActiveRecord
{
    public static function collectionName()
    {
        return 'products';
    }
    /**
     * @return array list of attribute names.
     */
    public function attributes()
    {
        return [
            '_id',
            'brandId',
            'description',
            'categoryId'
        ];
    }
}