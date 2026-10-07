<?php

namespace App\Models;

use Database\Factories\PendaftaranFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['course_class_id', 'child_name', 'child_age', 'parent_name', 'parent_phone', 'parent_email'])]
#[Hidden(['child_name', 'child_age', 'parent_name', 'parent_phone', 'parent_email'])]
class Pendaftaran extends Model
{
    /** @use HasFactory<PendaftaranFactory> */
    use HasFactory;

    protected $table = 'registrations';

    public function courseClass(): BelongsTo
    {
        return $this->belongsTo(KelasKursus::class, 'course_class_id');
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'child_age' => 'integer',
        ];
    }
}
