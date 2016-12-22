<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menerima".
 *
 * @property integer $idmenerima
 * @property string $menerima
 */
class Menerima extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menerima';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menerima'], 'required'],
            [['menerima'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmenerima' => 'Idmenerima',
            'menerima' => 'Menerima',
        ];
    }
}
