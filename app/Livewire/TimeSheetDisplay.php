<?php

namespace App\Livewire;

use App\Models\EmpDetails;
use App\Models\HrDetail;
use App\Models\Invoice;
use App\Models\SalesOrder;
use App\Models\TimeSheetEntry;
use Illuminate\Support\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeSheet;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;

class TimeSheetDisplay extends Component
{
    public $entries, $timeSheetE, $searchTermm, $searchForStatus, $filteredStatus;
    public $hours = [];
    public $allEmployees;


    public $results;


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
    public $selectedStatus = '';
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
    public $statuses;
    public $first_name;
    public $empById;
    public $weeks = [];
    public function mount()
    {
        // Load existing entries from the database
        $user = Auth::user();
        $emp_id = $user->emp_id;
        $this->emp_id = $emp_id;
        $existingEntries = TimeSheetEntry::where('emp_id', $emp_id)->get();
        $this->entryId = $existingEntries->isNotEmpty() ? $existingEntries->first()->id : null;
        $this->statuses = TimeSheetEntry::distinct()->pluck('status')->toArray();
        $this->setWeekDates(now());
        $this->selectedEmployeeIdForTS = TimeSheetEntry::first();
        $currentWeekStart = now()->startOfWeek();
        $currentWeekEnd = now()->endOfWeek();

        for ($date = $currentWeekStart; $date->lte($currentWeekEnd); $date->addDay()) {
            $this->currentWeekDates[] = $date->format('Y-m-d');
        }
        $startDate = Carbon::now()->startOfWeek()->toDateString();
        $endDate = Carbon::now()->endOfWeek()->toDateString();
        $this->contractorTimeSheetData = TimeSheetEntry::join('emp_details', 'time_sheet_entries.emp_id', '=', 'emp_details.emp_id')
            ->join('sales_orders', 'sales_orders.emp_id', '=', 'time_sheet_entries.emp_id')
            ->join('customer_details', 'customer_details.customer_id', '=', 'sales_orders.customer_id')
            ->select(
                'time_sheet_entries.*', // Select all columns from time_sheet_entries table
                'emp_details.company_id as emp_company_id', // Selecting company_id from emp_details
                'customer_details.customer_company_name' // Selecting customer_company_name from customer_details
            )
            ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                $startDate,
                $endDate,
            ])
            ->get();
        $this->contractorTimeSheetData = TimeSheetEntry::all();


        //   dd( $this->contractorTimeSheetData );

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




    public function getContractorTimeSheetData()
    {
        $startDate = Carbon::now()->startOfWeek()->toDateString();
        $endDate = Carbon::now()->endOfWeek()->toDateString();
        $contractorTimeSheetData = TimeSheetEntry::where('time_sheet_entries.status', ['submit', 'approve'])
            ->join('emp_details', 'time_sheet_entries.emp_id', '=', 'emp_details.emp_id')
            ->join('sales_orders', 'sales_orders.emp_id', '=', 'time_sheet_entries.emp_id') // Join based on emp_id from sales_orders
            ->join('customer_details', 'customer_details.customer_id', '=', 'sales_orders.customer_id') // Join customer_details with sales_orders using customer_id
            ->select(
                'time_sheet_entries.*', // Select all columns from time_sheet_entries table
                'emp_details.company_id as emp_company_id', // Selecting company_id from emp_details
                'customer_details.customer_company_name' // Selecting customer_company_name from customer_details
            )
            ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                $startDate,
                $endDate,
            ])
            ->get();
    }


    public $selectedEmployeeIdForTS;

    public function selectEmployee($employeeId)
    {

        $startDate = Carbon::now()->startOfWeek()->toDateString(); // Monday
        $endDate = Carbon::now()->endOfWeek()->toDateString();
        $this->selectedEmployeeIdForTS = TimeSheetEntry::with('sal', 'cus', 'pur', 'ven')
            ->where('emp_id', $employeeId)
            ->first();

        if (!$this->selectedEmployeeIdForTS) {
            // If the record doesn't exist, assign 'N/A'
            $this->selectedEmployeeIdForTS = 'N/A';
        }
    }

    public function updateEntryStatus()
    {
        // Retrieve the authenticated user's emp_id
        $empId = Auth::user()->emp_id;


        // Retrieve the entries associated with the user
        $entries = TimeSheetEntry::where('emp_id', $empId)->get();
        $trimmedSearchTerm = trim($this->searchTermm);
        $startDate = Carbon::now()->startOfWeek()->toDateString(); // Monday
        $endDate = Carbon::now()->endOfWeek()->toDateString();
        $contractorTimeSheetData = TimeSheetEntry::with('sal')
            ->where('time_sheet_entries.status', 'submit')
            ->where(function ($query) use ($trimmedSearchTerm, $startDate, $endDate) {
                $query->where('status', 'LIKE', '%' . $trimmedSearchTerm . '%')
                    ->join('emp_details', 'time_sheet_entries.emp_id', '=', 'emp_details.emp_id')
                    ->join('sales_orders', 'sales_orders.emp_id', '=', 'time_sheet_entries.emp_id')
                    ->join('customer_details', 'customer_details.customer_id', '=', 'sales_orders.customer_id')
                    ->select(
                        'time_sheet_entries.*',
                        'emp_details.company_id as emp_company_id',
                        'customer_details.customer_company_name'
                    )
                    ->where('time_sheet_entries.emp_id', $this->emp_id)
                    ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                        $startDate,
                        $endDate,
                    ]);
            })
            ->get();

        // Loop through each entry to update the status
        foreach ($entries as $entry) {
            // Update the status from "pending" to "submit"
            $entry->status = 'submit';
            $entry->save();
        }

        // $employeeDetails = EmpDetails::where('emp_id', $entry->emp_id)->first();

        session()->flash('success', 'Status updated successfully for all entries');
    }

    public function pendingStatus($emp_id)
    {

        $p = TimeSheetEntry::where('emp_id', $emp_id)->first();
        $p->update(['status' => 'pending']);
        session()->flash('success-pen', ' Pending successfully');

        return redirect('time-sheet-display');
    }




    public function approveStatus($emp_id)

    {
        $startDate = Carbon::now()->startOfWeek()->toDateString(); // Monday
        $endDate = Carbon::now()->endOfWeek()->toDateString();

        $contractorTimeSheetData = TimeSheetEntry::whereIn('time_sheet_entries.status', ['submit', 'pending'])
            ->join('emp_details', 'time_sheet_entries.emp_id', '=', 'emp_details.emp_id')
            ->join('sales_orders', 'sales_orders.emp_id', '=', 'time_sheet_entries.emp_id')
            ->join('customer_details', 'customer_details.customer_id', '=', 'sales_orders.customer_id')
            ->select(
                'time_sheet_entries.*',
                'emp_details.company_id as emp_company_id',
                'customer_details.customer_company_name'
            )
            ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                $startDate,
                $endDate,
            ])
            ->first();



        try {


            $this->selectedEmployeeIdForTS = TimeSheetEntry::with('sal', 'cus', 'pur', 'ven')
                ->where('emp_id', $emp_id)
                ->first();

            $this->selectedEmployeeIdForTS->update(['status' => 'approve']);

            // Retrieve the specific sales order
            $salesOrder = SalesOrder::where('emp_id', $this->selectedEmployeeIdForTS->emp_id)->first();
            $daysOfWeek = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

            $totalRegularHours = 0;
            $totalSickHours = 0;
            $totalHolidayHours = 0;
            $totalVacationHours = 0;
            $totalCasualHours = 0;
            $totalHours = 0;

            foreach ($daysOfWeek as $day) {
                $totalRegularHours += (int)($this->selectedEmployeeIdForTS->day[$day]['regular'] ?? 0);
                $totalSickHours += (int)($this->selectedEmployeeIdForTS->day[$day]['sick'] ?? 0);
                $totalHolidayHours += (int)($this->selectedEmployeeIdForTS->day[$day]['holiday'] ?? 0);
                $totalVacationHours += (int)($this->selectedEmployeeIdForTS->day[$day]['vacation'] ?? 0);
                $totalCasualHours += (int)($this->selectedEmployeeIdForTS->day[$day]['casual'] ?? 0);
            }

            $totalHours = $totalRegularHours + $totalSickHours + $totalHolidayHours + $totalCasualHours + $totalVacationHours;

            // Create an invoice for the selected sales order
            $invoice = new Invoice();
            $invoice->customer_id = $salesOrder->customer_id;
            $invoice->amount = $salesOrder->rate * $totalHours;
            $invoice->due_date = 'Dec 28 2002';
            $invoice->payment_terms = $salesOrder->payment_terms;
            $invoice->company_id = $salesOrder->company_id; // Set the company ID
            $invoice->type = 'Invoice'; // Set the type
            $invoice->emp_id = $salesOrder->emp_id; // Set the emp ID
            $invoice->rate = $salesOrder->rate; // Set the rate
            $invoice->rate_type = $salesOrder->rate_type;
            $invoice->hrs_or_days = $totalHours . ' hours'; // Set the rate
            $invoice->period = $salesOrder->start_date . '-' . $salesOrder->end_date; // Set the period
            // Set hrs or days
            $invoice->open_balance = $salesOrder->rate * $totalHours;





            $invoice->save();

            $p = TimeSheetEntry::where('emp_id', $emp_id)->first();
            $p->update(['status' => 'approve']);
            session()->flash('success', ' Approved successfully');

            return redirect('time-sheet-display');
        } catch (Exception $e) {
            session()->flash('error', 'Error occurred while creating the invoice.');
        }
    }

    public function rejectStatus($employeeId)
    {

        $p = TimeSheetEntry::where('emp_id', $employeeId)->first();
        $p->update(['status' => 'reject']);
        session()->flash('success-rej', ' Rejected successfully');

        return redirect('time-sheet-display');
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
    public $action = "current";
    public function previousWeek()
    {
        $this->action = "previous";
        $this->setWeekDates(Carbon::parse($this->currentWeekStart)->subWeek());
    }

    public function totalHours()
    {
        $user = Auth::user();
        $empId = $user->emp_id;

        $empId = auth()->guard('employee')->id();
        $empDetails = EmpDetails::find($empId);
        $company_id = $empDetails->company_id;
        // Fetch HR detail for the company


        $this->validate([
            'weekData' => 'required|array',
        ]);


        $flattenedDays = collect($this->weekData)->flatMap(function ($days) {
            return array_values($days);
        })->flatten()->unique()->toArray();

        $this->timeSheetEntries = TimeSheetEntry::where('emp_id', $empId)
            ->whereIn('day', $flattenedDays)
            ->get();
        $this->timeSheetE = $this->filteredPeoples ?: $this->timeSheetEntries;


        // Create or update the time sheet entry


        $totalHours = array_sum(array_column($this->hours, 'regular')) +
            array_sum(array_column($this->hours, 'casual')) +
            array_sum(array_column($this->hours, 'sick')) +
            array_sum(array_column($this->hours, 'holiday')) +
            array_sum(array_column($this->hours, 'vacation'));

        return $totalHours;
    }

    public function nextWeek()
    {
        $this->action = "next";
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




    public function filterForStatus()
    {
        $trimmedSearchTerm = trim($this->searchTermm);

        $this->filteredStatus = TimeSheetEntry::where(function ($query) use ($trimmedSearchTerm) {
            $query->where('status', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('emp_id', 'LIKE', '%' . $trimmedSearchTerm . '%');
        })
            ->orWhereHas('empDetails', function ($empQuery) use ($trimmedSearchTerm) {
                $empQuery->where(function ($query) use ($trimmedSearchTerm) {
                    $query->where('first_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $trimmedSearchTerm . '%');
                });
            })

            ->get();

        // Access emp_id for each TimeSheetEntry in the collection
        $empIds = $this->filteredStatus->pluck('emp_id')->toArray();
    }


    public $inEntryTSForC;

    public function render()
    {
        $ss = TimeSheetEntry::all();
        $this->searchForStatus = $this->filteredStatus ?: $ss;
        $allEmployees = EmpDetails::all();
        $this->allEmployees = $this->filteredPeoples ?: $allEmployees;
        $user = Auth::user();
        $emp_id = $user->emp_id;
        $this->statuses = ['approve', 'reject', 'pending'];
        $this->contractorTimeSheetData = TimeSheetEntry::where('emp_id', $emp_id)->get();
        $this->inEntryTSForC = TimeSheetEntry::where('emp_id', $emp_id)->get();

        $startDate = Carbon::now()->startOfWeek()->toDateString(); // Monday
        $endDate = Carbon::now()->endOfWeek()->toDateString();
        $this->timeSheetE = TimeSheetEntry::join('emp_details', 'time_sheet_entries.emp_id', '=', 'emp_details.emp_id')
            ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                $startDate,
                $endDate,
            ])
            ->select('time_sheet_entries.emp_id', 'emp_details.first_name', 'emp_details.last_name')
            ->get();
        $query = TimeSheetEntry::query();

        // Apply status filter if selected
        if (!empty($this->selectedStatus)) {
            $query->where('status_column', $this->selectedStatus);
        }

        $this->results = $query->get();
        $empId = auth()->guard('employee')->id();
        $empDetails = EmpDetails::find($empId);

        if ($empDetails) {
            $company_id = $empDetails->company_id;
            $hrDetail = HrDetail::where('company_id', $company_id)->first();
        }
        // Fetch HR detail for the company

        $existingEntries = TimeSheetEntry::where('emp_id', $empId)->get();
        // Check if the entries exist and extract day data to populate weekData
        foreach ($this->weeks as $week) {
            $startDate = $week->startOfWeek()->toDateString();
            $endDate = $week->endOfWeek()->toDateString();

            // Check if an entry already exists for this week
            $entryExists = $existingEntries->first(function ($entry) use ($startDate, $endDate) {
                return $entry->day >= $startDate && $entry->day <= $endDate;
            });

            if (!$entryExists) {
                // Create a new entry for this week if it doesn't exist
                $formattedWeekData = []; // Replace this with your logic to format week data

                TimeSheetEntry::updateOrCreate([
                    'emp_id' => $empId,
                    'hr_id' => $hrDetail->hr_id,
                    'company_id' => $company_id,
                    'day' => $formattedWeekData,
                    'status' => 'pending',
                ]);
            }
        }
        // Retrieve data for the logged-in user from TimeSheetEntry
        $storedData = TimeSheetEntry::where('emp_id', $emp_id)
            ->where('status', 'pending') // Assuming you want only pending entries
            ->first();

        $startDate = Carbon::now()->startOfWeek()->toDateString(); // Monday
        $endDate = Carbon::now()->endOfWeek()->toDateString();



        // Define $startDate and $endDate variables
        $trimmedSearchTerm = trim($this->searchTermm);

        $contractorTimeSheetData = TimeSheetEntry::with('sal')
            ->where('time_sheet_entries.status', 'submit')
            ->where(function ($query) use ($trimmedSearchTerm, $startDate, $endDate) {
                $query->where('status', 'LIKE', '%' . $trimmedSearchTerm . '%')
                    ->join('emp_details', 'time_sheet_entries.emp_id', '=', 'emp_details.emp_id')
                    ->join('sales_orders', 'sales_orders.emp_id', '=', 'time_sheet_entries.emp_id')
                    ->join('customer_details', 'customer_details.customer_id', '=', 'sales_orders.customer_id')
                    ->select(
                        'time_sheet_entries.*',
                        'emp_details.company_id as emp_company_id',
                        'customer_details.customer_company_name'
                    )
                    ->where('time_sheet_entries.emp_id', $this->emp_id)

                    ->whereRaw("json_unquote(json_extract(day, '$.\"mon\".\"date\"')) BETWEEN ? AND ?", [
                        $startDate,
                        $endDate,
                    ]);
            })
            ->get();

        return view('livewire.time-sheet-display', [
            'entryId' => $this->entryId, 'contractorTimeSheetData' => $contractorTimeSheetData,
            'entries' => $this->entries,



        ]);
    }

    public $employeeId, $day;

    public function updatedSelectedStatus()
    {
        if ($this->selectedStatus === 'approveStatus') {
            $this->contractorTimeSheetData = TimeSheetEntry::where('status', 'approve')->get();
        } elseif ($this->selectedStatus === 'rejectStatus') {
            $this->contractorTimeSheetData = TimeSheetEntry::where('status', 'reject')->get();
        } elseif ($this->selectedStatus === 'pendingStatus') {
            $this->contractorTimeSheetData = TimeSheetEntry::where('status', 'pending')->get();
        } else {
            // If 'All' is selected or no specific status is chosen, retrieve all records
            $this->contractorTimeSheetData = TimeSheetEntry::all();
        }
    }

    public $employee_id, $dayFDD, $companyIdd, $company_id;
    public function createTimeSheet()
    {

        $user = Auth::user();
        $empId = $user->emp_id;

        $empId = auth()->guard('employee')->id();
        $empDetails = EmpDetails::find($empId);
        $company_id = $empDetails->company_id;
        // Fetch HR detail for the company


        $this->validate([
            'weekData' => 'required|array',
        ]);


        $flattenedDays = collect($this->weekData)->flatMap(function ($days) {
            return array_values($days);
        })->flatten()->unique()->toArray();

        $this->timeSheetEntries = TimeSheetEntry::where('emp_id', $empId)
            ->whereIn('day', $flattenedDays)
            ->get();
        $this->timeSheetE = $this->filteredPeoples ?: $this->timeSheetEntries;


        if ($this->action == "current") {
            $this->setWeekDates(Carbon::parse($this->currentWeekStart));

            $formattedWeekData = [];

            foreach ($this->weekData as $day => $leaveTypes) {
                $currentDate = Carbon::parse($this->currentWeekStart)->addDays(['mon' => 0, 'tue' => 1, 'wed' => 2, 'thu' => 3, 'fri' => 4, 'sat' => 5, 'sun' => 6][$day])->toDateString();
                $formattedWeekData[$day] = [
                    'date' => $currentDate,
                    'regular' => $leaveTypes['regular'] ?? 0,
                    'sick' => $leaveTypes['sick'] ?? 0,
                    'holiday' => $leaveTypes['holiday'] ?? 0,
                    'vacation' => $leaveTypes['vacation'] ?? 0,
                    'casual' => $leaveTypes['casual'] ?? 0,
                ];
            }
        } elseif ($this->action == "previous") {
            //Previous Week
            $this->setWeekDates(Carbon::parse($this->currentWeekStart));

            foreach ($this->weekData as $day => $leaveTypes) {
                $currentDate = Carbon::parse($this->currentWeekStart)->addDays(['mon' => 0, 'tue' => 1, 'wed' => 2, 'thu' => 3, 'fri' => 4, 'sat' => 5, 'sun' => 6][$day])->toDateString();

                $formattedWeekData[$day] = [
                    'date' => $currentDate,
                    'regular' => $leaveTypes['regular'] ?? 0,
                    'sick' => $leaveTypes['sick'] ?? 0,
                    'holiday' => $leaveTypes['holiday'] ?? 0,
                    'vacation' => $leaveTypes['vacation'] ?? 0,
                    'casual' => $leaveTypes['casual'] ?? 0,
                ];
            }
        } elseif ($this->action == "next") {
            //Next Week
            $this->setWeekDates(Carbon::parse($this->currentWeekStart));

            $formattedWeekData = [];

            foreach ($this->weekData as $day => $leaveTypes) {
                $currentDate = Carbon::parse($this->currentWeekStart)->addDays(['mon' => 0, 'tue' => 1, 'wed' => 2, 'thu' => 3, 'fri' => 4, 'sat' => 5, 'sun' => 6][$day])->toDateString();

                $formattedWeekData[$day] = [
                    'date' => $currentDate,
                    'regular' => $leaveTypes['regular'] ?? 0,
                    'sick' => $leaveTypes['sick'] ?? 0,
                    'holiday' => $leaveTypes['holiday'] ?? 0,
                    'vacation' => $leaveTypes['vacation'] ?? 0,
                    'casual' => $leaveTypes['casual'] ?? 0,
                ];
            }
        }
        $hrDetail = HrDetail::where('company_id', $company_id)->first();

        // Create or update the time sheet entry
        if ($hrDetail != null) {
            try {
                $datesOnly = array_column($formattedWeekData, 'date');

                foreach ($datesOnly as $date) {
                    $user = Auth::user();
                    $empId = $user->emp_id;
                    $ss = TimeSheetEntry::where('emp_id', $empId)->where(function ($query) use ($date) {
                        $query->orWhereJsonContains('day', ['mon' => ['date' => $date]])
                            ->orWhereJsonContains('day', ['tue' => ['date' => $date]])
                            ->orWhereJsonContains('day', ['wed' => ['date' => $date]])
                            ->orWhereJsonContains('day', ['thu' => ['date' => $date]])
                            ->orWhereJsonContains('day', ['fri' => ['date' => $date]])
                            ->orWhereJsonContains('day', ['sat' => ['date' => $date]])
                            ->orWhereJsonContains('day', ['sun' => ['date' => $date]]);
                    })->get();
                }

                // If no existing entry, create a new one
                if ($ss->isEmpty()) {
                    TimeSheetEntry::create([
                        'emp_id' => $empId,
                        'day' => $formattedWeekData,
                        'hr_id' => $hrDetail->hr_id,
                        'company_id' => $company_id,
                        'status' => 'pending',
                        // Add other necessary fields
                    ]);
                    session()->flash('success', 'Working hours updated successfully');
                } else {
                    session()->flash('error', 'Already submitted for this date range');
                }
            } catch (Exception $e) {
                // Handle other exceptions
                session()->flash('error', 'Already submitted for this date range');
            }
        } else {
            session()->flash('error-h', 'Error Occur: HR Details not found');
            return redirect('time-sheets-display');
        }



        // Fetch updated time sheet entries after modification
        // Assuming $this->weekData is a multidimensional array


    }
}
