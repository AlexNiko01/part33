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
    /**
     * @var
     */
    protected $uuid;

    /**
     * @return array
     */
    public function events(): array
    {
        return [
            Product::EVENT_BEFORE_SAVE => 'generateUuid',
        ];
    }

    /**
     * @param $event
     */
    public function generateUuid(object $event): void
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