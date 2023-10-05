<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model {

    use HasFactory;

    protected $casts = [
        'platform' => 'array',
        'category' => 'array',
        'modoJogo' => 'array',
        'reqMinimos' => 'array',
        'reqRecomendados' => 'array',
    ];

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }

}
