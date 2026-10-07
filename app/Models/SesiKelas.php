<?php

namespace App\Models;

use Database\Factories\SesiKelasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['course_class_id', 'sequence', 'meeting_mode', 'starts_at', 'ends_at', 'location', 'meeting_url'])]
#[Hidden(['meeting_url'])]
class SesiKelas extends Model
{
    /** @use HasFactory<SesiKelasFactory> */
    use HasFactory;

    protected $table = 'class_sessions';

    public function courseClass(): BelongsTo
    {
        return $this->belongsTo(KelasKursus::class, 'course_class_id');
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'sequence' => 'integer',
            'starts_at' => 'immutable_datetime',
            'ends_at' => 'immutable_datetime',
        ];
    }
}
