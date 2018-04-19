<?php
/**
 *
 */

namespace frontend\models;


use yii\base\Model;

class Product extends Model
{
    const EVENT_BEFORE_SAVE = 'beforeSave';
    protected $id;
    protected $name;

    public function save()
    {
        $this->beforeSave();
        $redis = new \Redis();
        \var_dump($redis);
    }

    public function beforeSave()
    {
        $this->trigger(self::EVENT_BEFORE_SAVE);
    }
    public function setName(){

    }
}