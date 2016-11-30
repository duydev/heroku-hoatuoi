<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaTuoi extends Model
{
   // Ten bang trong CSDL
	protected $table = 'hoa_tuoi';

	// Ten cot Id trong CSDL
	protected $primaryKey = 'Ma_hoa';

	// Khai bao quan he
	public function chude()
	{
		return $this->belongsTo('App\ChuDe', 'Ma_CD');
		//00000000000
	}
}
