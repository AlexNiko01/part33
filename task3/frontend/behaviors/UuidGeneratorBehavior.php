<?php
/**
 * Class UuidGenerator
 */

namespace frontend\behaviors;

use \frontend\models\Product;
use yii\base\Behavior;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class UuidGeneratorBehavior extends Behavior
{
    protected $uuid;

    public function events()
    {
        return [
            Product::EVENT_BEFORE_SAVE => 'generateUuid',
        ];
    }

    public function generateUuid($event)
    {
        try {
            $uuid = Uuid::uuid4();
            if ($event->sender->id === null) {
                $event->sender->setId($uuid->toString());
            }

        } catch (UnsatisfiedDependencyException $e) {

            echo 'Caught exception: ' . $e->getMessage() . "\n";

        }
    }
}