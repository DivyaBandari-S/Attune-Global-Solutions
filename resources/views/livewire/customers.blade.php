<div style="padding:10px">
    <!-- Add this to your HTML file -->
    <style>
        .dropbtn {
            background-color: #04AA6D;
            color: white;
            padding: 8px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 20px;
            margin-top: 20px;
        }

        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #3e8e41;
        }

        #myInput {
            box-sizing: border-box;
            background-image: url('searchicon.png');
            background-position: 14px 12px;
            background-repeat: no-repeat;
            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        #myInput:focus {
            outline: 3px solid #ddd;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f6f6f6;
            min-width: 230px;
            overflow: auto;
            border: 1px solid #ddd;
            z-index: 1;
            margin-left: 20px;
            margin-top: 8px;
            border-radius: 5px;
            border-color: black;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }

        .modal-content {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .modal-backdrop {
            display: none;
            background: rgba(0, 0, 0, 0.5);
            /* Adjust the opacity as needed */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1040;
        }

        .blurred-backdrop {
            filter: blur(5px);
            /* Adjust the blur intensity as needed */
        }

        /* Add your custom CSS styles here */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,

        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 8px;
            /* Set font size to 12px */
        }

        th {
            background-color: #f2f2f2;
            font-size: 8px;

        }

        tr:hover {
            background-color: #f5f5f5;
            font-size: 8px;

        }

        .customer-image {
            border-radius: 2;
            height: 100px;
            width: 300px;
            margin-top: 25px;
            background-color: white;
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .container {
            margin: 0 auto;
            max-width: 100%;
            margin-top: 30px;
        }

        .profile-image,
        .people-image,
        .customer-profile {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 5%;
            border: 1px solid darkgrey;

        }

        .username {
            font-size: 12px;
            color: white;
        }

        .modal {
            display: block;
            overflow-y: auto;
        }

        .modal-dialog {
            margin: 1.75rem auto;
        }

        .modal-header {
            background-color: rgb(2, 17, 79);
            height: 50px;
        }

        .modal-title {
            padding: 5px;
            color: white;
            font-size: 12px;
        }

        .modal-body {
            padding: 1rem;
        }

        form {
            font-size: 12px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 12px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 12px;
        }

        .row {
            margin-right: 0;
            margin-left: 0;
        }

        .customer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            font-size: 12px;
        }

        .customer-card {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .customer-details {
            margin-top: 15px;
        }

        .table {
            width: 100%;
            font-size: 12px;
            font-family: 'Roboto', sans-serif;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            text-align: center;
            width: 100px;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: rgb(2, 17, 79);
            color: white;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 123, 255, 0.05);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }

        .button {
            background-color: rgb(2, 17, 79);
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            padding: 3px;
            transition: background-color 0.3s ease-in-out;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
        }

        .alert {
            height: 40px;
            width: 100%;
            text-align: center;
            align-items: center;
            justify-content: center;
            display: flex;
        }

        /* //REGISTRATION POP UP STYLES */
        .employee-details .form-group {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .employee-details .input-group {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .employee-details .form-group label {
            font-weight: 500;
            color: #5f6c79;
            margin-bottom: 10px;
        }

        .employee-details .form-group .form-control {
            height: 28px;
            font-size: 0.795rem;
            margin-bottom: 10px;
        }

        a:hover {
            color: green;
        }

        .emp {
            display: flex;
            flex-direction: column;
            padding: 5px;
            justify-content: space-between;
            margin: 0 auto;
            gap: 7px;
        }

        .employee-details {
            border: 1px solid #ccc;
            padding: 5px 10px;
            font-size: 0.785rem;
            border-radius: 10px;
            background: #fff;
        }

        .employee-details h5 {
            font-weight: 400;
            font-size: 0.905rem;
            color: rgb(2, 17, 79);
        }

        .alert-container {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border-radius: 5px;
            text-align: center;
            display: none;
            /* Initially hide the container */
        }

        .close-btn {
            cursor: pointer;
            float: right;
            font-weight: bold;
            font-size: 18px;
        }

        .close-btn:hover {
            color: #fff;
            /* Change color on hover */
        }

        .view-button {
            background-color: rgb(2, 17, 79);
            color: white;
            border-radius: 7px;
            border: none;
            cursor: pointer;
            margin-left: 10px;
            padding: 4px 10px;
            font-size: 0.825rem;
            transition: background-color 0.3s ease-in-out;
        }

        .view-button:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .placeholder-small::placeholder {
            font-size: 0.625rem;
            /* Adjust the font size as needed */
            color: #bfc3c7;
            /* Muted color */
        }

        .btn-save {
            background-color: #007bff;
            /* Change to your desired color */
            color: #fff;
            /* Change to your desired color */
        }

        /* Custom CSS classes for the "Loading" text */
        .text-loading {
            color: #ff9900;
            /* 
            Change to your desired color */
        }

        .form-check {
            width: 25px;
            /* Adjust the width as needed */
            height: 25px;
        }
    </style>

    <div style="text-align: start;">
        <button style="margin-right: 5px; font-size: 13px; background-color: #02114f;" wire:click="open" class="btn btn-primary">ADD Customers</button>
        <button style="margin-right: 5px; font-size: 13px; background-color: #02114f;" wire:click="addSO" class="btn btn-primary">ADD SO</button>
    </div>
    @if(session()->has('success'))
    <div id="successAlert" style="text-align: center;" class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif(session()->has('sales-order'))
    <div id="salesOrderAlert" style="text-align: center;" class="alert alert-success">
        {{ session('sales-order') }}
    </div>
    @endif
    <script>
        setTimeout(function() {
            document.getElementById('successAlert').style.display = 'none';
            document.getElementById('salesOrderAlert').style.display = 'none';
        }, 5000);
    </script>
    <div class="row">

        @php
        $selectedPerson = $selectedCustomer ?? $customers->first();
        $isActive = $selectedPerson->status == 'active';
        @endphp
        <div class="col-md-3  rounded mt-2 " style="background-color: #f2f2f2;margin-right:5px;">
            <img style="height: 160px; width:-webkit-fill-available; border-radius: 8px;" src="data:image/jpeg;base64,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" alt="">
        </div>
        <div class="col-md-8 rounded mt-2" style="background-color: #f2f2f2; padding: 8px">
            <p style="text-align: start">
                <button style="margin-right: 10px;" wire:click="editCustomers('{{$selectedPerson->id}}')" class="rounded btn-outline-primary p-1 float-end">Edit</button>
            </p>
            @if ($selectedCustomer)

            <div class="row" style="font-size: 13px;">
                <div class="row">
                    @php
                    $selectedPerson = $selectedCustomer ?? $customers->first();
                    $isActive = $selectedPerson->status == 'active';
                    @endphp
                    <div class="col">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1;">

                                <h2 style="font-size: 12px;"><strong>Customer Name</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->customer_company_name }}</p>

                                <h2 style="font-size: 12px;"><strong>Customer ID</strong></h2>
                                <p style="font-size: 12px;">(#{{ optional($selectedPerson)->customer_id }})</p>
                            </div>

                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 12px;"><strong>Address</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->address }}</p>

                                <h2 style="font-size: 12px;"><strong>Email</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->email }}</p>
                            </div>
                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 12px;"><strong>Contact Name</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->customer_name }}</p>
                                <h2 style="font-size: 12px;"><strong>Contact Phone</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->phone }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @elseif (!$customers->isEmpty())


            <!-- Display details of the first person in the list -->
            @php
            $firstPerson = $customers->first();
            $starredPerson = DB::table('customer_details')
            ->where('customer_id', $firstPerson->customer_id)
            ->first();
            @endphp

            <div class="row" style="font-size: 13px;">
                <div class="row">
                    <div class="col">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1;">
                                <h2 style="font-size: 10px;"><strong>Customer Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->customer_company_name }}</p>

                                <h2 style="font-size: 10px;"><strong>Customer ID</strong></h2>
                                <p style="font-size: 10px;">(#{{ optional($firstPerson)->customer_id }})</p>

                            </div>

                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 10px;"><strong>Address</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->address }}</p>

                                <h2 style="font-size: 10px;"><strong>Email</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->email }}</p>

                            </div>
                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 10px;"><strong>Contact Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->customer_name }}</p>
                                <h2 style="font-size: 10px;"><strong>Contact Phone</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->phone }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
    <!-- modal -->
    @if($regForm=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Employee Details</b></h5>
                    <button wire:click="regClose" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="regClose">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-header" style="background-color: #00234f;padding:7px;width:35%;margin-left:30%; border-radius:20px;">
                        <h5 class="mb-0" style="text-align: center;color:white;font-size:0.955rem;">Employee Registration Form</h5>
                    </div>
                    <form wire:submit.prevent="register" enctype="multipart/form-data">
                        <div class="reg-form" style="display:flex;padding:0; margin:0;">
                            <div class="col-md-6">
                                <div class="emp">
                                    <div class=" employee-details">
                                        <div style="margin:5px 0 20px 0;">
                                            <h5>Employee Details</h5>
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">First Name <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" wire:model="first_name" placeholder="Enter first name">
                                            @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="last_name">Last Name <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter last name" wire:model="last_name" style="margin-bottom:10px;;">
                                            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile_number">Phone Number <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter phone number" wire:model="mobile_number" style="margin-bottom:10px;;">
                                            @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alternate_mobile_number">Alternate Phone Number <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter alternate phone number" wire:model="alternate_mobile_number" style="margin-bottom:10px;;">
                                            @error('alternate_mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="education">Education <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter education details" wire:model="education" style="margin-bottom:10px;;">
                                            @error('education') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="experience">Experience :</label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter experience" wire:model="experience" style="margin-bottom:10px;;">
                                            @error('experience') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger"> *</span></label>
                                            <input type="email" class="form-control placeholder-small" placeholder="Enter email" wire:model="email" style="margin-bottom:10px;;">
                                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Company Email <span class="text-danger"> *</span></label>
                                            <input type="email" class="form-control placeholder-small" placeholder="Enter company email" wire:model="company_email" style="margin-bottom:10px;;">
                                            @error('company_email') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="adhar_no">Aadhar Number :</label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter adhar number" wire:model="adhar_no" style="margin-bottom:10px;;">
                                            @error('adhar_no') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group">
                                            <label for="password">Password <span class="text-danger"> *</span></label>
                                            <input type="password" class="form-control placeholder-small" placeholder="Enter password" wire:model="password" style="margin-bottom:10px;;">
                                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="group" style="display:flex;wrap:nowrap; gap:20px;margin-bottom:10px;">
                                                <label style="margin-top:5px;">Gender <span class="text-danger"> *</span>:</label><br>
                                                <div style="display:flex; align-items:start;gap:20px;margin-left:10px;margin-top:2px;">
                                                    <div class="form-check form-check-inline" style="display:flex;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="gender" value="Male" id="maleRadio" name="gender">
                                                        <label class="form-check-label" for="maleRadio" style="margin-top:5px;">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="display:flex;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="gender" value="Female" id="femaleRadio" name="gender">
                                                        <label class="form-check-label" for="femaleRadio" style="margin-top:5px;">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="employee-details">
                                        <div style="margin:5px 0 20px 0">
                                            <h5>Job Details</h5>
                                        </div>

                                        <div class="form-group">
                                            <label for="hire_date">Hire Date <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" wire:model="hire_date" x-data x-init="initDatepicker($refs.hire_date, 'M-d-Y')" x-ref="hire_date" style="font-size: 12px;" placeholder="Enter hire date....">
                                            @error('hire_date') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <!-- ... (other properties) ... -->
                                        <div class="form-group">
                                            <label for="department">Department <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter department" wire:model="department" style="margin-bottom:10px;;">
                                            @error('department') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="job_title">Job Title <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter job title" wire:model="job_title" style="margin-bottom:10px;;">
                                            @error('job_title') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="loction">Job Location <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter job location" wire:model="job_location" style="margin-bottom:10px;;">
                                            @error('job_location') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="company_name">Company Name <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter company name" wire:model="company_name" style="margin-bottom:10px;;">
                                            @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="company_id">Company ID <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter company Id" wire:model="company_id" style="margin-bottom:10px;;">
                                            @error('company_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="manager_id">Manager Id <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter manager Id" wire:model="manager_id" style="margin-bottom:10px;;">
                                            @error('manager_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="report_to">Report To <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter reporting manager name" wire:model="report_to" style="margin-bottom:10px;;">
                                            @error('report_to') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="group" style="display:flex;wrap:nowrap; gap:10px;margin-top:15px;">
                                                <label for="employee_type" style="margin-top:5px;">Employee Type <span class="text-danger"> *</span></label>
                                                <div style="display:flex; align-items:start;gap:10px;  margin-left:10px;margin-top:2px;">
                                                    <div class="gender" style="display:flex;wrap:nowrap;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="employee_type" wire:change="employeeCall" value="full-time" id="full-timeRadio" name="employee_type" style="height:12px;width:12px;">
                                                        <label class="form-check-label" for="full-timeRadio" style="margin-top:4px;">Full Time</label>
                                                    </div>
                                                    <div class="gender" style="display:flex;wrap:nowrap;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="employee_type" wire:change="employeeCall" value="part-time" id="part-timeRadio" name="employee_type" style="height:12px;width:12px;">
                                                        <label class="form-check-label" for="part-timeRadio" style="margin-top:4px;">Part Time</label>
                                                    </div>
                                                    <div class="gender" style="display:flex;wrap:nowrap;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="employee_type" wire:change="employeeCall" value="contract" id="contractRadio" name="employee_type" style="height:12px;width:12px;">
                                                        <label class="form-check-label" for="contractRadio" style="margin-top:4px;">Contract</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('employee_type') <span class="text-danger">{{ $message }}</span> @enderror

                                            @if($showContractorField)
                                            <div class="form-group">
                                                <label for="contractor_company_id">Contractor Company ID <span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="contractor_company_id" wire:model="contractor_company_id">
                                                @error('contractor_company_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="group" style="display:flex;wrap:nowrap; gap:10px;margin-top:15px;">
                                                <label for="employee_status" style="margin-top:5px;">Employee Status <span class="text-danger"> *</span></label>
                                                <div style="display:flex; align-items:start;gap:10px;margin-left:10px;margin-top:2px;">
                                                    <div class="gender" style="display:flex;wrap:nowrap;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="employee_status" value="active" id="activeRadio" name="employee_status" style="height:12px;width:12px;">
                                                        <label class="form-check-label" for="activeRadio" style="margin-top:4px;">Active</label>
                                                    </div>
                                                    <div class="gender" style="display:flex;wrap:nowrap;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="employee_status" value="on-leave" id="on-leaveRadio" name="employee_status" style="height:12px;width:12px;">
                                                        <label class="form-check-label" for="on-leaveRadio" style="margin-top:4px;">On-Leave</label>
                                                    </div>
                                                    <div class="gender" style="display:flex;wrap:nowrap;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="employee_status" value="terminated" id="terminatedRadio" name="employee_status" style="height:12px;width:12px;">
                                                        <label class="form-check-label" for="terminatedRadio" style="margin-top:4px;">Terminated</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('employee_status') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="group" style="display:flex;wrap:nowrap; gap:20px;margin-top:15px;">
                                                <label style="margin-top:5px;">International Employee <span class="text-danger"> *</span></label>
                                                <div class="gender" style="display:flex;wrap:nowrap;gap:5px;">
                                                    <input class="form-check" type="radio" wire:model="inter_emp" value="yes" id="yesRadio" name="inter_emp" style="height:12px;width:12px;">
                                                    <label class="form-check-label" style="margin-top:5px;" for="yesRadio">Yes</label>
                                                </div>
                                                <div class="gender" style="display:flex;wrap:nowrap;gap:5px;">
                                                    <input class="form-check" type="radio" wire:model="inter_emp" value="no" id="noRadio" name="inter_emp" style="height:12px;width:12px;">
                                                    <label class="form-check-label" style="margin-top:5px;" for="noRadio">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @error('inter_emp') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="emp">
                                    <div class="employee-details">
                                        <div style="margin:5px 0 20px 0">
                                            <h5>Employee Address</h5>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter employee address" wire:model="address" style="margin-bottom:10px;">
                                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter city" wire:model="city" style="margin-bottom:10px;">
                                            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="state">State <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter state name" wire:model="state" style="margin-bottom:10px;">
                                            @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="postal_code">Pin Code <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter pincode" wire:model="postal_code" style="margin-bottom:10px;">
                                            @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter country name" wire:model="country" style="margin-bottom:10px;">
                                            @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="employee-details">
                                        <div style="margin:5px 0 20px 0">
                                            <h5>Employee Personal Details</h5>
                                        </div>

                                        <div class="form-group">
                                            <label for="date_of_birth">Date of Birth <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter date of birth" wire:model="date_of_birth" x-data x-init="initDatepicker($refs.date_of_birth, 'M-d-Y')" x-ref="date_of_birth" style="font-size: 12px;margin-bottom:10px;">
                                            @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="blood_group">Blood Group <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter blood group type" wire:model="blood_group" style="margin-bottom:10px;">
                                            @error('blood_group') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="religion">Religion <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter religion" wire:model="religion" style="margin-bottom:10px;">
                                            @error('religion') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nationality">Nationality <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter natinality" wire:model="nationality" style="margin-bottom:10px;">
                                            @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="group" style="display:flex;wrap:nowrap; gap:20px;">
                                                <label style="margin-top:5px;">Martial Status <span class="text-danger"> *</span>:</label><br>
                                                <div style="display:flex; align-items:start;gap:20px;margin-left:10px;margin-top:2px;">
                                                    <div class="gender" style="display:flex;wrap:nowrap;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="marital_status" wire:change="marriedStatus" value="unmarried" id="unmarriedRadio" name="marital_status_group" style="height:12px;width:12px;">
                                                        <label class="form-check-label" for="unmarriedRadio" style="margin-top:3px;">Unmarried</label>
                                                    </div>
                                                    <div class="gender" style="display:flex;wrap:nowrap;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="marital_status" wire:change="marriedStatus" value="married" id="marriedRadio" name="marital_status_group" style="height:12px;width:12px;">
                                                        <label class="form-check-label" for="marriedRadio" style="margin-top:3px;">Married</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @error('marital_status') <span class="text-danger">{{ $message }}</span> @enderror
                                            @if($showSpouseField)
                                            <div class="form-group">
                                                <label for="spouse">Spouse :</label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter spouse name" id="spouse" wire:model="spouse">
                                                @error('spouse') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="group" style="display:flex;wrap:nowrap; gap:20px;margin:10px 0;">
                                                <label>Physically Challenge <span class="text-danger"> *</span></label><br>
                                                <div style="display:flex; align-items:start;gap:20px;">
                                                    <div class="form-check form-check-inline" style="display:flex;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="physically_challenge" value="Yes" id="yesRadio" name="physically_challenge_group" style="height:12px;width:12px;">
                                                        <label style="margin-top:3px;" class="form-check-label" for="yesRadio">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="display:flex;gap:5px;">
                                                        <input class="form-check" type="radio" wire:model="physically_challenge" value="No" id="noRadio" name="physically_challenge_group" style="height:12px;width:12px;">
                                                        <label class="form-check-label" for="noRadio" style="margin-top:3px;">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @error('physically_challenge') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                    <div class="employee-details">
                                        <div style="margin:5px 0 20px 0">
                                            <h5>Other Details</h5>
                                        </div>
                                        <div class="form-group">
                                            <label for="nick_name">Nick Name :</label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter nick name" wire:model="nick_name" style="margin-bottom:10px;">
                                            @error('nick_name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="emergency_contact">Emergency Contact :</label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter emergency phone number" wire:model="emergency_contact" style="margin-bottom:10px;">
                                            @error('emergency_contact') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="time_zone">Time Zone :</label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter time zone" wire:model="time_zone" style="margin-bottom:10px;">
                                            @error('time_zone') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pf_no">PF Number :</label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter PF number" wire:model="pf_no" style="margin-bottom:10px;">
                                            @error('pf_no') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pan_no">Pan Number :</label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter PAN number" wire:model="pan_no" style="margin-bottom:10px;">
                                            @error('pan_no') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="biography">Biography :</label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter biography" wire:model="biography" style="margin-bottom:10px;">
                                            @error('biography') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="facebook">Facebook :</label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter your facebook URL" wire:model="facebook" style="margin-bottom:10px;">
                                            @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="linked_in">LinkedIn :</label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter your LinkedIn URL" wire:model="linked_in" style="margin-bottom:10px;">
                                            @error('linked_in') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="twitter">Twitter :</label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter your twitter URL" wire:model="twitter" style="margin-bottom:10px;">
                                            @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="skill_set">Skill Set<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Example UI developer" wire:model="skill_set" style="margin-bottom:10px;">
                                            @error('skill_set') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center; margin-top:20px;">
                            <!-- Your Livewire component content -->
                            <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">Save</button>
                            <p wire:loading></p>
                            <p wire:loading.remove></p>
                        </div>
                        <div wire:debug></div>
                        <style>
                            button[wire\:loading] {
                                opacity: 0.5;
                                /* Reduce opacity during loading */
                                cursor: not-allowed;
                                /* Change cursor during loading */
                            }

                            p {
                                color: green;
                                font-weight: bold;
                            }
                        </style>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal-backdrop fade show blurred-backdrop"></div>
    @endif
    <!-- model end -->


    @if($show=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Customers Details</b></h5>
                    <button wire:click="close" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addCustomers">




                        <div>
                            <label for="customer_company_name" style="font-size: 12px;">Customer Name:</label>
                            <input type="text" wire:model="customer_company_name">
                            @error('customer_company_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="customer_name" style="font-size: 12px;">Contact Name:</label>
                            <input type="text" wire:model="customer_name">
                            @error('customer_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" style="font-size: 12px;">Email:</label>
                            <input type="email" wire:model="email">
                            @error('email') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="phone" style="font-size: 12px;">Phone:</label>
                            <input type="text" wire:model="phone">
                            @error('phone') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="address" style="font-size: 12px;">Address:</label>
                            <textarea wire:model="address"></textarea>
                            @error('address') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="notes" style="font-size: 12px;">Notes:</label>
                            <textarea wire:model="notes"></textarea>
                            @error('notes') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                            <button style="margin-left: 5%; font-size: 12px;" class="btn btn-success me-2" type="submit">Submit</button>
                            <button class="btn btn-danger" wire:click="close" type="button" style="font-size: 12px;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modalBackdrop" class="modal-backdrop fade show"></div>

    @endif


    @if($customer=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Customers Details</b></h5>
                    <button wire:click="cCustomer" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addcCustomers">

                        <div>
                            <label for="customer_company_name" style="font-size: 12px;">Customer Name:</label>
                            <input type="text" wire:model="customer_company_name">
                            @error('customer_company_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="customer_name" style="font-size: 12px;">Contact Name:</label>
                            <input type="text" wire:model="customer_name">
                            @error('customer_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" style="font-size: 12px;">Email:</label>
                            <input type="email" wire:model="email">
                            @error('email') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="phone" style="font-size: 12px;">Phone:</label>
                            <input type="text" wire:model="phone">
                            @error('phone') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="address" style="font-size: 12px;">Address:</label>
                            <textarea wire:model="address"></textarea>
                            @error('address') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="notes" style="font-size: 12px;">Notes:</label>
                            <textarea wire:model="notes"></textarea>
                            @error('notes') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                            <button style="margin-left: 5%; font-size: 12px;" class="btn btn-success me-2" type="submit">Submit</button>
                            <button class="btn btn-danger" wire:click="cCustomer" type="button" style="font-size: 12px;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modalBackdrop" class="modal-backdrop fade show"></div>

    @endif

    @if($edit=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>Edit Customers Details</b></h5>
                    <button wire:click="closeEdit" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateCustomers">



                        <div>
                            <label for="customer_company_name" style="font-size: 12px;">Customer Name:</label>
                            <input type="text" wire:model="customer_company_name">
                            @error('customer_company_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_name" style="font-size: 12px;">Contact Name:</label>
                            <input type="text" wire:model="customer_name">
                            @error('customer_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" style="font-size: 12px;">Email:</label>
                            <input type="email" wire:model="email">
                            @error('email') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="phone" style="font-size: 12px;">Phone:</label>
                            <input type="text" wire:model="phone">
                            @error('phone') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="address" style="font-size: 12px;">Address:</label>
                            <textarea wire:model="address"></textarea>
                            @error('address') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="notes" style="font-size: 12px;">Notes:</label>
                            <textarea wire:model="notes"></textarea>
                            @error('notes') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                            <button style="margin-left: 5%; font-size: 12px;" class="btn btn-success me-2" type="submit">Update</button>
                            <button class="btn btn-danger" wire:click="closeEdit" type="button" style="font-size: 12px;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modalBackdrop" class="modal-backdrop fade show"></div>


    @endif







    @if($so=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Sales Order</b></h5>
                    <button wire:click="cancelSO" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <style>
                            .form-group {
                                margin-bottom: 10px;
                            }
                        </style>
                        <form wire:submit.prevent="saveSalesOrder">
                            @csrf


                            <div class="form-group">
                                <label style="font-size: 12px;" for="vendorName">Consultant Name:</label>
                                <select wire:change="selectedConsultantId" style="font-size: 12px;" class="form-control" id="vendorName" wire:model="consultant_name">
                                    <option style="font-size: 12px;" value="">Select Consultant</option>
                                    <option style="font-size: 12px;" value="addConsultant">
                                        << Add Consultant>>
                                    </option>
                                    @foreach($employees as $employee)
                                    <option style="font-size: 12px;text-transform: capitalize" value="{{ $employee->emp_id }}">{{ $employee->first_name }} {{ $employee->last_name }} ({{ $employee->employee_type }})</option>

                                    @endforeach

                                </select>
                                @error('consultant_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>




                            <div class="row mb-2">
                                <div class="col p-0">
                                    <label style="font-size: 12px;" for="start_date">Start Date:</label>
                                    <input style="font-size: 12px;" id="startDate" type="text" wire:model="startDate" x-data x-init="initDatepicker($refs.startDate, 'M-d-Y')" x-ref="startDate" class="form-control">
                                </div> <br>
                                @error('startDate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                <div class="col">
                                    <label style="font-size: 12px;" for="end_date">End Date:</label>
                                    <input id="endDate" style="font-size: 12px;" type="text" wire:model="endDate" x-data x-init="initDatepicker($refs.endDate, 'M-d-Y')" x-ref="endDate" class="form-control">

                                </div> <br>
                                @error('endDate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                            </div>


                            <div class="form-group">
                                <label style="font-size: 12px;" for="rate">Rate:</label>
                                <div class="input-group">
                                    <input style="font-size: 12px;" type="number" class="form-control" id="rate" wire:model="rate">
                                    @error('rate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                    <select style="font-size: 12px;" class="form-control" id="rateType" wire:model="rateType">
                                        <option style="font-size: 12px;">Select Rate Type</option>
                                        <option style="font-size: 12px;" value="Hourly">Per Hour</option>
                                        <option style="font-size: 12px;" value="Daily">Per Day</option>
                                        <option style="font-size: 12px;" value="Weekly">Per Week</option>
                                        <option style="font-size: 12px;" value="Monthly">Per Month</option>
                                    </select>
                                    @error('rateType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>
                            </div>



                            <div class="form-group">
                                <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Customer Name:</label>
                                <select wire:change="callCustomer" style="font-size: 12px;" class="form-control" id="vendorName" wire:model="customerName">
                                    <option style="font-size: 12px;" value="">Select Customer</option>
                                    <option style="font-size: 12px;" value="AddCustomer">
                                        << Add Customer>>
                                    </option>
                                    @foreach($customers as $customer)
                                    <option style="font-size: 12px;" value="{{ $customer->customer_id }}">{{ $customer->customer_company_name }}</option>
                                    @endforeach

                                </select>
                                @error('customerName') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>



                            <div class="form-group">
                                <label style="font-size: 12px;" for="endClientTimesheetRequired">End Client Time sheet required:</label>
                                <select style="font-size: 12px;" class="form-control" id="endClientTimesheetRequired" wire:model="endClientTimesheetRequired">
                                    <option style="font-size: 12px;">Select required or not</option>
                                    <option style="font-size: 12px;" value="Required">Required</option>
                                    <option style="font-size: 12px;" value="Not required">Not Required</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('endClientTimesheetRequired') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div class="row">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label style="font-size: 12px;" for="timeSheetType">Time Sheet Type:</label>
                                        <select style="font-size: 12px;" class="form-control" id="timeSheetType" wire:model="timeSheetType">
                                            <option style="font-size: 12px;">Select Time Sheet Type</option>
                                            <option style="font-size: 12px;" value="Weekly">Weekly</option>
                                            <option style="font-size: 12px;" value="Semi-Monthly">Semi Monthly</option>
                                            <option style="font-size: 12px;" value="Monthly">Monthly</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                        @error('timeSheetType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size: 12px;" for="timeSheetBegins">Time Sheet Begins:</label>
                                        <select style="font-size: 12px;" class="form-control" id="timeSheetBegins" wire:model="timeSheetBegins">
                                            <option style="font-size: 12px;">Select Time Sheet Begins</option>
                                            <option style="font-size: 12px;" value="Mon-Sun">Monday to Sunday</option>
                                            <option style="font-size: 12px;" value="Sun-Sat">Sunday to Saturday</option>
                                            <option style="font-size: 12px;" value="Sat-Fri">Saturday to Friday</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                        @error('timeSheetBegins') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;" for="invoiceType">Invoice Type:</label>
                                <select style="font-size: 12px;" class="form-control" id="invoiceType" wire:model="invoiceType">
                                    <option style="font-size: 12px;">Select Invoice Type</option>
                                    <option style="font-size: 12px;" value="Hourly">Hourly</option>
                                    <option style="font-size: 12px;" value="Daily">Daily</option>
                                    <option style="font-size: 12px;" value="Weekly">Weekly</option>
                                    <option style="font-size: 12px;" value="Monthly">Monthly</option>
                                    <option style="font-size: 12px;" value="Project">Project-Based</option>
                                    <option style="font-size: 12px;" value="Custom">Custom</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('invoiceType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>


                            <div class="form-group">
                                <label style="font-size: 12px;" for="invoiceType">Payment Net Terms:</label>
                                <select style="font-size: 12px;" class="form-control" id="invoiceType" wire:model="paymentTerms">
                                    <option style="font-size: 12px;">Select payment net terms</option>
                                    <option style="font-size: 12px;" value="Net 0">Net 0</option>
                                    <option style="font-size: 12px;" value="Net 15">Net 15</option>
                                    <option style="font-size: 12px;" value="Net 0">Net 30</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('paymentTerms') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>
                            <div style="text-align: center;">
                                <button style="margin-top: 15px;font-size:12px" type="submit" class="btn btn-success">Submit Sales Order</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalBackdrop" class="modal-backdrop fade show"></div>
    @endif






    <div class="row">
        <div class="col-md-3 rounded mt-2" style="background-color:#f2f2f2; padding: 5px; max-height:300px;overflow-y:auto">
            <div class="container" style="margin-top: 8px;margin-bottom:8px">
                <div class="row">
                    <div class="col" style="margin: 0px; padding: 0px">
                        <div class="input-group">
                            <input wire:model="searchTerm" style="font-size: 10px; cursor: pointer; border-radius: 5px 0 0 5px;" type="text" class="form-control" placeholder="Search for customers" aria-label="Search" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button wire:click="filter" style="height: 30px; border-radius: 0 5px 5px 0; background-color: #007BFF; color: #fff; border: none;" class="btn" type="button">
                                    <i style="text-align: center;" class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-2" style="font-size: 13px">
                @if ($allCustomers->isEmpty())
                <div class="container" style="text-align: center; color: gray;">No Customers Found</div>
                @else
                @foreach($allCustomers as $customer)
                <div wire:click="selectCustomer('{{ $customer->customer_id }}')" class="container-11" style="margin-bottom:8px;cursor: pointer; background-color: {{ $selectedCustomer && $selectedCustomer->customer_id == $customer->customer_id ? '#ccc' : 'white' }}; width: 500px; border-radius: 5px;padding:5px;">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <h6 class="username" style="font-size: 10px; color: black;text-transform:capitalize">{{ $customer->customer_company_name }}</h6>
                        </div>
                        <div class="col-md-4 pe-0">
                            <h6 class="username" style="font-size: 8px; color: black;">{{ $customer->phone }}</h6>
                        </div>
                        <div class="col-md-4 pe-0">
                            <h6 class="username" style="font-size: 8px; color: black;">#({{ $customer->customer_id }})</h6>
                        </div>

                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- Details of the selected person -->
        <div class="col-md-8 rounded mt-2 ms-1" style="background-color: #f2f2f2; padding: 5px;max-height:300px;overflow-y:auto">
            @php
            $selectedPerson = $selectedCustomer ?? $customers->first();
            $isActive = $selectedPerson->status == 'active';
            @endphp
            <div style="text-align: start;margin-bottom:0%" class="p-2">
                <button class="p-2 mb-2" wire:click="showInvoices('{{$selectedPerson->customer_id}}')" style="{{ $activeButton === 'Invoices' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 5px; border-radius: 5px; border: none;">
                    Invoices & Payments
                </button>

                <button class="p-2 mb-2" wire:click="updateAndShowSoList('{{$selectedPerson->customer_id}}')" style="{{ $activeButton === 'SO' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 5px; border-radius: 5px; border: none;">
                    SO
                </button>

                <button class="p-2 mb-2" wire:click="$set('activeButton', 'EmailActivities')" style="{{ $activeButton === 'EmailActivities' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }}margin-right: 5px; border-radius: 5px; border: none;">
                    Email Activities
                </button>
                <button class="p-2 mb-2" wire:click="$set('activeButton', 'Notes')" style="{{ $activeButton === 'Notes' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }}margin-right: 5px; border-radius: 5px; border: none;">
                    Notes
                </button>
                <button class="p-2 mb-2" wire:click="$set('activeButton', 'Contacts')" style="{{ $activeButton === 'Contacts' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }}margin-right: 5px; border-radius: 5px; border: none;">
                    Contacts
                </button>

            </div>
            @if($activeButton=="SO")

            <!-- resources/views/livewire/purchase-order-table.blade.php -->
            @if($showSOLists)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>SO Number</th>
                            <th>Customer Name</th>
                            <th>Consultant Name</th>
                            <th>Bill Rate</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Time Sheet Type</th>
                            <th>Invoice Type</th>
                            <th>Payment Terms</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($showSOLists as $salesOrder)
                        <tr>
                            <td>{{ $salesOrder->created_at->format('M-d-Y') }}</td>
                            <td>SO</td>
                            <td>{{ $salesOrder->so_number }}</td>
                            <td style="text-transform: capitalize;">{{ $salesOrder->cus->customer_company_name }}</td>
                            <td>{{ $salesOrder->emp->first_name }} {{ $salesOrder->emp->last_name }}</td>
                            <td>$ {{ number_format($salesOrder->rate, 2) }} / {{ $salesOrder->rate_type }}</td>
                            <td>{{ \Carbon\Carbon::parse($salesOrder->start_date)->format('M-d-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($salesOrder->end_date)->format('M-d-Y') }}</td>
                            <td>{{ $salesOrder->time_sheet_type }}</td>
                            <td>{{ $salesOrder->invoice_type }}</td>
                            <td>{{ $salesOrder->payment_terms }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" style="text-align: center;">SalesOrders Not Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>SO Number</th>
                            <th>Customer Name</th>
                            <th>Consultant Name</th>
                            <th>Bill Rate</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Time Sheet Type</th>
                            <th>Invoice Type</th>
                            <th>Payment Terms</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($showSOListFirst)
                        <tr>
                            <td>{{ $showSOListFirst->created_at->format('M-d-Y') }}</td>
                            <td>SO</td>
                            <td>{{ $showSOListFirst->so_number }}</td>
                            <td>{{ $showSOListFirst->cus->customer_company_name }}</td>
                            <td>{{ $showSOListFirst->emp->first_name }} {{ $showSOListFirst->emp->last_name }}</td>
                            <td>$ {{ number_format($showSOListFirst->rate, 2) }} / {{ $showSOListFirst->rate_type }}</td>
                            <td>{{ \Carbon\Carbon::parse($showSOListFirst->start_date)->format('M-d-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($showSOListFirst->end_date)->format('M-d-Y') }}</td>
                            <td>{{ $showSOListFirst->time_sheet_type }}</td>
                            <td>{{ $showSOListFirst->invoice_type }}</td>
                            <td>{{ $showSOListFirst->payment_terms }}</td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="11" style="text-align: center;">SalesOrders Not Found</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>

            @endif
            @endif
            @if($activeButton=="Invoices")
            @if($invoices)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>No</th>
                            <th>Consultant Name</th>
                            <th>Customer Name</th>
                            <th>Hrs/Days</th>
                            <th>Rate</th>
                            <th>Period</th>
                            <th>Amount</th>
                            <th>Open Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($invoices as $bill)
                        <tr>
                            <td>{{ $bill->created_at->format('M-d-Y') }}</td>
                            <td>{{ $bill->type }}</td>
                            <td>{{ $bill->invoice_number }}</td>
                            <td>{{ $bill->emp->first_name }} {{ $bill->emp->last_name }}</td>
                            <td>{{ $bill->customer->customer_company_name }}</td>
                            <td>{{ $bill->hrs_or_days }}</td>
                            <td>$ {{ number_format($bill->rate, 2) }} / {{ $bill->rate_type }}</td>
                            <td>{{ $bill->period}}</td>
                            <td>$ {{ number_format($bill->amount, 2) }}</td>
                            <td>$ {{ number_format($bill->open_balance, 2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" style="text-align: center;">Invoices Not Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>No</th>
                            <th>Consultant Name</th>
                            <th>Customer Name</th>
                            <th>Hrs/Days</th>
                            <th>Rate</th>
                            <th>Period</th>
                            <th>Amount</th>
                            <th>Open Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($invoicess)
                        <tr>
                            <td>{{ $invoicess->created_at->format('M-d-Y') }}</td>
                            <td>{{ $invoicess->type }}</td>
                            <td>{{ $invoicess->invoice_number }}</td>
                            <td>{{ $invoicess->emp->first_name }} {{ $invoicess->emp->last_name }}</td>
                            <td>{{ $invoicess->customer->customer_company_name }}</td>
                            <td>{{ $invoicess->hrs_or_days }}</td>
                            <td>$ {{ number_format($invoicess->rate, 2) }} / {{ $invoicess->rate_type }}</td>
                            <td>{{ $invoicess->period}}</td>
                            <td>$ {{ number_format($invoicess->amount, 2) }}</td>
                            <td>$ {{ number_format($invoicess->open_balance, 2) }}</td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="10" style="text-align: center;">Invoices Not Found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            @endif
            @endif

        </div>
    </div>
    <!-- End of Everyone tab content -->
</div>


<script>
    function initDatepicker(el, format) {
        flatpickr(el, {
            dateFormat: format,
        });
    }

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function selectCustomer(customerId, customerName) {
        // You can use customerId and customerName as needed
        // For demonstration, let's assume you have a Livewire method called setSelectedCustomer
        @this.set('selectedCustomerId', customerId);
        @this.set('selectedCustomerName', customerName);

        // Update the button text with the selected customer's name
        document.getElementById("selectedCustomerButton").innerText = customerName;

        // Optionally, close the dropdown after selecting
        document.getElementById("myDropdown").classList.remove("show");
    }

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

    document.getElementById("searchInput").addEventListener("input", filterFunction);
</script>