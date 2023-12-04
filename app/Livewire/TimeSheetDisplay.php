<?php

namespace App\Livewire;

use App\Models\EmpDetails;
use Illuminate\Support\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeSheetEntry;

class TimeSheetDisplay extends Component
{

    public $hours = [];
    public $tab = 'timeSheet';
    public $timeSheetEntries = [];
    public $regular = [];
    public $casual = []; // Initialize as an empty array
    public $sick = [];
    public $currentWeekStart;
    public $currentWeekEnd;
    public $futureDates = [];
    public $isValueEntered;
    public $empDetails;
    public function mount()
    {
        // Load existing entries from the database
        $emp_id = Auth::user()->emp_id;
        $existingEntries = TimeSheetEntry::where('emp_id', $emp_id)->get();

        // Populate the $hours variable with existing entries
        foreach ($existingEntries as $entry) {
            $this->hours[$entry->day]['regular'] = $entry->regular;
            $this->hours[$entry->day]['casual'] = $entry->casual;
            $this->hours[$entry->day]['sick'] = $entry->sick;
            $today = Carbon::now();
            $this->setWeekDates(now());
            $this->currentWeekStart = $today->startOfWeek()->format('d-m-Y');
            $this->currentWeekEnd = $today->endOfWeek()->format('d-m-Y');
            $this->futureDates = [];
            $emp_id = Auth::id();

            // Fetch the employee details for the logged-in user
            try {
                $this->empDetails = EmpDetails::where('emp_id', $emp_id)->get();
            } catch (\Exception $e) {
                // Log the error or handle it accordingly
                logger()->error('Error fetching employee details: ' . $e->getMessage());
                $this->empDetails = []; // Assign an empty array to prevent the error
            }
            // Get the current date
            $today = Carbon::now();

            // Generate future dates for the next 30 days, for example
            for ($i = 1; $i <= 30; $i++) {
                $futureDate = $today->copy()->addDays($i);
                $this->futureDates[] = $futureDate->format('Y-m-d');
            }


            // Add other fields as needed
        }

        $this->timeSheetEntries = $existingEntries; // Set the variable
    }
    public function setWeekDates($date)
    {
        $date = Carbon::parse($date)->startOfWeek();

        $this->currentWeekStart = $date->format('d-m-Y');
        $this->currentWeekEnd = $date->addDays(6)->format('d-m-Y');
    }
    public function previousWeek()
    {
        $this->setWeekDates(Carbon::parse($this->currentWeekStart)->subWeek());
    }

    public function nextWeek()
    {
        $this->setWeekDates(Carbon::parse($this->currentWeekStart)->addWeek());
    }
    protected function isValueEntered($day, $type)
    {
        return isset($this->hours[$day][$type]) && $this->hours[$day][$type] !== null;
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

            $data = [
                'emp_id' => $emp_id,
                'day' => $day,
                'regular' => $hours['regular'] ?? 0,
                'casual' => $hours['casual'] ?? 0,
                'sick' => $hours['sick'] ?? 0,
                // Add other fields as needed
            ];

            // Ensure to updateOrCreate based on emp_id and day columns
            TimeSheetEntry::updateOrCreate(
                [
                    'emp_id' => $emp_id,
                    'day' => $day,
                ],
                $data
            );
        }

        // Rest of your logic...

        // After storing, retrieve the updated time sheet entries
        $this->timeSheetEntries = TimeSheetEntry::where('emp_id', $emp_id)->get();

        session()->flash('success', 'Working hours updated successfully');
    }
}
