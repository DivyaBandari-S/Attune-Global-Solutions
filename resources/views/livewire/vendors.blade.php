<div style="padding:10px">

    <!-- Add this to your HTML file -->
    <style>
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
            width: 20%;
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
         .form-group{
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}
.input-group{
    display:flex;
    flex-direction:row;
    justify-content:space-between;
    align-items:center;
    margin-top:10px;
    margin-bottom:10px;
}
.form-group label{
    font-weight: 500;
    color:#5f6c79;
    margin-bottom:10px;
}
.form-group .form-control {
 height:28px;
 font-size:0.795rem;
 margin-bottom:10px;
}
.placeholder-small{
    font-size:0.775rem;
    color:#778899;
}
a:hover{
    color:green;
}
.emp{
    display:flex;
    flex-direction:column;
    padding:5px;
    justify-content:space-between;
    margin:0 auto;
    gap:7px;
}
.employee-details{
    border:1px solid #ccc;
    padding:5px 10px;
    font-size:0.785rem;
    border-radius:10px;
    background:#fff;
}

.employee-details h5{
   font-weight:400;
   font-size:0.905rem;
   color:rgb(2, 17, 79);
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
    display: none; /* Initially hide the container */
}

.close-btn {
    cursor: pointer;
    float: right;
    font-weight: bold;
    font-size: 18px;
}

.close-btn:hover {
    color: #fff; /* Change color on hover */
}
.view-button {
            background-color: rgb(2, 17, 79);
            color: white;
            border-radius: 7px;
            border: none;
            cursor: pointer;
            margin-left:10px;
            padding:4px 10px;
            font-size:0.825rem;
            transition: background-color 0.3s ease-in-out;
        }

        .view-button:hover {
            background-color: #0056b3;
            color:#fff;
        }
        .placeholder-small::placeholder {
    font-size: 0.625rem; /* Adjust the font size as needed */
    color: #6c757d; /* Muted color */
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
            /* Change to your desired color */
        }
    </style>

    <div style="text-align: start">
        <button style="margin-right: 5px; font-size: 13px; background-color: #02114f;" wire:click="open" class="btn btn-primary">ADD Vendors</button>
        <button style="margin-right: 5px; font-size: 13px; background-color: #02114f;" wire:click="addPO" class="btn btn-primary">ADD PO</button>

    </div>
    @if(session()->has('vendor'))
    <div id="successAlert" style="text-align: center;" class="alert alert-success">
        {{ session('vendor') }}
    </div>
    @elseif(session()->has('purchase-order'))
    <div id="purchaseOrderAlert" style="text-align: center;" class="alert alert-success">
        {{ session('purchase-order') }}
    </div>
    @endif
    <script>
        setTimeout(function() {
            document.getElementById('successAlert').style.display = 'none';
            document.getElementById('purchaseOrderAlert').style.display = 'none';
        }, 5000);
    </script>
    <div class="row m-0">
        @php
        $selectedPerson = $selectedVendor ?? $vendors->first();
        $isActive = $selectedPerson->status == 'active';
        @endphp
        <div class="col-md-3 rounded p-0 mt-2" style="background-color: #f2f2f2;margin-right:5px">
            <img style="height: 160px; width:-webkit-fill-available; border-radius: 8px;" src="https://www.ibousa.org/wp-content/uploads/Vendors-e1503453975329.png" alt="">
        </div>
        <div class="col-md-8 rounded mt-2" style="background-color: #f2f2f2; padding: 8px">
            <p style="text-align: start">
                <button style="margin-right: 10px;" wire:click="editVendors('{{$selectedPerson->id}}')" class="rounded btn-outline-primary p-1 float-end">Edit</button>
            </p>
            @if ($selectedVendor)
            <div class="row" style="font-size: 13px;">
                <div class="row">
                    @php
                    $selectedPerson = $selectedVendor ?? $vendors->first();
                    $isActive = $selectedPerson->status == 'active';
                    @endphp


                    <div class="col">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1; ">

                                <h2 style="font-size: 10px;"><strong>Vendor Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->vendor_name }}</p>

                                <h2 style="font-size: 10px;"><strong>Vendor ID</strong></h2>
                                <p style="font-size: 10px;">(#{{ optional($selectedPerson)->vendor_id }})</p>


                            </div>

                            <div style="flex: 1;">
                                <h2 style="font-size: 10px;"><strong>Address</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->address }}</p>

                                <h2 style="font-size: 10px;"><strong>Email</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->email }}</p>


                            </div>
                            <div style="flex: 1;">

                                <h2 style="font-size: 10px;"><strong>Contact Phone</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->phone_number }}</p>
                                <h2 style="font-size: 10px;"><strong>Contact Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->contact_person }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @elseif (!$vendors->isEmpty())

            <!-- Display details of the first person in the list -->
            @php
            $firstPerson = $vendors->first();
            $starredPerson = DB::table('vendor_details')
            ->where('vendor_id', $firstPerson->vendor_id)
            ->first();
            @endphp

            <div class="row" style="font-size: 13px;">
                <div class="row">

                    <div class="col" style=" margin-right: 80px">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1;;">
                                <h2 style="font-size: 10px;"><strong>Vendor Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->vendor_name }}</p>

                                <h2 style="font-size: 10px;"><strong>Vendor ID</strong></h2>
                                <p style="font-size: 10px;">(#{{ optional($firstPerson)->vendor_id }})</p>



                            </div>

                            <div style="flex: 1;">
                                <h2 style="font-size: 10px;"><strong>Address</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->address }}</p>
                                <h2 style="font-size: 10px;"><strong>Email</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->email }}</p>

                            </div>
                            <div style="flex: 1;">
                                <h2 style="font-size: 10px;"><strong>Vendor Phone</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->phone_number }}</p>
                                <h2 style="font-size: 10px;"><strong>Contact Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->contact_person }}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>


    @if($vendor=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Vendors Details</b></h5>
                    <button wire:click="cVendor" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addvVendors">
                        <div>
                            <label for="customer_profile" style="font-size: 12px;">Vendor Company Logo:</label>
                            <input type="file" wire:model="vendor_profile">
                            @error('vendor_profile') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_name" style="font-size: 12px;">Vendor Name:</label>
                            <input type="text" wire:model="vendor_name">
                            @error('vendor_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_company_name" style="font-size: 12px;">Vendor Company Name:</label>
                            <input type="text" wire:model="vendor_company_name">
                            @error('vendor_company_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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

                        <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                            <button style="margin-left: 5%; font-size: 12px;" class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" wire:click="cVendor" type="button" style="font-size: 12px;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-backdrop fade show blurred-backdrop"></div>
    @endif
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
                               <div class="col-md-6" >
                                        <div class="emp" >
                                    <div class=" employee-details" > 
                                        <div style="margin:5px 0 20px 0;"><h5>Employee Details</h5></div>  
                                    <div class="form-group" >
                                        <label for="first_name">First Name :</label>
                                        <input type="text" class="form-control" wire:model="first_name" >
                                        @error('first_name') 
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
 
                                    <div class="form-group" >
                                        <label for="last_name">Last Name :</label>
                                        <input type="text" class="form-control" wire:model="last_name" style="margin-bottom:10px;;">
                                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                            
                                    <div class="form-group" >
                                        <label for="mobile_number">Phone Number :</label>
                                        <input type="text" class="form-control" wire:model="mobile_number" style="margin-bottom:10px;;">
                                        @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group" >
                                        <label for="alternate_mobile_number">Alternate Phone Number :</label>
                                        <input type="text" class="form-control" wire:model="alternate_mobile_number" style="margin-bottom:10px;;">
                                        @error('alternate_mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                        <div class="form-group" >
                                                <label for="education">Education :</label>
                                                <input type="text" class="form-control" wire:model="education"  style="margin-bottom:10px;;">
                                                @error('education') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                            <div class="form-group" >
                                                <label for="experience">Experience :</label>
                                                <input type="text" class="form-control" wire:model="experience"  style="margin-bottom:10px;;">
                                                @error('experience') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="email">Email  :</label>
                                                <input type="email" class="form-control" wire:model="email" style="margin-bottom:10px;;">
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="email">Company Email  :</label>
                                                <input type="email" class="form-control" wire:model="company_email" style="margin-bottom:10px;;">
                                                @error('company_email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="aadhar_no">Aadhar Number :</label>
                                                <input type="text" class="form-control" wire:model="aadhar_no" style="margin-bottom:10px;;">
                                                @error('aadhar_no') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
 
                                <!-- Password -->
                                <div class="form-group" >
                                    <label for="password">Password :</label>
                                    <input type="password" class="form-control" wire:model="password" style="margin-bottom:10px;;">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <div class="inpu-group">
                                         <label>Gender :</label><br>
                                    <div class="form-check form-check-inline"style="margin-top:10px;" >
                                        <input class="form-check-input" type="radio" wire:model="gender" value="Male" id="maleRadio" name="gender" >
                                        <label class="form-check-label" for="maleRadio">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-top:10px;">
                                        <input class="form-check-input" type="radio" wire:model="gender" value="Female" id="femaleRadio" name="gender">
                                        <label class="form-check-label" for="femaleRadio">Female</label>
                                    </div>
                                    </div>
                                </div>
                                <div>
                                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
 
                                {{-- Upload Employee Image --}}
                                <div class="form-group">
                                    <label for="image">Employee Image:</label>
                                    <input type="file" class="form-control-file" wire:model="image" style="margin-bottom:10px;">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div >
                                    <!-- Display the saved image -->
                                    @if($savedImage)
                                        <img height="50" width="50" src="{{ asset('storage/' . $savedImage) }}" alt="Saved Image" class="img-preview">
                                        <span>{{ $savedImage }}</span>
                                    @endif

                                    <!-- Display the temporary image -->
                                    @if($image)
                                        <img height="50" width="50" src="{{ $image->temporaryUrl() }}" alt="Temporary Image" class="img-preview">
                                        <span>{{ $image->getClientOriginalName() }}</span>
                                    @endif
                                </div>
                               </div>
                                 <div class="employee-details">
                                   <div style="margin:5px 0 20px 0"><h5>Job Details</h5></div>  

                                   <div class="form-group" >
                                        <label for="hire_date">Hire Date :</label>
                                        <input type="date" class="form-control placeholder-small" wire:model="hire_date" max="{{ date('Y-m-d') }}" style="margin-bottom:10px;">
                                        @error('hire_date') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                <!-- ... (other properties) ... -->

                                <div class="form-group">
                                    <label for="employee_type">Employee Type:</label>
                                    <select wire:model="employee_type" wire:change="employeeCall" class="form-control custom-select placeholder-small" style="margin-bottom: 10px; background-image: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'grey\' class=\'bi bi-chevron-down\' width=\'22\' height=\'22\' viewBox=\'0 0 20 16\'><path d=\'M1 5l7 7 7-7H1z\'/></svg>'); background-repeat: no-repeat; background-position: right;">
                                        <option value="default">Select Employee Type</option>
                                        <option value="full-time">Full-Time</option>
                                        <option value="part-time">Part-Time</option>
                                        <option value="contract">Contract</option>
                                    </select>
                                    @error('employee_type') <span class="text-danger">{{ $message }}</span> @enderror

                                    @if($showContractorField)
                                        <div class="form-group">
                                            <label for="contractor_company_id">Contractor Company ID:</label>
                                            <input type="text" class="form-control" id="contractor_company_id" wire:model="contractor_company_id">
                                            @error('contractor_company_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    @endif
                                </div>



                                <div class="form-group">
                                    <label for="employee_status">Employee Status :</label>
                                    <div class="input-group">
                                    <select class="form-control custom-select placeholder-small" wire:model="employee_status" style="margin-bottom: 10px; background-image: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'grey\' class=\'bi bi-chevron-down\' width=\'22\' height=\'22\' viewBox=\'0 0 20 16\'><path d=\'M1 5l7 7 7-7H1z\'/></svg>'); background-repeat: no-repeat; background-position: right;">
                                            <option value="defualt" >Select Employee Status</option>
                                            <option value="active">Active</option>
                                            <option value="on-leave">On Leave</option>
                                            <option value="terminated">Terminated</option>
                                        </select>
                                    </div>
                                    @error('employee_status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="department">Department :</label>
                                    <input type="text" class="form-control" wire:model="department" style="margin-bottom:10px;;">
                                    @error('department') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="job_title">Job Title :</label>
                                    <input type="text" class="form-control" wire:model="job_title" style="margin-bottom:10px;;">
                                    @error('job_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="aadhar_no">Job Location :</label>
                                    <input type="text" class="form-control" wire:model="job_location" style="margin-bottom:10px;;">
                                    @error('job_location') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                    <div class="form-group" >
                                                <label for="company_name">Company Name :</label>
                                                <input type="text" class="form-control" wire:model="company_name" style="margin-bottom:10px;;">
                                                @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="company_id">Company ID :</label>
                                                <input type="text" class="form-control" wire:model="company_id"  style="margin-bottom:10px;;">
                                                @error('company_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="form-group" >
                                                <label for="manager_id">Manager Id :</label>
                                                <input type="text" class="form-control" wire:model="manager_id"  style="margin-bottom:10px;;">
                                                @error('manager_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="report_to">Report To :</label>
                                                <input type="text" class="form-control" wire:model="report_to"  style="margin-bottom:10px;;">
                                                @error('report_to') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                <div class="form-group" >
                                    <div class="input-group">
                                    <label>International Employee :</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="inter_emp" value="yes" id="yesRadio" name="inter_emp" >
                                        <label class="form-check-label" for="yesRadio">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="inter_emp" value="no" id="noRadio" name="inter_emp">
                                        <label class="form-check-label" for="noRadio">No</label>
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
                                        <div style="margin:5px 0 20px 0"><h5>Employee Address</h5></div>  
                                        <div class="form-group" >
                                    <label for="address">Address :</label>
                                    <input type="text" class="form-control" wire:model="address" style="margin-bottom:10px;">
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="city">City :</label>
                                    <input type="text" class="form-control" wire:model="city" style="margin-bottom:10px;">
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="state">State :</label>
                                    <input type="text" class="form-control" wire:model="state" style="margin-bottom:10px;">
                                    @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="postal_code">Pin Code :</label>
                                    <input type="text" class="form-control" wire:model="postal_code" style="margin-bottom:10px;">
                                    @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="country">Country :</label>
                                    <input type="text" class="form-control" wire:model="country"style="margin-bottom:10px;">
                                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                               </div>
                               <div class="employee-details">
                                         <div style="margin:5px 0 20px 0"><h5>Employee Personal Details</h5></div>  

                                <div class="form-group" >
                                        <label for="date_of_birth">Date of Birth :</label>
                                        <input type="date" class="form-control placeholder-small" wire:model="date_of_birth" max="{{ date('Y-m-d') }}" style="margin-bottom:10px;">
                                        @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
    
                                    <div class="form-group">
                                    <label for="blood_group">Blood Group :</label>
                                    <input type="text" class="form-control" wire:model="blood_group" style="margin-bottom:10px;">
                                    @error('blood_group') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="religion">Religion :</label>
                                    <input type="text" class="form-control" wire:model="religion" style="margin-bottom:10px;">
                                    @error('religion') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="nationality">Nationality :</label>
                                    <input type="text" class="form-control" wire:model="nationality" style="margin-bottom:10px;">
                                    @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Martial Status:</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model="marital_status" value="unmarried" id="unmarriedRadio" name="marital_status_group">
                                            <label class="form-check-label" for="unmarriedRadio">Single</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model="marital_status" value="married" id="marriedRadio" name="marital_status_group">
                                            <label class="form-check-label" for="marriedRadio">Married</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    @error('marital_status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="spouse">Spouse:</label>
                                    <input type="text" class="form-control" wire:model="spouse" style="margin-bottom:10px;">
                                    @error('spouse') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Physically Challenge:</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model="physically_challenge" value="Yes" id="yesRadio" name="physically_challenge_group">
                                            <label class="form-check-label" for="yesRadio">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model="physically_challenge" value="No" id="noRadio" name="physically_challenge_group">
                                            <label class="form-check-label" for="noRadio">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    @error('physically_challenge') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                    </div>
                                <div class="employee-details">
                                    <div style="margin:5px 0 20px 0"><h5>Other Details</h5></div>  
                                        <div class="form-group" >
                                                <label for="nick_name">Nick Name :</label>
                                                <input type="text" class="form-control" wire:model="nick_name"  style="margin-bottom:10px;">
                                                @error('nick_name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="emergency_contact">Emergency Contact :</label>
                                                <input type="text" class="form-control" wire:model="emergency_contact"  style="margin-bottom:10px;">
                                                @error('emergency_contact') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="time_zone">Time Zone :</label>
                                                <input type="text" class="form-control" wire:model="time_zone" style="margin-bottom:10px;">
                                                @error('time_zone') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="pf_no">PF Number :</label>
                                                <input type="text" class="form-control" wire:model="pf_no" style="margin-bottom:10px;">
                                                @error('pf_no') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="pan_no">Pan Number :</label>
                                                <input type="text" class="form-control" wire:model="pan_no" style="margin-bottom:10px;">
                                                @error('pan_no') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="biography">Biography :</label>
                                                <input type="text" class="form-control" wire:model="biography" style="margin-bottom:10px;">
                                                @error('biography') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="facebook">Facebook :</label>
                                                <input type="text" class="form-control" wire:model="facebook" style="margin-bottom:10px;">
                                                @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="linked_in">LinkedIn :</label>
                                                <input type="text" class="form-control" wire:model="linked_in" style="margin-bottom:10px;">
                                                @error('linked_in') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="twitter">Twitter :</label>
                                                <input type="text" class="form-control" wire:model="twitter" style="margin-bottom:10px;">
                                                @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="is_starred">Is Starred :</label>
                                                <input type="text" class="form-control" wire:model="is_starred" style="margin-bottom:10px;">
                                                @error('is_starred') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="skill_set">Skill Set :</label>
                                                <input type="text" class="form-control" wire:model="skill_set" style="margin-bottom:10px;">
                                                @error('skill_set') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center; margin-top:20px;">
                                <!-- Your Livewire component content -->
                                <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">Save</button>
                                <p wire:loading>Loading...</p>
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
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Vendors Details</b></h5>
                    <button wire:click="close" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addVendors">
                        <div>
                            <label for="customer_profile" style="font-size: 12px;">Vendor Company Logo:</label>
                            <input type="file" wire:model="vendor_profile">
                            @error('vendor_profile') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_name" style="font-size: 12px;">Vendor Name:</label>
                            <input type="text" wire:model="vendor_name">
                            @error('vendor_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_company_name" style="font-size: 12px;">Vendor Company Name:</label>
                            <input type="text" wire:model="vendor_company_name">
                            @error('vendor_company_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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

                        <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                            <button style="margin-left: 5%; font-size: 12px;" class="btn btn-success me-2" type="submit">Submit</button>
                            <button class="btn btn-danger" wire:click="close" type="button" style="font-size: 12px;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-backdrop fade show blurred-backdrop"></div>
    @endif

    @if($edit=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>Edit Vendors Details</b></h5>
                    <button wire:click="closeEdit" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateVendors">
                        <div>
                            <label for="customer_profile" style="font-size: 12px;">Vendor Company Logo:</label>
                            <input type="file" wire:model="vendor_profile">
                            @error('vendor_profile') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_name" style="font-size: 12px;">Vendor Name:</label>
                            <input type="text" wire:model="vendor_name">
                            @error('vendor_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_company_name" style="font-size: 12px;">Vendor Company Name:</label>
                            <input type="text" wire:model="vendor_company_name">
                            @error('vendor_company_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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

                        <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                            <button style="margin-left: 5%; font-size: 12px;" class="btn btn-success me-2" type="submit">Update</button>
                            <button class="btn btn-danger" wire:click="close" type="button" style="font-size: 12px;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-backdrop fade show blurred-backdrop"></div>
    @endif



    @if($po=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Purchase Order</b></h5>
                    <button wire:click="cancelPO" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
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
                        <form wire:submit.prevent="savePurchaseOrder">
                            @csrf

                            <div class="form-group">
                                <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Consultant Name:</label>
                                <select wire:change="selectedConsultantId" style="font-size: 12px;" class="form-control" wire:model="consultantName">
                                    <option style="font-size: 12px;" value="">Select Consultant</option>
                                    <option style="font-size: 12px;" value="addConsultant">
                                        << Add Consultant>>
                                    </option>
                                    @foreach($employees as $employee)
                                    <option style="font-size: 12px;" value="{{ $employee->emp_id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('consultant_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;" for="rate">Job Title:</label>
                                <div class="input-group">
                                    <input style="font-size: 12px;" type="text" class="form-control" id="rate" wire:model="job_title" readonly>
                                </div> <br>
                                @error('job_title') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                            </div>


                            <div class="row mb-2">
                                <div class="col p-0">
                                    <label style="font-size: 12px;" for="start_date">Start Date:</label>
                                    <input style="font-size: 12px;" type="date" wire:model="startDate" class="form-control">
                                </div> <br>
                                @error('startDate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                <div class="col p-0">
                                    <label style="font-size: 12px;" for="end_date">End Date:</label>
                                    <input style="font-size: 12px;" type="date" wire:model="endDate" class="form-control">

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
                                <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Vendor Name:</label>
                                <select wire:change="callVendor" style="font-size: 12px;" class="form-control" id="vendorName" wire:model="vendorName">
                                    <option style="font-size: 12px;" value="">Select Vendor</option>
                                    <option style="font-size: 12px;" value="addVendor" > << Add Vendor >></option>
                                    @foreach($vendors as $vendor)
                                    <option style="font-size: 12px;" value="{{ $vendor->vendor_id }}">{{ $vendor->vendor_name }}</option>
                                    @endforeach
                                </select>
                                @error('vendorName') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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
                                <label style="font-size: 12px;" for="paymentType">Payment Terms:</label>
                                <input style="font-size: 12px;" type="text" class="form-control" id="rate" wire:model="paymentTerms" placeholder="Ex: Net 0,Net 10,........">

                                @error('paymentTerms') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>
                            <div style="text-align: center;">
                                <button style="margin-top: 15px;font-size:12px" type="submit" class="btn btn-success">Submit Purchase Order</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-backdrop fade show blurred-backdrop"></div>
    @endif

    <!-- Everyone tab content -->

    <div class="row">
        <div class="col-md-3 rounded mt-2" style="background-color:#f2f2f2; padding: 5px; max-height:300px;overflow-y:auto">
            <div class="container" style="margin-top: 8px;margin-bottom:8px">
                <div class="row">
                    <div class="col" style="margin: 0px; padding: 0px">
                        <div class="input-group">
                            <input wire:model="searchTerm" style="font-size: 10px; cursor: pointer; border-radius: 5px 0 0 5px;" type="text" class="form-control" placeholder="Search for vendors" aria-label="Search" aria-describedby="basic-addon1">
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
                @if ($allVendors->isEmpty())
                <div class="container" style="text-align: center; color: gray;">No Vendors Found</div>
                @else
                @foreach($allVendors as $vendor)
                <div wire:click="selectVendor('{{ $vendor->vendor_id }}')" class="container-1" style="margin-bottom:8px; cursor: pointer; background-color: {{ $selectedVendor && $selectedVendor->vendor_id == $vendor->vendor_id ? '#ccc' : 'white' }}; width: 500px; border-radius: 5px;padding:5px">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <h6 class="username" style="font-size: 10px; color: black;">{{ $vendor->vendor_name }}</h6>
                        </div>
                        <div class="col-md-4 pe-0">
                            <h6 class="username" style="font-size: 8px; color: black; word-break: break-all;">{{ $vendor->phone_number }}</h6>
                        </div>
                        <div class="col-md-4 pe-0">
                            <h6 class="username" style="font-size: 8px; color: black; word-break: break-all;">#({{ $vendor->vendor_id }})</h6>
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
            $selectedPerson = $selectedVendor ?? $vendors->first();
            $isActive = $selectedPerson->status == 'active';
            @endphp
            <div style="text-align: start;">
                <button class="p-2 mb-2" wire:click="showBills('{{$selectedPerson->vendor_id}}')" style="{{ $activeButton === 'Bills' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 5px; border-radius: 5px; border: none;">
                    Bills & Sent Payments
                </button>

                <button class="p-2 mb-2" wire:click="updateAndShowPoList('{{$selectedPerson->vendor_id}}')" style="{{ $activeButton === 'PO' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 5px; border-radius: 5px; border: none;">
                    PO
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
            @if($activeButton=="PO")

            <!-- resources/views/livewire/purchase-order-table.blade.php -->

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>PO Number</th>
                            <th>Vendor ID</th>
                            <th>Vendor Name</th>
                            <th>Employee Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Time Sheet Type</th>
                            <th>Time Sheet Begins</th>
                            <th>Invoice Type</th>
                            <th>Payment Terms</th>
                            <th>PO By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($showPOLists as $salesOrder)
                        <tr>
                            <td>{{ $salesOrder->po_number }}</td>
                            <td>{{ $salesOrder->vendor_id }}</td>
                            <td>{{ $salesOrder->ven->vendor_name }}</td>
                            <td>{{ $salesOrder->emp->first_name }} {{ $salesOrder->emp->last_name }}</td>
                            <td>{{ $salesOrder->start_date }}</td>
                            <td>{{ $salesOrder->end_date }}</td>
                            <td>{{ $salesOrder->time_sheet_type }}</td>
                            <td>{{ $salesOrder->time_sheet_begins }}</td>
                            <td>{{ $salesOrder->invoice_type }}</td>
                            <td>{{ $salesOrder->payment_terms }}</td>
                            <td>{{ $salesOrder->com->company_name }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" style="text-align: center;">PurchaseOrders Not Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            @endif

            @if($activeButton=="Bills")
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Bill Number</th>
                        <th>Vendor ID</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Payment Terms</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Currency</th>
                        <th>Notes</th>
                        <th>Billed By</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bills as $bill)
                    <tr>
                        <td>{{ $bill->bill_number }}</td>
                        <td>{{ $bill->vendor_id }}</td>
                        <td>{{ $bill->amount }}</td>
                        <td>{{ $bill->due_date }}</td>
                        <td>{{ $bill->payment_terms }}</td>
                        <td>{{ $bill->description }}</td>
                        <td>{{ $bill->status }}</td>
                        <td>{{ $bill->currency }}</td>
                        <td>{{ $bill->notes }}</td>
                        <td>{{ $bill->company->company_name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" style="text-align: center;">Bills Not Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
                        </div>

            @endif



        </div>
    </div>
    <!-- End of Everyone tab content -->
</div>