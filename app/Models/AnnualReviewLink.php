<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AnnualReviewLink extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'user_id',
        'reviews_id',
        'clients_id',
        'date_generated',
        'link',
        'access_key',
    ];

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    protected static $logName = 'Review Link';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected static $logAttributes = [
        'user_id',
        'reviews_id',
        'clients_id',
        'survey_id',
        'date_generated',
        'link',
        'access_key',
    ];

    public function reviews()
    {
        return $this->belongsTo(Review::class, 'id', 'reviews_id');
    }

    public function clients()
    {
        return $this->belongsTo(clients::class, 'id', 'clients_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function surveys()
    {
        return $this->belongsTo(Survey::class, 'id', 'survey_id');
    }
}
