<?php

namespace App;

use App\Message;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function messagges()
    {
    	return $this->motphedByMany(Massage::class, 'taggable');
    }
    public function users()
    {
    	return $this->motphedByMany(User::class, 'taggable');
    }

}
