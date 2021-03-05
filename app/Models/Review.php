<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path()
    {
        return url('/reviews/' .$this->id);
    }

    public function publicpath()
    {
        return url('/surveys/'.$this->id.'-'. Str::slug($this->title));
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }
}
