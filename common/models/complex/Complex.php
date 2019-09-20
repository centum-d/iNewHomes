<?php

namespace common\models\complex;

use yii\helpers\Url;
use common\models\User;
use common\behaviors\softdelete\SoftDeleteBehavior;
use tuyakhov\jsonapi\Inflector;
use tuyakhov\jsonapi\LinksInterface;
use tuyakhov\jsonapi\ResourceInterface;
use tuyakhov\jsonapi\ResourceTrait;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\Link;

/**
 * This is the model class for table "complex".
 *
 * @property int $complex_id
 * @property string $name
 * @property string $address
 * @property string $geom
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property int $is_deleted
 */
class Complex extends \yii\db\ActiveRecord implements LinksInterface, ResourceInterface
{
    public $city_id;

    use ResourceTrait;

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
            ],
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => SoftDeleteBehavior::class,
                'attribute' => 'is_deleted'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'complex';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['geom'], 'string'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            ['city_id', 'integer'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'address'], 'string', 'max' => 255],
            ['is_deleted', 'default', 'value' => 0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'complex_id' => 'Complex ID',
            'name' => 'Name',
            'address' => 'Address',
            'geom' => 'Geom',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    public function getLinks()
    {
        $reflect = new \ReflectionClass($this);
        $controller = Inflector::camel2id($reflect->getShortName());

        return [
//            Link::REL_SELF => Url::to(["$controller/view", 'id' => $this->getId()], true)
        ];
    }

    public static function find()
    {
        return new ComplexQuery(get_called_class());
    }
}
