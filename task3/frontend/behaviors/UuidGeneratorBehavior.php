<?php
/**
 * Class UuidGenerator
 */

namespace frontend\behaviors;

use \frontend\models\Product;
use yii\behaviors\AttributeBehavior;

class UuidGeneratorBehavior extends AttributeBehavior
{
    public $uuid;

    public function events()
    {
        return [
            Product::EVENT_BEFORE_SAVE => 'generateUuid',
        ];
    }

    public function generateUuid()
    {
        $this->uuid = 'someId';
        echo 'beforeSave';
    }

    public function getUuid()
    {
        return $this->uuid;
    }

}