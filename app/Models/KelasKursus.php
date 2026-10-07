<?php

namespace App\Models;

use Database\Factories\KelasKursusFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['branch_id', 'course_program_id', 'name', 'learning_mode', 'teacher_name', 'capacity', 'price_rupiah', 'is_published'])]
class KelasKursus extends Model
{
    /** @use HasFactory<KelasKursusFactory> */
    use HasFactory;

    protected $table = 'course_classes';

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Cabang::class, 'branch_id');
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(ProgramKursus::class, 'course_program_id');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(SesiKelas::class, 'course_class_id')->orderBy('sequence');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'course_class_id');
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'capacity' => 'integer',
            'price_rupiah' => 'integer',
            'is_published' => 'boolean',
        ];
    }
}
