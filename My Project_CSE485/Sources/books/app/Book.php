<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function getThumbnailAttribute()
    {
        if (!$this->cover_photo) {
            return asset('images/default.jpg');
        }

        return route('book.thumbnail', ['id' => $this->id]);
    }

    public function hasThumbnail()
    {
        return $this->cover_photo !== null;
    }

    public function hasDownloadUrl()
    {
        return $this->download_url !== null;
    }
}
