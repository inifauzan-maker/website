<?php

namespace App\Models;

use Database\Factories\ProgramKursusFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'slug', 'description', 'minimum_age', 'maximum_age'])]
class ProgramKursus extends Model
{
    /** @use HasFactory<ProgramKursusFactory> */
    use HasFactory;

    protected $table = 'course_programs';

    public function classes(): HasMany
    {
        return $this->hasMany(KelasKursus::class, 'course_program_id');
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'minimum_age' => 'integer',
            'maximum_age' => 'integer',
        ];
    }
}
