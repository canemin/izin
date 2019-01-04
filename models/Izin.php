<?php

namespace kouosl\izin\models;

use Yii;

/**
 * This is the model class for table "izin".
 *
 * @property int $id
 * @property string $starting_date
 * @property string $end_date
 * @property int $phone_number
 * @property string $address
 * @property string $status
 * @property string $mail_address
 */
class Izin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'izin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['starting_date', 'end_date', 'phone_number', 'address', 'status', 'mail_address'], 'required'],
            [['starting_date', 'end_date'], 'safe'],
            [['phone_number'], 'integer'],
            [['mail_address'], 'string'],
            [['address'], 'string', 'max' => 500],
            [['status'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'starting_date' => 'Starting Date',
            'end_date' => 'End Date',
            'phone_number' => 'Phone Number',
            'address' => 'Address',
            'status' => 'Status',
            'mail_address' => 'Mail Address',
        ];
    }
}
