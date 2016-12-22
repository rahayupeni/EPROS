<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perusahaan".
 *
 * @property integer $idperusahaan
 * @property string $nama
 * @property integer $phone
 * @property string $alamat
 * @property string $tanggal
 * @property string $cabang
 * @property string $gambar
 * @property string $latitude
 * @property string $longitude
 * @property string $iduser
 * @property string $acara
 * @property string $menerima
 * @property string $jangka_waktu
 * @property string $sponsor
 * @property string $timbal_balik
 * @property string $bukti
 * @property string $urlgambar
 * @property string $urlbukti
 */
class Perusahaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perusahaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'phone', 'alamat', 'tanggal', 'cabang', 'gambar', 'latitude', 'longitude', 'iduser', 'acara', 'menerima', 'jangka_waktu', 'sponsor', 'timbal_balik', 'bukti', 'urlgambar', 'urlbukti'], 'required'],
            [['phone'], 'integer'],
            [['alamat', 'gambar', 'bukti', 'urlgambar', 'urlbukti'], 'string'],
            [['nama', 'cabang', 'latitude', 'longitude', 'iduser', 'jangka_waktu'], 'string', 'max' => 50],
            [['tanggal'], 'string', 'max' => 11],
            [['iduser'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idperusahaan' => 'Idperusahaan',
            'nama' => 'Nama',
            'phone' => 'Phone',
            'alamat' => 'Alamat',
            'tanggal' => 'Tanggal',
            'cabang' => 'Cabang',
            'gambar' => 'Gambar',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'iduser' => 'Iduser',
            'acara' => 'Acara',
            'menerima' => 'Menerima',
            'jangka_waktu' => 'Jangka Waktu',
            'sponsor' => 'Sponsor',
            'timbal_balik' => 'Timbal Balik',
            'bukti' => 'Bukti',
            'urlgambar' => 'Urlgambar',
            'urlbukti' => 'Urlbukti',
        ];
    }
}
