<?php
/**
 *
 */

namespace frontend\models;


use yii\base\Model;
use frontend\behaviors\UuidGeneratorBehavior;

class Product extends Model
{
    const EVENT_BEFORE_SAVE = 'beforeSave';
    protected $id;
    protected $name;
    public $uuid;

    public function behaviors()
    {
        return [
            [
                'class' => UuidGeneratorBehavior::class,
                'attributes' => [
                    'uuid' => [],
                ],
                'uuid' => 'uuid',
            ],
        ];
    }

    public function save()
    {
        $this->trigger(self::EVENT_BEFORE_SAVE);
        $redis = new \Redis();

        \var_dump($this);
    }


    public function setName($name)
    {
        $this->name = $name;
    }


}