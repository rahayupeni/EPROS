<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teman".
 *
 * @property integer $idteman
 * @property string $ini
 * @property string $denganini
 * @property integer $status
 */
class Teman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ini', 'denganini', 'status'], 'required'],
            [['status'], 'integer'],
            [['ini', 'denganini'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idteman' => 'Idteman',
            'ini' => 'Ini',
            'denganini' => 'Denganini',
            'status' => 'Status',
        ];
    }
}
