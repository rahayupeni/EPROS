<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property integer $idchat
 * @property string $dari
 * @property string $kepada
 * @property string $pesan
 * @property string $tanggal
 * @property integer $status
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dari', 'kepada', 'pesan', 'tanggal', 'status'], 'required'],
            [['pesan'], 'string'],
            [['status'], 'integer'],
            [['dari', 'kepada', 'tanggal'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idchat' => 'Idchat',
            'dari' => 'Dari',
            'kepada' => 'Kepada',
            'pesan' => 'Pesan',
            'tanggal' => 'Tanggal',
            'status' => 'Status',
        ];
    }
}
