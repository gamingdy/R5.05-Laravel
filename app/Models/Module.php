<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['code', 'nom', 'coefficient'];

    public static function getIdByCode (string $code): ?int {
        return self::where('code', $code)->value('id');
    }

    public function evaluation (): HasMany {
        return $this->hasMany(Evaluation::class);
    }
}
