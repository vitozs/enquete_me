<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use App\Models\User;
use App\Models\Resposta;

class Enquete extends Model
{
    use HasFactory;
    protected $table = 'enquetes';
    protected $casts = [
        'opcoes' => 'array'
    ];
    public $timestamps = false;

    public function user() : BelongsToMany{
        return $this->belongsToMany(User::class);
    }

    public function resposta() : BelongsToMany{
        return $this->belongsToMany(Resposta::class);
    }
}
