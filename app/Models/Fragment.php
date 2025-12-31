<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enum\FragmentStatus as Status;

class Fragment extends Model
{
    /** @use HasFactory<\Database\Factories\FragmentFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'body',
        'status',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => Status::class,
        ];
    }
}
