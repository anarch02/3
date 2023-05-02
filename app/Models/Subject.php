<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Subject $subject)
        {
            $subject->slug = $subject->slug ?? str($subject->name)->slug();
        });
    }

    /**
     * Get all of the cources for the Subject
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cources(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
