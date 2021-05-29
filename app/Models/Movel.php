<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Movel extends Model
{
    use HasFactory;

    protected $fillable = [
		'tipo',
        'descricao',
        'foto',
		'user_id'
    ];

    public function user (){
        
        return $this->belongsTo(User::class, 'user_id');

    }
}
