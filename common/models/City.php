<?php

namespace common\models;

use tuyakhov\jsonapi\Inflector;
use tuyakhov\jsonapi\LinksInterface;
use tuyakhov\jsonapi\ResourceInterface;
use tuyakhov\jsonapi\ResourceTrait;

/**
 * This is the model class for table "city".
 *
 * @property int $city_id
 * @property string $name
 * @property string $geom
 */
class City extends \yii\db\ActiveRecord implements LinksInterface, ResourceInterface
{
    use ResourceTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['geom'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'City ID',
            'name' => 'Name',
            'geom' => 'Geom',
        ];
    }

    public function fields()
    {
        return [
            'city_id' => 'city_id',
            'name' => 'name'
        ];
    }

    public function getLinks()
    {
        $reflect = new \ReflectionClass($this);
        $controller = Inflector::camel2id($reflect->getShortName());

        return [
//            Link::REL_SELF => Url::to(["$controller/view", 'id' => $this->getId()], true)
        ];
    }
}
