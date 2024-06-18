<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Entity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = ['id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'datetime',
        'file_count' => 'integer',
        'collection_id' => 'integer',
        'language' => 'array',
        'image' => 'array',
    ];

    public function requests(): BelongsToMany
    {
        return $this->belongsToMany(Request::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'entity_tag', 'entity_id');
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }
}
