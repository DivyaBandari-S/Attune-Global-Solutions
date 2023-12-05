<?php

namespace App\Livewire;

use App\Models\EmpDetails;
use Illuminate\Support\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeSheet;

class TimeSheetDisplay extends Component
{
    public $hours = [];
    public $tab = 'timeSheet';
    public $timeSheetEntries = []; // Initialize as an empty array

    public function mount()
    {
        // Load existing entries from the database
        $emp_id = Auth::user()->emp_id;
        $existingEntries = TimeSheet::where('emp_id', $emp_id)->get();

        // Populate the $hours variable with existing entries
        foreach ($existingEntries as $entry) {
            $this->hours[$entry->day]['regular'] = $entry->hours;
            // Add other fields as needed
        }
    
        $this->timeSheetEntries = $existingEntries; // Set the variable
    }

    public function render()
    {
        return view('livewire.time-sheet-display');
    }
   
    public function store()
    {
        $emp_id = Auth::user()->emp_id;
        

        foreach ($this->hours as $day => $hours) {
            $day = strtolower($day);
            

            TimeSheet::updateOrCreate(
                [
                    'emp_id' => $emp_id,
                    'day' => $day,
                ],
                [
                    'hours' => $hours['regular'],
                    
                    // Add other fields as needed
                ]
            );
        }

        // After storing, retrieve the updated time sheet entries
        $this->timeSheetEntries = TimeSheet::where('emp_id', $emp_id)->get();

        session()->flash('success', 'Working hours updated successfully');
    }
}