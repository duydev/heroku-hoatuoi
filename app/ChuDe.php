<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    // Ten bang trong CSDL
	protected $table = 'chu_de';

	// Ten cot Id trong CSDL
	protected $primaryKey = 'Ma_CD';

	// Khai bao quan he
	public function hoatuoi()
	{
		return $this->hasMany('App\HoaTuoi', 'Ma_CD');
		
	}

}
