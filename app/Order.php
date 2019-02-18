<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'order';
	protected $primaryKey ='id_order';

	public function user()
    {
        return $this->belongsTo('App\User','id_users');
    }
}
