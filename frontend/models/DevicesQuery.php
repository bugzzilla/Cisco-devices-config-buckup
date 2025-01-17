<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Devices]].
 *
 * @see Devices
 */
class DevicesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Devices[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Devices|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
