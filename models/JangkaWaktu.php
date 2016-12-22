<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jangka_waktu".
 *
 * @property integer $idjangka
 * @property string $jangka
 */
class JangkaWaktu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jangka_waktu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jangka'], 'required'],
            [['jangka'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idjangka' => 'Idjangka',
            'jangka' => 'Jangka',
        ];
    }
}
