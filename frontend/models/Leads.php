<?php

namespace frontend\models;

use Yii;
use frontend\models\LeadsLog;
/**
 * This is the model class for table "leads".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $disposition_id
 * @property string|null $name
 * @property int|null $phone
 * @property string|null $email
 * @property string|null $problem
 * @property string|null $next_calling_after
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property int|null $pincode
 *
 * @property User $user
 * @property Disposition $disposition
 */
class Leads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'disposition_id', 'pincode'], 'integer'],
            [['name', 'email', 'problem', 'address', 'phone', 'city', 'state'], 'string'],
            [['next_calling_after'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['disposition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Disposition::className(), 'targetAttribute' => ['disposition_id' => 'id']],
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
            $logData = new LeadsLog();
            $logData->disposition_id = $this->disposition_id;
            $logData->user_id = $this->user_id;
            $logData->leads_id = $this->id;
            $logData->old_record = json_encode([
                'address' => $this->address,
                'phone' => $this->phone,
                'city' => $this->city,
                'state' => $this->state,
                'pincode' => $this->pincode,
                'problem' => $this->problem,
                'next_calling_after' => $this->next_calling_after,
                ]);
            $logData->save();
            return true;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'disposition_id' => 'Disposition ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'problem' => 'Problem',
            'next_calling_after' => 'Next Calling After',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'pincode' => 'Pincode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisposition()
    {
        return $this->hasOne(Disposition::className(), ['id' => 'disposition_id']);
    }
}
