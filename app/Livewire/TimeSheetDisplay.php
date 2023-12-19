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

class TimeSheetDisplay extends Component
{
    public $hours = [];
    public $selectedEmployeeId;
    public $selectedEmployee;
    public $startDate;
    public $endDate;
    public $contractorTimeSheetData;
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
    public $weekData = [];
    public $filteredPeoples;


    public $peopleFound;
    public $searchTerm;

    public function mount()
    {
        // Load existing entries from the database
        $user = Auth::user();
        $emp_id = $user->emp_id;
        $this->emp_id = $emp_id;
        $existingEntries = TimeSheetEntry::where('emp_id', $emp_id)->get();
        $this->entryId = $existingEntries->isNotEmpty() ? $existingEntries->first()->id : null;

        $this->setWeekDates(now());
        $this->selectedEmployeeIdForTS = TimeSheetEntry::first();

        $currentWeekStart = now()->startOfWeek();
        $currentWeekEnd = now()->endOfWeek();

        for ($date = $currentWeekStart; $date->lte($currentWeekEnd); $date->addDay()) {
            $this->currentWeekDates[] = $date->format('Y-m-d');
        }
        $startDate = Carbon::now()->startOfWeek()->toDateString();
        $endDate = Carbon::now()->endOfWeek()->toDateString();
        $this->contractorTimeSheetData = TimeSheetEntry::where('time_sheet_entries.status', 'submit')
            ->join('emp_details', 'time_sheet_entries.emp_id', '=', 'emp_details.emp_id')
            ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                $startDate,
                $endDate,
            ])->get();
        $this->contractorTimeSheetData = TimeSheetEntry::where('time_sheet_entries.status', '')
            ->join('emp_details', 'time_sheet_entries.emp_id', '=', 'emp_details.emp_id')
            ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                $startDate,
                $endDate,
            ])->get();

        $this->timeSheetEntries = $existingEntries;
        $this->empDetails = EmpDetails::where('emp_id', $emp_id)->first();
        $this->getContractorTimeSheetData();
        // Fetch the employee details for the logged-in user
        try {
            $this->empDetails = EmpDetails::where('emp_id', $emp_id)->get();
        } catch (\Exception $e) {
            logger()->error('Error fetching employee details: ' . $e->getMessage());
            $this->empDetails = [];
        }
    }
    public function selectedEmployee($empId)
    {
        $this->selectedEmployee = EmpDetails::where('emp_id', $empId)->first();
        // dd($this->selectedEmployeeId);
    }

    public function filter()
    {
        $trimmedSearchTerm = trim($this->searchTerm);

        $this->filteredPeoples = EmpDetails::where(function ($query) use ($trimmedSearchTerm) {
            $query->where('emp_id', 'LIKE', '%' . $trimmedSearchTerm . '%');
        })->get();

        $this->timeSheetE = $this->filteredPeoples ?: $this->selectedEmployeeIdForTS;
    }

    public function getContractorTimeSheetData()
    {
        $startDate = Carbon::now()->startOfWeek()->toDateString();
        $endDate = Carbon::now()->endOfWeek()->toDateString();
        $this->contractorTimeSheetData = TimeSheetEntry::where('status', 'submit')
            ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                $startDate,
                $endDate,
            ])->get();
    }

    public $selectedEmployeeIdForTS;

    public function selectEmployee($employeeId)
    {
        $this->selectedEmployeeIdForTS = TimeSheetEntry::where('emp_id', $employeeId)->first();
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

    public function approveStatus(Request $request, $id)

    {
        $startDate = Carbon::now()->startOfWeek()->toDateString(); // Monday
        $endDate = Carbon::now()->endOfWeek()->toDateString();

        $contractorTimeSheetData = TimeSheetEntry::where('status', 'submit')
            ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                $startDate,
                $endDate,
            ])->get();

        try {
            foreach ($contractorTimeSheetData as $entry) {
                $entry->status = 'approve';
                // Update the status value to 'approve'
                $entry->save(); // Save the updated status
            }

            session()->flash('success', 'Status updated successfully from submit to approved');
        } catch (\Exception $e) {
            // Display the error message for debugging
        }
    }

    public function rejectStatus(Request $request, $id)
    {

        $timeSheetEntry = TimeSheetEntry::where('emp_id', $id)
            ->where('status', 'submit')
            ->first();

        // Retrieve the emp_id of the authenticated user
        $empId = auth()->user()->emp_id;
        $entries = TimeSheetEntry::where('emp_id', $empId)->get();

        $loggedInUserCompanyId = auth()->user()->company_id;
        // Dump the fetched data

        // Fetch contractor time sheet data for the retrieved emp_id
        $startDate = Carbon::now()->startOfWeek()->toDateString(); // Monday
        $endDate = Carbon::now()->endOfWeek()->toDateString();
        // Define $startDate and $endDate variables
        // Fetch contractor time sheet data for the specified date range
        $contractorTimeSheetData = TimeSheetEntry::where('status', 'submit')
            ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                $startDate,
                $endDate,
            ])->get();

        // Loop through the contractor time sheet data to update the status from "submit" to "approved"
        try {
            foreach ($contractorTimeSheetData as $entry) {
                $entry->status = 'reject';
                // Update the status value to 'approve'
                $entry->save(); // Save the updated status
            }
            session()->flash('success', 'Status updated successfully from submit to rejected');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Display the error message for debugging
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


    public $entries, $timeSheetE;
    public function render()
    {
        $user = Auth::user();
        $emp_id = $user->emp_id;

        $this->entries = TimeSheetEntry::where('emp_id', $emp_id)->first();
        $startDate = Carbon::now()->startOfWeek()->toDateString(); // Monday
        $endDate = Carbon::now()->endOfWeek()->toDateString();
        $this->timeSheetE = TimeSheetEntry::join('emp_details', 'time_sheet_entries.emp_id', '=', 'emp_details.emp_id')
            ->whereIn('time_sheet_entries.status', ['submit', 'accept'])
            ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                $startDate,
                $endDate,
            ])
            ->select('time_sheet_entries.emp_id', 'emp_details.first_name', 'emp_details.last_name')
            ->get();


        // Check if the entries exist and extract day data to populate weekData
        if ($this->entries) {
            $this->weekData = $this->entries->day;
        }
        // Retrieve data for the logged-in user from TimeSheetEntry
        $storedData = TimeSheetEntry::where('emp_id', $emp_id)
            ->where('status', 'pending') // Assuming you want only pending entries
            ->first();

        $startDate = Carbon::now()->startOfWeek()->toDateString(); // Monday
        $endDate = Carbon::now()->endOfWeek()->toDateString();
        // Define $startDate and $endDate variables

        $contractorTimeSheetData = TimeSheetEntry::where('time_sheet_entries.status', 'submit')
            ->join('emp_details', 'time_sheet_entries.emp_id', '=', 'emp_details.emp_id')
            ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                $startDate,
                $endDate,
            ])->get();


        // $sqlQuery = $contractorTimeSheetData->toSql();
        // $bindings = $contractorTimeSheetData->getBindings();

        // dd($sqlQuery, $bindings);


        return view('livewire.time-sheet-display', [
            'entryId' => $this->entryId, 'contractorTimeSheetData' => $contractorTimeSheetData,
        ]);
    }




    public function createTimeSheet()
    {


        $user = Auth::user();
        $empId = $user->emp_id;

        $empId = auth()->guard('employee')->id();
        $empDetails = EmpDetails::find($empId);
        $company_id = $empDetails->company_id;
        // Fetch HR detail for the company
        $hrDetail = HrDetail::where('company_id', $company_id)->first();
        // dd($hrDetail);
        $hr_id = $hrDetail->hr_id;

        $this->validate([
            'weekData' => 'required|array',
        ]);

        $formattedWeekData = [];
        $existingEntries = TimeSheetEntry::where('emp_id', $empId)
            ->whereIn('day', array_column($formattedWeekData, 'date'))
            ->get();



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
        $dd = TimeSheetEntry::updateOrCreate(
            [
                'emp_id' => $empId,
            ],
            [
                'hr_id' => $hrDetail->hr_id,
                'company_id' => $company_id,
                'day' => $formattedWeekData,
                'status' => 'pending',
            ],
            $formattedWeekData[$day]
        );

        // Fetch updated time sheet entries after modification
        // Assuming $this->weekData is a multidimensional array
        $flattenedDays = collect($this->weekData)->flatMap(function ($days) {
            return array_values($days);
        })->flatten()->unique()->toArray();

        $this->timeSheetEntries = TimeSheetEntry::where('emp_id', $empId)
            ->whereIn('day', $flattenedDays)
            ->get();
        $this->timeSheetE = $this->filteredPeoples ?: $this->timeSheetEntries;
        session()->flash('success', 'Working hours updated successfully');
    }
}
