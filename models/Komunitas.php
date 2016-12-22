<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "komunitas".
 *
 * @property integer $idkomunitas
 * @property integer $iduser
 * @property string $nama
 * @property integer $phone
 * @property string $alamat
 * @property string $tanggal
 * @property string $cabang
 * @property string $urlgambar
 * @property string $latitude
 * @property string $longitude
 * @property string $urlbukti
 */
class Komunitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komunitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'nama', 'phone', 'alamat', 'tanggal', 'cabang','latitude', 'longitude'], 'required'],
            [['iduser', 'phone'], 'integer'],
            [['alamat'], 'string'],
            [['nama', 'cabang', 'latitude', 'longitude'], 'string', 'max' => 50],
            [['tanggal'], 'string', 'max' => 11],
            [['urlbukti'],'safe'],
            [['urlgambar'], 'file', 'extensions' => 'jpg, png'],
            [['urlbukti'], 'file', 'skipOnEmpty' => true, 'extensions' => 'gif, jpg, png, pdf, doc, docx', 'maxFiles' => 10, 'on' => 'uploadberkas'],
            [['iduser'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idkomunitas' => 'Idkomunitas',
            'iduser' => 'Iduser',
            'nama' => 'Nama',
            'phone' => 'Phone',
            'alamat' => 'Alamat',
            'tanggal' => 'Tanggal',
            'cabang' => 'Cabang',
            'urlgambar' => 'Urlgambar',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'urlbukti' => 'Urlbukti',
        ];
    }
}
