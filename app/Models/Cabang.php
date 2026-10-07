<?php

namespace App\Models;

use Database\Factories\CabangFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'slug', 'address', 'phone'])]
class Cabang extends Model
{
    /** @use HasFactory<CabangFactory> */
    use HasFactory;

    protected $table = 'branches';

    public function classes(): HasMany
    {
        return $this->hasMany(KelasKursus::class, 'branch_id');
    }
}
