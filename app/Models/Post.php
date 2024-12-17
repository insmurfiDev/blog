<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    protected $guarded = ['id'];

    public function img(): Attribute
    {
        return Attribute::make(set: function ($value) {
            $fileName = time() . "_" . $value->getClientOriginalName();
            $value->storeAS('uploads', $fileName, 'public');

            return $fileName;
        }, get: function ($value) {
            return asset('storage/uploads/' . $value);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
