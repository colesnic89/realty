<?php

namespace app\models\ObjectImage;

use Yii;
use app\models\Object\Object;

/**
 * This is the model class for table "ObjectImage".
 *
 * @property int $ID
 * @property int $ObjectID
 * @property string $Small
 * @property string $Medium
 * @property string $Large
 * @property int $IsMain
 *
 * @property Object $object
 * @property string $mediumPath
 */
class ObjectImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ObjectImage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ObjectID', 'Small', 'Medium', 'Large'], 'required'],
            [['IsMain'], 'default', 'value' => 0],
            [['ObjectID', 'IsMain'], 'integer'],
            [['Small', 'Medium', 'Large'], 'string', 'max' => 255],
            [['ObjectID'], 'exist', 'skipOnError' => true, 'targetClass' => Object::className(), 'targetAttribute' => ['ObjectID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ObjectID' => Yii::t('app', 'Object ID'),
            'Small' => Yii::t('app', 'Small'),
            'Medium' => Yii::t('app', 'Medium'),
            'Large' => Yii::t('app', 'Large'),
            'IsMain' => Yii::t('app', 'Is Main'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObject()
    {
        return $this->hasOne(Object::className(), ['ID' => 'ObjectID']);
    }

    /**
     * @inheritdoc
     * @return ObjectImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ObjectImageQuery(get_called_class());
    }
    
}
