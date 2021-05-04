<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class Review extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    protected static $logName = 'Digital Reviews';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected static $logAttributes = [
        'title',
        'purpose',
    ];

    public function path()
    {
        return url('/reviews/' .$this->id);
    }

    public function publicPath()
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

    public function AnnualReviewLinks()
    {
        return $this->hasMany(AnnualReviewLink::class);
    }
}
