<?php
/**
 * Class UuidGenerator
 */

namespace frontend\behaviors;

use \yii\base\Behavior;
use \frontend\models\Product;

class UuidGenerator extends Behavior
{
    public function events()
    {
        return [
            Product::EVENT_BEFORE_SAVE => 'beforeValidate',
        ];
    }

}