<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $fillable=['url'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'acta_id' => 'integer',
        'user_id' => 'integer',
    ];


    public function acta()
    {
        return $this->belongsTo(\App\Acta::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function getUrlPathAttribute(){
        return url($this->url);
    }
}
