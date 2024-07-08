<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Banner extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'entity_id' => 'integer',
        'image' => 'array',
    ];

    public function entity(): HasOne
    {
        return $this->hasOne(Entity::class);
    }
}
