<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "leads_log".
 *
 * @property int $id
 * @property int $disposition_id
 * @property int $user_id
 * @property int $leads_id
 * @property string|null $old_record
 */
class LeadsLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leads_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['disposition_id', 'user_id', 'leads_id'], 'required'],
            [['disposition_id', 'user_id', 'leads_id'], 'integer'],
            [['old_record'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'disposition_id' => 'Disposition ID',
            'user_id' => 'User ID',
            'leads_id' => 'Leads ID',
            'old_record' => 'Old Record',
        ];
    }
}
