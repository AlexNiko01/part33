<?php
/**
 *
 */

namespace frontend\models;


use frontend\behaviors\UuidGeneratorBehavior;
use yii\redis\ActiveRecord;

class Product extends ActiveRecord
{
    const EVENT_BEFORE_SAVE = 'beforeSave';

    public function behaviors()
    {
        return [
            [
                'class' => UuidGeneratorBehavior::class,
            ],
        ];
    }

    public function setId($uuid)
    {
        $this->id = $uuid;
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $this->trigger(self::EVENT_BEFORE_SAVE);
        parent::save($runValidation, $attributeNames);

    }

    public function attributes()
    {
        return ['id', 'name'];
    }


    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'field Name can`t be empty'],
        ];
    }


}