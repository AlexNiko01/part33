<?php


namespace frontend\models;


use frontend\behaviors\UuidGeneratorBehavior;
use yii\redis\ActiveRecord;

class Product extends ActiveRecord
{
    const EVENT_BEFORE_SAVE = 'beforeSave';

    /**
     * @return array
     */
    public function behaviors(): array
    {
        return [
            UuidGeneratorBehavior::class,
        ];
    }

    /**
     * @param $uuid string
     */
    public function setId(string $uuid): void
    {
        $this->id = $uuid;
    }

    /**
     * @param bool $runValidation
     * @param null $attributeNames
     * @return bool
     */
    public function save($runValidation = true, $attributeNames = null)
    {
        $this->trigger(self::EVENT_BEFORE_SAVE);

        return parent::save($runValidation, $attributeNames);
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return ['id', 'name'];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name'], 'required', 'message' => 'field Name can`t be empty'],
        ];
    }


}