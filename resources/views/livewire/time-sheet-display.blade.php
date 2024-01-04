<div>

    <a class="menu-link {{ Request::is('time-sheet-display') ? 'active' : '' }}" href=/time-sheet-display>

    </a>
    <title>Save Icon Button</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->



    <div class="row" style="margin-top:50px;">

        @if(Auth::guard('hr')->check())
        <div style="margin-top:-10px;text-align:center">
            @if (session()->has('success'))
            <div class="alert alert-success" style="height:40px;font-size:12px;margin-top:-50px">{{ session('success') }}</div>
            @elseif (session()->has('error'))
            <div class="alert alert-danger" style="height:40px;font-size:12px;margin-top:-50px">{{ session('error') }}</div>
            @elseif (session()->has('in-success'))
            <div class="alert alert-success" style="height:40px;font-size:12px;margin-top:-50px">{{ session('in-success') }}</div>
            @elseif (session()->has('success-rej'))
            <div class="alert alert-success" style="height:40px;font-size:12px;margin-top:-50px">{{ session('success-rej') }}</div>
            @elseif (session()->has('success-pen'))
            <div class="alert alert-success" style="height:40px;font-size:12px;margin-top:-50px">{{ session('success-pen') }}</div>
            elseif (session()->has('error-h'))
            <div class="alert alert-success" style="height:40px;font-size:12px;margin-top:-50px">{{ session('error-h') }}</div>
            @endif
        </div>


        @if ( $contractorTimeSheetData )

        <div class="row" style="width:100%;height:300px;margin-top:-20px">


            <div class="col" style="margin-top: -10px; padding: 0px">
                <div class="input-group" style="width:23%;margin-left:30px;margin-top:10px">
                    <input wire:model="searchTermm" style="font-size: 11px; width:80%;cursor: pointer; border-radius: 5px 0 0 5px;" type="text" class="form-control" placeholder="Search for" aria-label="Search" aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <button wire:click="filterForStatus" style="height: 28px; border-radius: 0 5px 5px 0; background-color: #003767; color: #fff; border: none;" class="btn" type="button">
                            <i style="text-align: center;" class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-head" style="width:100%;margin-top:5px;text-align:center">
                <table style="width:100%;margin-left:10px;text-align:center">
                    <thead style="background:rgb(2, 17, 79);width:100%;text-align:center">
                        <tr style="background:rgb(2, 17, 79);color:white;height:30px;text-align:center">
                            <th style=" width: 10%;text-align:center">Date</th>
                            <th style="width: 12%;text-align:center">Name</th>
                            <th style="width: 7%;text-align:center">TS Type</th>
                            <th style="width: 14%;text-align:center">Period</th>
                            <th style="width: 6%;text-align:center">Regular</th>
                            <th style="width: 6%;text-align:center">Sick</th>
                            <th style="width: 6%;text-align:center">Holiday</th>
                            <th style="width: 6%;text-align:center">Vacation</th>
                            <th style="width: 6%;text-align:center">Casual</th>
                            <th style="width: 6%;text-align:center">Total hours</th>
                            <th style="width: 10%;text-align:center">Customer</th>
                            <th style="width: 12%;text-align:center">Vendor</th>
                            <th style="width: 6%;text-align:center">Attachment</th>
                            <th style="width: 8%;text-align:center">Status</th>

                        </tr>
                    </thead>
                    <tbody style="justify-content:center">

                        @if($selectedEmployeeIdForTS!=null)
                        @foreach ($searchForStatus as $selectedEmployeeIdForTS)
                        @php
                        $totalRegularHours = 0;
                        $totalSickHours = 0;
                        $totalHolidayHours = 0;
                        $totalVacationHours = 0;
                        $totalCasualHours = 0;
                        $totalHours = 0;
                        @endphp

                        @php
                        // Calculate total hours for each category and add to the overall total
                        $daysOfWeek = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
                        foreach ($daysOfWeek as $day) {
                        $totalRegularHours += (int)($selectedEmployeeIdForTS->day[$day]['regular'] ?? 0);
                        $totalSickHours += (int)($selectedEmployeeIdForTS->day[$day]['sick'] ?? 0);
                        $totalHolidayHours += (int)($selectedEmployeeIdForTS->day[$day]['holiday'] ?? 0);
                        $totalVacationHours += (int)($selectedEmployeeIdForTS->day[$day]['vacation'] ?? 0);
                        $totalCasualHours += (int)($selectedEmployeeIdForTS->day[$day]['casual'] ?? 0);
                        }
                        $totalHours += $totalRegularHours +$totalSickHours+ $totalHolidayHours+$totalCasualHours+ $totalVacationHours;



                        @endphp

                        <tr style="margin-left:50px;border: 1px solid #dddddd;text-align: center">
                            <td>{{ $selectedEmployeeIdForTS->updated_at->format('M d-Y') }}</td>
                            <td style="padding-left:10px;border: 1px solid #dddddd;width:30px"> {{ $selectedEmployeeIdForTS->employee->first_name ?? '' }}
                                {{ $selectedEmployeeIdForTS->employee->last_name ?? '' }}
                            </td>
                            <td style="border: 1px solid #dddddd;padding-left:5px">Weekly</td>

                            <td style="border: 1px solid #dddddd;padding-left:10px">
                                @if(isset($selectedEmployeeIdForTS->day['mon']['date']))
                                {{ date('M d', strtotime($selectedEmployeeIdForTS->day['mon']['date'])) }}
                                @endif

                                @if(isset($selectedEmployeeIdForTS->day['sun']['date']))
                                to {{ date('M d-Y', strtotime($selectedEmployeeIdForTS->day['sun']['date'])) }}
                                @endif
                            </td>




                            <td style="border: 1px solid #dddddd;">{{ $totalRegularHours }}</td>
                            <td style="border: 1px solid #dddddd;">{{ $totalSickHours }} </td>
                            <td style="border: 1px solid #dddddd;">{{ $totalHolidayHours }}</td>
                            <td style="border: 1px solid #dddddd;">{{ $totalVacationHours }}</td>
                            <td style="border: 1px solid #dddddd;"> {{ $totalCasualHours }}</td>
                            <td style="border: 1px solid #dddddd;">{{$totalHours}}</td>

                            <td style="border: 1px solid #dddddd;">
                                @if ($selectedEmployeeIdForTS && $selectedEmployeeIdForTS->sal && $selectedEmployeeIdForTS->sal->cus)
                                {{ $selectedEmployeeIdForTS->sal->cus->customer_company_name }}
                                @else
                                N/A
                                @endif
                            </td>

                            <td style="border: 1px solid #dddddd;">
                                @if ($selectedEmployeeIdForTS && $selectedEmployeeIdForTS->pur && $selectedEmployeeIdForTS->pur->ven)
                                {{ $selectedEmployeeIdForTS->pur->ven->vendor_name }}
                                @else
                                N/A
                                @endif
                            </td>
                            <td style="border: 1px solid #dddddd;">--</td>
                            <td style="border: 1px solid #dddddd;">
                                @if($selectedEmployeeIdForTS->status == "approve")
                                <!-- Approve button -->
                                <form wire:submit.prevent="approveStatus('{{$selectedEmployeeIdForTS->emp_id}}')" wire:loading.attr="disabled" :disabled="$isButtonDisabled">
                                    @csrf
                                    <button type="submit" disabled style="background: lightslategray; width: 60px; height: 20px; font-size: 12px;margin-top:5px">
                                        Approve
                                    </button>
                                </form>

                                <!-- Reject button -->

                                @elseif($selectedEmployeeIdForTS->status == "pending")
                                <!-- Approve button -->
                                <form wire:submit.prevent="approveStatus('{{$selectedEmployeeIdForTS->emp_id}}')" wire:loading.attr="disabled" :disabled="$isButtonDisabled">
                                    @csrf
                                    <button type="submit" style="background: rgb(2, 17, 79); width: 60px; height: 20px; font-size: 12px;margin-top:5px">
                                        Approve
                                    </button>
                                </form>

                                <!-- Reject button -->
                                <form wire:submit.prevent="rejectStatus('{{$selectedEmployeeIdForTS->emp_id}}')" wire:loading.attr="disabled" :disabled="$isButtonDisabled">
                                    @csrf
                                    <button type="submit" style="background: rgb(2, 17, 79); width: 60px; height: 20px; font-size: 12px;margin-top:10px">
                                        Reject
                                    </button>
                                </form>

                                <!-- Pending button -->
                                <form wire:submit.prevent="pendingStatus('{{$selectedEmployeeIdForTS->emp_id}}')" wire:loading.attr="disabled" :disabled="$isButtonDisabled">
                                    @csrf
                                    <button type="submit" disabled style="background: lightslategray; width: 60px; height: 20px; font-size: 12px;margin-top:10px">
                                        Pending
                                    </button>
                                </form>
                                @elseif($selectedEmployeeIdForTS->status == "reject")
                                <!-- Approve button -->


                                <!-- Reject button -->
                                <form>
                                    @csrf
                                    <button type="submit" disabled style="background: lightslategray; width: 60px; height: 20px; font-size: 12px;margin-top:10px">
                                        Reject
                                    </button>
                                </form>


                                @elseif($selectedEmployeeIdForTS->status == "submit")
                                <!-- Approve button -->
                                <form wire:submit.prevent="approveStatus('{{$selectedEmployeeIdForTS->emp_id}}')" wire:loading.attr="disabled" :disabled="$isButtonDisabled">
                                    @csrf
                                    <button type="submit" style="background: rgb(2, 17, 79); width: 60px; height: 20px; font-size: 12px;margin-top:5px">
                                        Approve
                                    </button>
                                </form>

                                <!-- Reject button -->
                                <form wire:submit.prevent="rejectStatus('{{$selectedEmployeeIdForTS->emp_id}}')" wire:loading.attr="disabled" :disabled="$isButtonDisabled">
                                    @csrf
                                    <button type="submit" style="background: rgb(2, 17, 79); width: 60px; height: 20px; font-size: 12px;margin-top:10px">
                                        Reject
                                    </button>
                                </form>

                                <!-- Pending button -->
                                <form wire:submit.prevent="pendingStatus('{{$selectedEmployeeIdForTS->emp_id}}')" wire:loading.attr="disabled" :disabled="$isButtonDisabled">
                                    @csrf
                                    <button type="submit" style="background: lightslategray; width: 60px; height: 20px; font-size: 12px;margin-top:10px">
                                        Pending
                                    </button>
                                </form>
                                @endif
                            </td>



                            </td>

                        </tr>
                        @endforeach
                        @endif







                        @endif
            </div>

            </tbody>
            </table>

        </div>


        @else
        <div class="col" style="text-align: center;">
            <button wire:click="$set('tab', 'empInfo')" style="background-color:  rgb(2, 17, 79);color:white;border-radius:5px;border:5px">Employee Info</button>
        </div>
        <div class="col">
            <button wire:click="$set('tab', 'timesheet')" style="background-color:  rgb(2, 17, 79);color:white;border-radius:5px;border:5px"> Employee TimeSheet</button>
        </div>

        <div style="margin-top:10px">
            @if (session()->has('success'))
            <div class="alert alert-success" style="margin-left:20px;height:30px;text-align:center;padding:3px;font-size:12px">{{ session('success') }}</div>
            @elseif (session()->has('error'))
            <div class="alert alert-danger" style="margin-left:20px;height:30px;text-align:center;padding:3px;font-size:12px">{{ session('error') }}</div>
            @endif
            @if(session()->has('error-h'))
            <div class="alert alert-danger" style="margin-left:20px;height:30px;text-align:center;padding:3px;font-size:12px">{{ session('error-h') }}</div>
            @elseif(session()->has('duplicate'))
            <div class="alert alert-danger" style="margin-left:20px;height:30px;text-align:center;padding:3px;font-size:12px">{{ session('duplicate') }}</div>
            @endif
        </div>


        @if($tab=="empInfo")
        <div>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <title>Employee Information</title>
            </head>

            <body>
                <div class="container" style="margin-top:40px;">
                    <div class="form-row">
                        <div class="row">
                            <div class="col">
                                <label for="selectMonth">Month</label>
                                <select class="form-control" id="selectMonth">
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                    <!-- Add options for all months -->

                                </select>
                            </div>
                            <div class="col">
                                <label for="selectYear">Year</label>
                                <select class="form-control" id="selectYear">
                                    <!-- Add options for years as needed -->
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <!-- Add more years if necessary -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <h6 style="margin-top: 10px;"><strong>Employee Time Sheet</strong></h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Week</th>
                                <th>Month</th>

                                <th>Time Sheet by Employee</th>
                                <th>Time Sheet Approved by Manager</th>
                                <th>Invoice raised (Y/N)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dummy Records -->
                            <!-- Repeat this block for each record -->
                            <!-- Replace image path, names, and other data accordingly -->
                            <tr>
                                <td><img src="path_to_icon_image_1" alt="Icon" width="50" height="50"></td>
                                <td>John Doe</td>
                                <td>ABC Company</td>
                                <td>Week 1</td>
                                <td>January</td>

                                <td>Submitted</td>
                                <td>Approved</td>
                                <td>Yes</td>
                            </tr>
                            <!-- Repeat the above block for additional records (19 more times) -->
                            <!-- Example record 2 -->
                            <tr>
                                <td><img src="path_to_icon_image_2" alt="Icon" width="50" height="50"></td>
                                <td>Jane Smith</td>
                                <td>XYZ Corporation</td>
                                <td>Week 2</td>
                                <td>January</td>

                                <td>Pending</td>
                                <td>Not Approved</td>
                                <td>No</td>
                            </tr>
                            <!-- Repeat this block with different data for other records -->
                            <!-- Total 20 records -->
                        </tbody>
                    </table>
                </div>

            </body>

            </html>

        </div>
        @endif

        @if($tab=="timeSheet")

        <div style="display: flex; align-items: center; margin-left: 40px;margin-top:20px">

            <h6 style="margin-right: 20px;"><strong>Employee Information</strong></h6>

        </div>

        @if ($empDetails && count($empDetails) > 0)

        @foreach ($empDetails as $employee)
        <div class="form-row mb-3" style="margin-left:40px;font-size:12px">
            <div class="col-md-4">
                <label for="employeeName">Name: </label>
                <strong><label for="">{{ $employee->first_name }} {{ $employee->last_name }}</label></strong>
            </div>
            <div class="col-md-4">
                <label for="employeeDesignation">Designation: </label>
                <label for="">{{ $employee->job_title }}</label>
            </div>
            <div class="col-md-4">
                <label for="employeeID">Employee ID: </label>
                <label for="">{{ $employee->emp_id }}</label>
            </div>
        </div>
        @endforeach
        @else
        <p>No employee details found</p>
        @endif


        <div style="display: flex; align-items: center; justify-content: space-between;margin-left:690px">
            <div>
                <!-- Icon for Previous Week -->
                <button wire:click="previousWeek" style="background: rgb(2, 17, 79)">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <!-- Current Week -->
                <span>{{ $currentWeekStart }} to {{ $currentWeekEnd }}</span>

                <!-- Icon for Next Week -->
                <button wire:click="nextWeek" style="background: rgb(2, 17, 79)">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <!-- Dropdown for Selecting Future Dates -->

        </div>


        <div style="display:flex;margin-left:20px;margin-top:10px">

            <?php
            function getCurrentWeekDates()
            {
                $currentDate = new DateTime();
                $currentDate->modify('this week');
                $endDate = clone $currentDate;
                $endDate->modify('+6 days');
                return array($currentDate->format('d-m-Y'), $endDate->format('d-m-Y'));
            }
            list($startDate, $endDate) = getCurrentWeekDates();
            ?>

        </div>

        <h6 style="margin-left:20px"><strong>Time Sheet Entry</strong></h6>

        <!-- Your Blade view - time-sheet-display.blade.php -->

        <div>
            @php
            $currentWeekDataExists = true;
            // Check if $weekData contains entries for the current week
            // Assuming $weekData is an array containing data for each day of the week
            foreach ($weekData as $day => $leaveTypes) {
            // Check if the current day is within the current week
            $dayOfWeek = Carbon\Carbon::parse($day)->dayOfWeek;
            if ($dayOfWeek >= 0 && $dayOfWeek <= 6) { $currentWeekDataExists=true; break; } } @endphp @if ($currentWeekDataExists) <table class="table">
                <!-- Header -->
                <thead style="justify-content:center">
                    <tr style="font-size: 12px;justify-content:center">
                        <th style="width: 0px;">Leave</th>


                        @php
                        $startOfWeek = \Carbon\Carbon::parse($currentWeekStart)->startOfWeek(); // Parse and set the start of the current week
                        @endphp

                        @foreach (range(0, 6) as $i)
                        <th style="width: 0px;" class="day-date">{{ $startOfWeek->format('l') }}<br>{{ $startOfWeek->format('d-M-y') }}</th>
                        @php
                        $startOfWeek->addDay();
                        @endphp
                        @endforeach





                        <th style="width: 0px;">Total Hours</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody>
                    @foreach(['regular', 'sick', 'holiday', 'vacation', 'casual'] as $leaveType)
                    <tr>
                        <td style="margin-left:15px"><strong>{{ ucfirst($leaveType) }}</strong></td>
                        @foreach(['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'] as $day)
                        @php
                        // Check if any leave type is entered for the same day
                        $isEntered = false;
                        foreach (['regular', 'sick', 'holiday', 'vacation', 'casual'] as $otherLeaveType) {

                        if (isset($weekData[$day][$otherLeaveType]) &&
                        $weekData[$day][$otherLeaveType] !== null &&
                        $weekData[$day][$otherLeaveType] !== 0 &&
                        $otherLeaveType !== $leaveType
                        ) {
                        $isEntered = true;
                        }
                        }
                        @endphp
                        <td >
                            <input wire:model="weekData.{{ $day }}.{{ $leaveType }}" wire:change="totalHours" type="number" name="{{ $leaveType }}_{{ $day }}_{{ $leaveType }}" min="0" max="24" placeholder="0" class="form-control" style="width: 50px; font-size: 10px;" @if($isEntered) readonly @endif>
                        </td>
                        @endforeach
                        <td>
                            <input type="number" value="{{ array_sum(array_column($weekData, $leaveType)) }}" min="0" max="24" class="form-control" disabled style="width:60px; font-size:10px;">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @else
                <!-- Display a message or handle when there is no data for the current week -->
                <p>No data available for the current week.</p>
                @endif

                @php
                // Define $leaveTypes with the necessary leave types
                $leaveTypes = ['regular', 'sick', 'holiday', 'vacation', 'casual']; // Modify this array as needed

                // Rest of your Blade or PHP code...
                @endphp
                <td>
                    <div style="display:flex;margin-left:820px">
                        <b style="margin-left:10px">Total Hours :</b>
                        <input type="number" value="{{ array_sum(array_map(function ($day) use ($leaveTypes) {
    return array_sum(array_intersect_key($day, array_flip($leaveTypes)));
}, $weekData)) }}" min="0" max="24" class="form-control" disabled style="width:60px;height:30px; font-size:10px;">
                    </div>
                </td>

                <!-- Submit Button -->

                <form>
                    @csrf
                    <button type="button" wire:click="createTimeSheet" style="background:green;margin-left:40px">Submit</button>
                </form>

        </div>

        @endif

        <hr style="margin-top: 10px;">
        <h6 style="text-align: start;margin-left:10px"><strong>TimeSheets Info</strong></h6>

        @if ($inEntryTSForC)
        <div class="table-head" style="width:100%;text-align:center">

            <table style="width:100%;margin-left:10px;text-align:center">

                <thead style="background:rgb(2, 17, 79);width:100%;text-align:center">
                    <tr style="background:rgb(2, 17, 79);color:white;height:30px;text-align:center">
                        <th style=" width: 10%;text-align:center">Date</th>
                        <th style="width: 12%;text-align:center">Name</th>
                        <th style="width: 7%;text-align:center">TS Type</th>
                        <th style="width: 14%;text-align:center">Period</th>
                        <th style="width: 6%;text-align:center">Regular</th>
                        <th style="width: 6%;text-align:center">Sick</th>
                        <th style="width: 6%;text-align:center">Holiday</th>
                        <th style="width: 6%;text-align:center">Vacation</th>
                        <th style="width: 6%;text-align:center">Casual</th>
                        <th style="width: 6%;text-align:center">Total hours</th>
                        <th style="width: 10%;text-align:center">Customer</th>
                        <th style="width: 12%;text-align:center">Vendor</th>
                        <th style="width: 6%;text-align:center">Attachment</th>
                        <th style="width: 8%;text-align:center">Status</th>

                    </tr>
                </thead>

                <tbody style="justify-content:center">



                    @foreach($inEntryTSForC as $entries)
                    @php
                    $totalRegularHours = 0;
                    $totalSickHours = 0;
                    $totalHolidayHours = 0;
                    $totalVacationHours = 0;
                    $totalCasualHours = 0;
                    $totalHours = 0;
                    @endphp

                    @php
                    // Calculate total hours for each category and add to the overall total
                    $daysOfWeek = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
                    foreach ($daysOfWeek as $day) {
                    $totalRegularHours += (int)($entries->day[$day]['regular'] ?? 0);
                    $totalSickHours += (int)($entries->day[$day]['sick'] ?? 0);
                    $totalHolidayHours += (int)($entries->day[$day]['holiday'] ?? 0);
                    $totalVacationHours += (int)($entries->day[$day]['vacation'] ?? 0);
                    $totalCasualHours += (int)($entries->day[$day]['casual'] ?? 0);
                    }
                    $totalHours += $totalRegularHours +$totalSickHours+ $totalHolidayHours+$totalCasualHours+ $totalVacationHours;
                    @endphp
                    <tr style="margin-left:50px;border: 1px solid #dddddd;text-align: center">
                        <td>@if($entries->updated_at!=null)
                            {{ $entries->updated_at->format('M d-Y') }}
                            @else
                            {{ $entries->created_at->format('M d-Y') }}

                            @endif
                        </td>
                        <td style="padding-left:10px;border: 1px solid #dddddd;width:30px"> {{ $entries->employee->first_name ?? '' }}
                            {{ $entries->employee->last_name ?? '' }}
                        </td>
                        <td style="border: 1px solid #dddddd;padding-left:5px">Weekly</td>
                        @if(isset($entries->day['mon']['date']) && isset($entries->day['sun']['date']))
                        @php
                        $startDate = Carbon\Carbon::parse($entries->day['mon']['date']);
                        $endDate = Carbon\Carbon::parse($entries->day['sun']['date']);
                        @endphp
                        <td style="border: 1px solid #dddddd;padding-left:10px">
                            {{ $startDate->format('M d') }} to {{ $endDate->format('M d-Y') }}
                        </td>
                        @else
                        <td style="border: 1px solid #dddddd;padding-left:10px">
                            Date range not available
                        </td>
                        @endif



                        <td style="border: 1px solid #dddddd;">{{ $totalRegularHours }}</td>
                        <td style="border: 1px solid #dddddd;">{{ $totalSickHours }} </td>
                        <td style="border: 1px solid #dddddd;">{{ $totalHolidayHours }}</td>
                        <td style="border: 1px solid #dddddd;">{{ $totalVacationHours }}</td>
                        <td style="border: 1px solid #dddddd;"> {{ $totalCasualHours }}</td>
                        <td style="border: 1px solid #dddddd;">{{$totalHours}}</td>

                        <td style="border: 1px solid #dddddd;">
                            @if ($entries && $entries->sal && $entries->sal->cus)
                            {{ $entries->sal->cus->customer_company_name }}
                            @else
                            N/A
                            @endif
                        </td>

                        <td style="border: 1px solid #dddddd;">
                            @if ($entries && $entries->pur && $entries->pur->ven)
                            {{ $entries->pur->ven->vendor_name }}
                            @else
                            N/A
                            @endif
                        </td>
                        <td>--</td>
                        <td style="border: 1px solid #dddddd;text-align:center;text-transform:capitalize">
                            {{$entries->status}}
                        </td>


                        </td>

                    </tr>
                    @endforeach



        </div>
        @else
        <div style="text-align: center;margin-top:15px">Not Found</div>
        @endif

        </tbody>
    </div>
    @endif



    <style>
        /* Basic button styles */

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            margin-top: 20px;
            /* Top margin */
            margin-bottom: 20px;
            font-size: 10px;
            justify-content: center;
            border: 1px solid #dddddd;
            margin-left: 20px;
            /* Bottom margin */
        }

        th,
        td,tr {
            border: 1px solid #dddddd;
            text-align: center;

            padding: 10px;
            height: 40px;
            width: 50px;
            justify-content: center;
        }

        th {
            border: 1px solid #dddddd;
            text-align: center;

            padding: 10px;
            height: 40px;
            font-weight: bold;
        }

        tr:nth-child(even) {
            border: 1px solid #dddddd;
            height: 40px;

            background-color: #f9f9f9;
        }


        button {

            border: none;
            border-radius: 4px;
            background-color: grey;
            color: white;
            height: 30px;

            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: relative;
        }

        /* Styles for the icon */
        .icon {
            position: absolute;

            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            background-image: url('save-icon.png');
            /* Replace with your icon image */
            background-size: cover;
            display: inline-block;

        }

        .day-date {
            padding-left: 9px;
            /* Adjust this value to reduce the gap */
            font-size: 10px;
            border: 1px solid #dddddd;
            justify-content: center;
            /* Adjust the font size if needed */
        }



        /* Hover effect */
    </style>

</div>