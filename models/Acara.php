<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acara".
 *
 * @property integer $idacara
 * @property string $acara
 */
class Acara extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acara';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acara'], 'required'],
            [['acara'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idacara' => 'Idacara',
            'acara' => 'Acara',
        ];
    }
}
