<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timbal_balik".
 *
 * @property integer $idtimbal
 * @property string $timbal
 */
class TimbalBalik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timbal_balik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timbal'], 'required'],
            [['timbal'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtimbal' => 'Idtimbal',
            'timbal' => 'Timbal',
        ];
    }
}
