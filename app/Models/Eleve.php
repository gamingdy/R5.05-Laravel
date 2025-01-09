<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Eleve extends Model{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['nom', 'prenom', 'date_naissance', 'numero_etudiant', 'email', 'image',];

    public function getAverageGradeAttribute () {
        return $this->evaluations()->avg('note');
    }

    public function evaluations (): HasMany {
        return $this->hasMany(EvaluationEleve::class);
    }
}
