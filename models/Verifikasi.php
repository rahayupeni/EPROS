<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Verifikasi extends Model
{
	public $kodeverifikasi;
	  
	public function rules()
	{
	    return [
	      [['kodeverifikasi'], 'required'],
	    ];
	}

  	public function attributeLabels()
    {
        return [
            'kodeverifikasi' => 'Kode Auth',
        ];
    }
}
