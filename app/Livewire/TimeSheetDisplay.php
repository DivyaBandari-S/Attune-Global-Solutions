<?php

namespace App\Livewire;

use App\Models\EmpDetails;
use App\Models\TimeSheetEntry;
use Illuminate\Support\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeSheet;
use App\Models\HrDetail;

class TimeSheetDisplay extends Component
{
    public $hours = [];
    public $tab = 'timeSheet';
    public $timeSheetEntries = [];
    public $regular = [];
    public $casual = []; // Initialize as an empty array
    public $sick = [];

    public $hr_id;
    public $holiday = [];
    public $vacation = [];
    public $currentWeekStart;
    public $currentWeekEnd;
    public $currentWeekDates = [];
    public $futureDates = [];
    public $isValueEntered;
    public $empDetails;
    public $emp_id;
    public $getTotalHours;
    public $empId;
    public $entryId;
    public $hrId;
    public $companyId;
    public $weekData=[];
    public function mount()
    {
        // Load existing entries from the database
        $emp_id = Auth::user()->emp_id;
        $this->emp_id = $emp_id;
     $existingEntries = TimeSheetEntry::where('emp_id', $emp_id)->get();
     $this->entryId = $existingEntries->isNotEmpty() ? $existingEntries->first()->id : null;

     $this->setWeekDates(Carbon::now());

     $currentWeekStart = now()->startOfWeek();
     $currentWeekEnd = now()->endOfWeek();

     for ($date = $currentWeekStart; $date->lte($currentWeekEnd); $date->addDay()) {
         $this->currentWeekDates[] = $date->format('Y-m-d');
     }

     $this->timeSheetEntries = $existingEntries;

     // Fetch the employee details for the logged-in user
     try {
         $this->empDetails = EmpDetails::where('emp_id', $emp_id)->get();
     } catch (\Exception $e) {
         logger()->error('Error fetching employee details: ' . $e->getMessage());
         $this->empDetails = [];
     }
    }
    public function getWeeklyTimeSheetEntries()
    {
        $emp_id = Auth::user()->emp_id;
        $startDate = now()->startOfWeek();
        $endDate = now()->endOfWeek();

        // Fetch records for the current week
        $timeSheetEntries = TimeSheetEntry::where('emp_id', $emp_id)
            ->whereBetween('day', [$startDate, $endDate])
            ->get();

        return $timeSheetEntries;
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
    public function getTotalHours()
    {
        $totalHours = array_sum(array_column($this->hours, 'regular')) +
                      array_sum(array_column($this->hours, 'casual')) +
                      array_sum(array_column($this->hours, 'sick')) +
                      array_sum(array_column($this->hours, 'holiday')) +
                      array_sum(array_column($this->hours, 'vacation'));

        return $totalHours;
    }

    public function nextWeek()
    {
        $this->setWeekDates(Carbon::parse($this->currentWeekStart)->addWeek());
    }

public function updateEntryStatus()
{
    // Retrieve the authenticated user's emp_id
    $empId = Auth::user()->emp_id;


    // Retrieve the entries associated with the user
    $entries = TimeSheetEntry::where('emp_id', $empId)->get();


    // Loop through each entry to update the status
    foreach ($entries as $entry) {
        // Update the status from "pending" to "submit"
        $entry->status = 'submit';
        $entry->save();
    }
    $employeeDetails = EmpDetails::where('emp_id', $entry->emp_id)->first();

    session()->flash('success', 'Status updated successfully for all entries');
}

// public function ApproveStatus($id)
// {
//     dd('sdfgh');
//     $this->emp_id = $emp_id;

//     // Your approval logic here
//     $loggedInUserCompanyId = auth()->user()->company_id;

//     $contractorTimeSheetData = TimeSheetEntryHr::where('status', 'submit')
//         ->where('emp_id', $this->emp_id)
//         ->get();
// }



    public function render()
    {
        return view('livewire.time-sheet-display');
    }

    public function store()
    {

        $user = Auth::user();
        $emp_id = $user->emp_id;

        $empId = auth()->guard('employee')->id();
        $timeSheetEntries = TimeSheetEntry::where('emp_id', $emp_id)
            ->whereIn('day', $this->currentWeekDates)
            ->get();

        // Logic to update or create records for the current week's dates
        foreach ($this->hours as $day => $hours) {
            $date = Carbon::parse($day);
            if (in_array($date->format('Y-m-d'), $this->currentWeekDates)) {
                $data = [
                    'emp_id' => $emp_id,
                    'day' => $date->format('Y-m-d'),
                    'regular' => $hours['regular'] ?? 0,
                    'casual' => $hours['casual'] ?? 0,
                    'sick' => $hours['sick'] ?? 0,
                    'holiday' => $hours['holiday'] ?? 0,
                    'vacation' => $hours['vacation'] ?? 0,
                    // Add other fields as needed
                ];

                // Ensure to updateOrCreate based on emp_id and day columns
                TimeSheetEntry::updateOrCreate(
                    [
                        'emp_id' => $emp_id,
                        'day' => $data['day'],
                    ],
                    $data
                );
            }
        }
        $this->timeSheetEntries = TimeSheetEntry::where('emp_id', $emp_id)
            ->whereIn('day', $this->currentWeekDates)
            ->get();

        // After storing, retrieve the updated time sheet entries
        $this->timeSheetEntries = TimeSheetEntry::where('emp_id', $emp_id)->get();

        session()->flash('success', 'Working hours updated successfully');
    }



    public function createTimeSheet()
    {

        $user = Auth::user();
        $emp_id = $user->emp_id;

        $empId = auth()->guard('employee')->id();
        $empDetails = EmpDetails::find($empId);
        $company_id = $empDetails->company_id;
            // Fetch HR detail for the company
     $hrDetail = HrDetail::where('company_id', $company_id)->first();
     $hr_id=$hrDetail->hr_id;
      $this->validate([
            'weekData' => 'required|array',
        ]);

        $formattedWeekData = [];

        foreach ($this->weekData as $day => $leaveTypes) {
           // $currentDate = now()->startOfWeek()->next($day)->toDateString();
        //    $currentDate = now()->next(Carbon::MONDAY)->startOfDay()->addDays(['mon' => 0, 'tue' => 1, 'wed' => 2, 'thu' => 3, 'fri' => 4, 'sat' => 5, 'sun' => 6][$day])->toDateString();
        $currentDate = now()->startOfWeek()->addDays(['mon' => 0, 'tue' => 1, 'wed' => 2, 'thu' => 3, 'fri' => 4, 'sat' => 5, 'sun' => 6][$day])->toDateString();
            $formattedWeekData[$day] = [
                'date' => $currentDate,
                'regular' => $leaveTypes['regular'] ?? 0,
                'sick' => $leaveTypes['sick'] ?? 0,
                'holiday' => $leaveTypes['holiday'] ?? 0,
                'vacation' => $leaveTypes['vacation'] ?? 0,
                'casual' => $leaveTypes['casual'] ?? 0,
            ];
        }

        // Create or update the time sheet entry
        TimeSheetEntry::updateOrCreate(
            [
                'emp_id' => $empId,
            ],
            [
                'hr_id' => $hrDetail->hr_id,
                'company_id' => $company_id,
                'day' => $formattedWeekData,
                'status' => 'pending',
            ]
        );

        // Clear form fields after submission


        // Emit an event to refresh the Livewire component


        session()->put('created_entry', $formattedWeekData);
        session()->flash('success', 'Entry created successfully');
    }
}
