<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvaluationEleve extends Model{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['evaluation_id', 'eleve_id', 'note'];

    public function evaluation (): BelongsTo {
        return $this->belongsTo(Evaluation::class);
    }

    public function eleve (): BelongsTo {
        return $this->belongsTo(Eleve::class);
    }
}
