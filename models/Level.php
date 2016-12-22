<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property integer $idlevel
 * @property string $level
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level'], 'required'],
            [['level'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idlevel' => 'Idlevel',
            'level' => 'Level',
        ];
    }
}
