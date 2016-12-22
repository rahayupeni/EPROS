<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "note".
 *
 * @property integer $id
 * @property string $note
 * @property string $iduser
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['note', 'iduser'], 'required'],
            [['note'], 'string'],
            [['iduser'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'note' => 'Note',
            'iduser' => 'Iduser',
        ];
    }
}
