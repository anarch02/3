<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'subject_id',
        'branch_id',
        'user_id',
        'startDate',
        'finishDate',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Course $cource)
        {
            $cource->slug = $cource->slug ?? str($cource->name)->slug();
        });
    }

    /**
     * Get the user that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the branch that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
