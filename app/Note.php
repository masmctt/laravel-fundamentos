<?php

namespace App;

use App\Message;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = ['body'];
	
    public function message()
    {
    	return $this->belongsTo(Message::class);

    }
}
