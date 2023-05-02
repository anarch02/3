<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'address'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Branch $branch)
        {
            $branch->slug = $branch->slug ?? str($branch->name)->slug();
        });
    }

    /**
     * The cources that belong to the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cources(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }
}
