<?php

namespace app\models\Object;

/**
 * This is the ActiveQuery class for [[Object]].
 *
 * @see Object
 */
class ObjectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Object[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Object|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
