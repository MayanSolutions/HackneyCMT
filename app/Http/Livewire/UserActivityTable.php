<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;
use Livewire\WithPagination;

class UserActivityTable extends Component
{
    use WithPagination;


    public $user;

    public function render()
    {
        return view('livewire.user-activity-table', ['activityLog' => Activity::where('causer_id', $this->id)->paginate(5)]);
    }
}
