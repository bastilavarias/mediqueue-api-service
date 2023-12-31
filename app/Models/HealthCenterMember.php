<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HealthCenterMember extends Model
{
    use HasFactory;

    protected $table = 'health_center_members';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function center(): BelongsTo
    {
        return $this->belongsTo(HealthCenter::class, 'health_center_id', 'id');
    }
}
