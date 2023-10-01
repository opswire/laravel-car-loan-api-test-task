<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dealer extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
