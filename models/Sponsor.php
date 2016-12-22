<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sponsor".
 *
 * @property integer $idsponsor
 * @property string $sponsor
 */
class Sponsor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sponsor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sponsor'], 'required'],
            [['sponsor'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsponsor' => 'Idsponsor',
            'sponsor' => 'Sponsor',
        ];
    }
}
