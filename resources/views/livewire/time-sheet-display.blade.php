<div>
 
    <a class="menu-link {{ Request::is('time-sheet-display') ? 'active' : '' }}" href=/time-sheet-display>
 
    </a>
    <title>Save Icon Button</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
 
 
 
    <div class="row" style="margin-top:50px">
        @if(Auth::guard('hr')->check())
        <div style="margin-top:10px">
        @if (session()->has('success'))
        <div class="alert alert-success" style="height:40px;font-size:12px;margin-top:-50px">{{ session('success') }}</div>
        @elseif (session()->has('error'))
        <div class="alert alert-danger" style="height:40px;font-size:12px;margin-top:-50px">{{ session('error') }}</div>
        @endif
                            </div>
        <div style="margin:auto 10px; width:95%;">
   
            @if ( $contractorTimeSheetData )
            <div class="column" style="margin:10px; padding :10px 15px;margin-left:-10px;margin-top:-30px">
                <div class="col-md-3"  style="background-color: #f2f2f2;margin-right:5px;">
                    <div class="container" style="margin-top: 15px;">
                        <div class="row">
                            <div class="col" style="margin: 0px; padding: 0px">
                                <div class="input-group">
                                    <input wire:model="searchTerm" style="font-size: 11px; width:80%;cursor: pointer; border-radius: 5px 0 0 5px;" type="text" class="form-control" placeholder="Search for Name or ID" aria-label="Search" aria-describedby="basic-addon1">
                                    <div class="input-group-append">
                                        <button wire:click="filter" style="height: 28px; border-radius: 0 5px 5px 0; background-color: #003767; color: #fff; border: none;" class="btn" type="button">
                                            <i style="text-align: center;" class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="scroll-container" style="margin-top:10px;" >
                   
                    @foreach($timeSheetE as $employee)
                   
                    <div wire:click="selectEmployee({{ $employee->emp_id }})" class="container" style="width:95%; background-color: {{$selectedEmployee && $selectedEmployee->emp_id == $employee->emp_id ? '#ccc' : 'white' }};border-radius:5px;padding:10px auto; cursor:pointer;margin-top:10px; display: flex; justify-content: space-between; align-items: center;display:flex">
    <div style="display: flex;height:20px;margin-top:10px;margin-left:10px">
        <span style="color: #778899; font-size: 0.625rem;">
            {{ $employee->first_name }} {{ $employee->last_name }}
        </span>
        <span style="color: #778899; font-size: 0.625rem;margin-left:30px">(#{{ $employee->emp_id }})</span>
    </div>
</div>
 
 
                        @endforeach
                         @endif
                     
                    </div>
                </div>
 
                <div class="col-md-8" style="margin-left:-20px;padding:8px">
 
                    <div class="table-info" style="padding:5px 10px;width:80% ">
                        <table>
                            <thead style="background:rgb(2, 17, 79)">
                                <tr style="background:rgb(2, 17, 79);color:white">
                                    <th style="padding-left:30px">Date</th>
                                    <th>Name</th>
                                    <th>Ts Type</th>
                                    <th>Period</th>
                                    <th>Regular</th>
                                    <th>Sick</th>
                                    <th>Holiday</th>
                                    <th>Vacation</th>
                                    <th>Casual</th>
                                    <th>Total hours</th>
                                    <th>customer</th>
                                    <th>vendor</th>
                                    <th>Attachment</th>
                                    <th>status</th>
 
                                </tr>
                            </thead>
                            <tbody>
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
 
 
 
                             
                                @if($selectedEmployeeIdForTS!=null)
                                <tr style="margin-left:50px;border: 1px solid #dddddd;">
                            <td>{{ $selectedEmployeeIdForTS->updated_at->format('d-m-Y') }}</td>
                                    <td style="padding-left:10px;border: 1px solid #dddddd;width:30px">  {{ $selectedEmployeeIdForTS->employee->first_name ?? '' }}
                    {{ $selectedEmployeeIdForTS->employee->last_name ?? '' }}</td>
                                    <td style="border: 1px solid #dddddd;padding-left:5px">Weekly</td>
                                    @if(isset($selectedEmployeeIdForTS->day['mon']['date']) && isset($selectedEmployeeIdForTS->day['sun']['date']))
    <td style="border: 1px solid #dddddd;padding-left:10px">
        {{ \Carbon\Carbon::parse($selectedEmployeeIdForTS->day['mon']['date'])->format('M d') }} <br>
        {{ \Carbon\Carbon::parse($selectedEmployeeIdForTS->day['sun']['date'])->format('M d') }}
    </td>
@endif
 
                                    <td style="padding-left:20px;border: 1px solid #dddddd;">{{ $totalRegularHours }}</td>
                                    <td style="padding-left:20px;border: 1px solid #dddddd;">{{ $totalSickHours }} </td>
                                    <td style="padding-left:20px;border: 1px solid #dddddd;">{{ $totalHolidayHours }}</td>
                                    <td style="padding-left:20px;border: 1px solid #dddddd;">{{ $totalVacationHours }}</td>
                                    <td style="padding-left:20px;border: 1px solid #dddddd;"> {{ $totalCasualHours }}</td>
                                    <td style="border: 1px solid #dddddd;padding-left:20px">{{$totalHours}}</td>
                                       <td style="border: 1px solid #dddddd;">{{ $selectedEmployeeIdForTS->customer_name }}</td>
                <td style="border: 1px solid #dddddd;">{{ $selectedEmployeeIdForTS->vendor_name }}</td>
                                    <td style="border: 1px solid #dddddd;">{{ $selectedEmployeeIdForTS->period }}</td>
                                    <td style="border: 1px solid #dddddd;">
                                        <form wire:submit.prevent="approveStatus($id)">
                                            @csrf
                                            <button type="submit" wire:loading.attr="disabled" :disabled="$isButtonDisabled" style="background:green;width:60px;height:20px;font-size:12px">Approve</button>
                                        </form>
                                        <form wire:submit.prevent="rejectStatus($id)">
                                            @csrf
                                            <button type="submit" wire:loading.attr="disabled" :disabled="$isButtonDisabled" style="background:red;width:60px;height:20px;font-size:12px;margin-top:10px">Reject</button>
                                        </form>
 
                                    </td>
 
                                </tr>
                                @else
                                @endif
                             
                            </tbody>
                        </table>
                        <div style="display: flex;margin-left:600px;margin-top:20px;">
 
 
 
                        </div>
 
                    </div>
 
                </div>
            </div>
 
 
            @else
            <div class="col" style="text-align: center;">
                <button wire:click="$set('tab', 'timeSheet')" style="background-color:  rgb(2, 17, 79);color:white;border-radius:5px;border:5px">Employee TimeSheet</button>
            </div>
            <div class="col">
                <button wire:click="$set('tab', 'empInfo')" style="background-color:  rgb(2, 17, 79);color:white;border-radius:5px;border:5px"> Employee Info</button>
            </div>
        </div>
        @if($tab=="timeSheet")
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
 
                    <h2>Employee Time Sheet</h2>
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
     
        @if($tab=="empInfo")
        <div style="margin-top:10px">
        @if (session()->has('success'))
        <div class="alert alert-success" style="margin-left:20px;height:40px;font-size:12px;">{{ session('success') }}</div>
        @elseif (session()->has('error'))
        <div class="alert alert-danger" style="margin-left:20px;height:40px;font-size:12px">{{ session('error') }}</div>
        @endif
                            </div>
        <div style="display: flex; align-items: center; margin-left: 40px;margin-top:20px">
       
            <h4 style="margin-right: 20px;">Employee Information</h4>
 
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
 
            <h4 style="margin-left:20px">Time Sheet Entry</h4>
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
            <form action="your_action_here.php" method="post">
                <button type="submit" name="current_week" style="margin-left:500px; background:grey;border-radius:5px;border:1px solid black;color:white;font-size:12px">
                    From <?php echo $startDate; ?> to <?php echo $endDate; ?>
                </button>
            </form>
        </div>
 
 
        <!-- Your Blade view - time-sheet-display.blade.php -->
 
        <div>
        @php
    $currentWeekDataExists = false;
    // Check if $weekData contains entries for the current week
    // Assuming $weekData is an array containing data for each day of the week
    foreach ($weekData as $day => $leaveTypes) {
        // Check if the current day is within the current week
        $dayOfWeek = Carbon\Carbon::parse($day)->dayOfWeek;
        if ($dayOfWeek >= 0 && $dayOfWeek <= 6) {
            $currentWeekDataExists = true;
            break;
        }
    }
@endphp
 
@if ($currentWeekDataExists)
    <table class="table">
        <!-- Header -->
        <thead>
            <tr style="font-size: 12px;">
                <th>Leave</th>
                @php
                    $today = now()->startOfWeek(); // Get the start of the current week
                @endphp
 
                @foreach (range(0, 6) as $i)
                    @php
                        $day = $today->format('l'); // Get day name (e.g., Monday)
                        $date = $today->format('d-m-Y'); // Get date (e.g., 01-01-2023)
                        $today->addDay(); // Move to the next day
                    @endphp
                    <th class="day-date">{{ $day }}<br>{{ $date }}</th>
                @endforeach
 
                <th>Total Hours</th>
            </tr>
        </thead>
   
        <!-- Body -->
        <tbody>
            @foreach(['regular', 'sick', 'holiday', 'vacation', 'casual'] as $leaveType)
                <tr>
                    <td>{{ ucfirst($leaveType) }}</td>
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
                        <td>
                            <div class="form-group">
                                <input wire:model="weekData.{{ $day }}.{{ $leaveType }}" wire:change="createTimeSheet('{{ $day }}')" type="number" name="{{ $leaveType }}[{{ $day }}][{{ $leaveType }}]" min="0" max="24" placeholder="0" class="form-control" style="width: 50px; font-size: 10px;" @if($isEntered) readonly @endif>
                            </div>
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
<b style="margin-left:10px">TotalHours :</b>
<input type="number" value="{{ array_sum(array_map(function ($day) use ($leaveTypes) {
    return array_sum(array_intersect_key($day, array_flip($leaveTypes)));
}, $weekData)) }}" min="0" max="24" class="form-control" disabled style="width:60px;height:30px; font-size:10px;">
 </div>
    </td>
 
            <!-- Submit Button -->
 
            <form wire:submit.prevent="updateEntryStatus">
                @csrf
                <button type="submit" wire:loading.attr="disabled" :disabled="$isButtonDisabled"  style="background:green">Update Status</button>
            </form>
 
        </div>
        @endif
        @endif
        <style>
            /* Basic button styles */
 
            table {
                width: 70%;
                border-collapse: collapse;
                font-family: Arial, sans-serif;
                margin-top: 20px;
                /* Top margin */
                margin-bottom: 20px;
                font-size: 10px
                    /* Bottom margin */
            }
 
            th,
            .td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 10px;
            }
 
            th {
 
 
 
                font-weight: bold;
            }
 
            tr:nth-child(even) {
                border: 1px solid #dddddd;
             
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
                padding: 6px;
                /* Adjust this value to reduce the gap */
                font-size: 10px;
                /* Adjust the font size if needed */
            }
 
 
 
            /* Hover effect */
        </style>
 
    </div>