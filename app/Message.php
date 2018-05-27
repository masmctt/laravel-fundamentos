<?php

namespace App;

use App\Tag;
use App\Note;
use App\User;
use App\Presenters\MessagePresenter;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    // por default el nombre de la tabla es el plural de la clase y en minusculas 'messages'
    // pero si no coincide la tabla, debemos definirla.

    //protected $table = 'nombre_de_mi_tabla';

    //Asignacion masiva, con esto solo se actualizaran masivamente estos campos (Insert o Update)
    protected $fillable = ['nombre','email','mensaje'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function note()
    {
    	return $this->morphOne(Note::class, 'notable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function present()
    {
        return new MessagePresenter($this);
    }
}
