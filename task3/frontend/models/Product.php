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
    protected $id;
    protected $name;

    public function behaviors()
    {
        return [
            [
                'class' => UuidGeneratorBehavior::class,
            ],
        ];
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setId($uuid)
    {
        $this->id = $uuid;
    }

    public function getId()
    {
        return $this->id;
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $this->trigger(self::EVENT_BEFORE_SAVE);

        if ($this->getIsNewRecord()) {
            return $this->insert($runValidation, $attributeNames);
        }
        return $this->update($runValidation, $attributeNames) !== false;


    }

    public function attributes()
    {
        return ['id', 'name'];
    }


    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'cat field can`t be empty'],

        ];
    }

    public function getAll()
    {

    }
    //    public function delete(){
//
//    }

}