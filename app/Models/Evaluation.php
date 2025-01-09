<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Evaluation extends Model{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['date', 'titre', 'coefficient', 'module_id'];

    public function module (): BelongsTo {
        return $this->belongsTo(Module::class);
    }

    public function evaluationEleves (): HasMany {
        return $this->hasMany(EvaluationEleve::class);
    }
}
