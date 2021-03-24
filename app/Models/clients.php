<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MatrixFunction;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class clients extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'client_organisation',
        'client_address',
        'client_pfn_email',
        'client_pfn',
        'client_manager',
        'client_manager_contact',
        'client_manager_email',
        'client_deputy',
        'client_chair',
        'client_chair_contact',
        'client_chair_email',
        'client_secretary',
        'user_id'
    ];

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    protected static $logName = 'Clients';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected static $logAttributes = [
        'client_organisation',
        'client_address',
        'client_pfn_email',
        'client_pfn',
        'client_manager',
        'client_manager_contact',
        'client_manager_email',
        'client_deputy',
        'client_chair',
        'client_chair_contact',
        'client_chair_email'.
        'client_secretary',
        'user_id',
    ];

    public function functions()
{
    return $this->belongsToMany(MatrixFunction::class, 'clients_matrix_function', 'client_id', 'function_id');
}

public function EstateDetails()
{
    return $this->belongsTo(EstateDetail::class, 'id', 'client_id');
}

public function surveys()
{
    return $this->hasMany(survey::class, 'client_id', 'id');
}

public function members()
{
    return $this->hasMany(members::class, 'client_id', 'id');
}

}
