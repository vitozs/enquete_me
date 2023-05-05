<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Enquete;
class Resposta extends Model
{
    use HasFactory;
    protected $table = 'respostas';
    protected $casts = [
        'respostas' => 'array'
    ];
    public $timestamps = false;

    /*public function enquete() : BelongsTo{
        return $this->belongsTo(Enquete::class);
    }*/
}
