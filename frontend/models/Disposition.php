<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "disposition".
 *
 * @property int $id
 * @property string $name
 * @property string $operation_rule
 *
 * @property Leads[] $leads
 */
class Disposition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disposition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'operation_rule'], 'required'],
            [['name', 'operation_rule'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'operation_rule' => 'Operation Rule',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeads()
    {
        return $this->hasMany(Leads::className(), ['disposition_id' => 'id']);
    }
}
