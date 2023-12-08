<div style="padding:10px 15px; background:#fff; ">
    <!-- Add this to your HTML file -->
    <style>
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
         tr:hover {
            background-color: #f5f5f5;
            font-size: 8px;

        }
                .table {
            width: 100%;
            margin:10px auto;
            padding:0;
            font-size: 12px;
            font-family: 'Roboto', sans-serif;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            vertical-align: top;
            font-size:0.725rem;
            border-right: 1px solid #dee2e6; 
            text-align: center;
      
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
        .customer-image {
            border-radius: 50%;
            height: 50px;
            width: 50px;
            border: 2px solid #fcfcfc ;
        }

        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            margin: 0 auto;
            max-width: 100%;
            margin-top: 30px;
        }

        .profile-image,
        .people-image,
        .customer-profile {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5%;
            border: 1px solid black;

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
            margin-bottom: 15px;
            font-size: 12px;
        }

        .row {
            margin-right: 0;
            margin-left: 0;
        }
        .employee-data{
          display:flex;
          flex-direction:row;
           line-height:1;
           cursor: pointer; 
           margin-top:-15px;
           white-space: nowrap;
           gap:20px;
           padding:5px 1px;
            align-items:center;
            transition: background-color 0.3s; 
        }
 
        .customer-details {
            margin-top: 15px;
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
        .contractor-btn {
            background-color: rgb(2, 17, 79);
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size:0.825rem;
            padding: 4px auto;
            transition: background-color 0.3s ease-in-out;
        }

        .contractor-btn:hover {
            background-color: #0056b3;
        }
        .button-btn{
            background-color: rgb(2, 17, 79);
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size:0.725rem;
            padding: 4px auto;
            transition: background-color 0.3s ease-in-out;
        }
        .details{
            display:flex;flex-direction:row; justify-content:space-between;font-size:0.725rem;
        }

        .error {
            color: red;
        }
        .align-data{
            display: grid; 
            grid-template-columns: 100px 1fr;
            margin-bottom: 5px; 
        }
        .align-data strong {
        white-space: nowrap;
        margin-right: 5px; /* Adjust the value to control the space between strong and colon */
    }
        /* Style for the container with scrolling */
        .input-groups .form-control{
        width:100%;
        font-size: 11px; width:80%;box-sizing: border-boxcursor: pointer; border-radius: 5px 0 0 5px;
    }
      .scroll-container {
          overflow-y: auto;
          max-height: 300px;
          margin-top:-10px;
          scrollbar-width: thin; /* For Firefox */
          scrollbar-color: #ccc transparent; /* For Firefox */

          /* For WebKit browsers (Chrome, Safari) */
          &::-webkit-scrollbar {
              width: 4px;
          }

          &::-webkit-scrollbar-thumb {
              background-color: #ccc;
              border-radius: 4px;
          }

          &::-webkit-scrollbar-track {
              background-color: transparent;
          }
      }

      /* Style for the employee-data items */
      .container.employee-data {
          transition: background-color 0.3s;
      }

      .container.employee-data:hover {
          background-color: #456787;
      }
      
    @media (max-width: 1060px) {
    .input-group .form-control{
            width:70%;
        }
    }
      @media (max-width: 760px) {
    .details {
        flex-direction: column;
        align-items: flex-start;
    }

    .col-md-6 {
        width: 100%;
        margin-bottom: 10px; /* Add some space between the columns */
    }
    .col-md-3 {
        margin-bottom: 10px; /* Add some space between the columns */
    }
  
}
@media (max-width: 560px) {
        .scroll-table {
            overflow-x: scroll;
        }
    }

    </style>

       <div style="display:flex;justify-content:flex-end; ">
          <button class="button" style="text-align:center; padding:3px 10px;font-size:0.795rem;" wire:click="open" class="btn btn-primary">ADD Employees</button>
          <button class="button" style="text-align:center; padding:3px 10px;font-size:0.795rem;margin-left:10px;"><a href="{{route('contractor-page')}}" style="outline:none;text-decoration:none;color:#fff;">Contractor List</a></button>
          
       </div>
     <div>
     @if(session()->has('success'))
    <div style="text-align: center;" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
   <!-- modal -->
<!-- modal -->
@if($show=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Employee Details</b></h5>
                    <button wire:click="close" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="close">
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
                                        <label for="first_name">First Name <span class="text-danger">  *</span></label>
                                        <input type="text" class="form-control placeholder-small" wire:model="first_name" placeholder="Enter first name" >
                                        @error('first_name') 
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
 
                                    <div class="form-group" >
                                        <label for="last_name">Last Name <span class="text-danger">  *</span></label>
                                        <input type="text" class="form-control placeholder-small" placeholder="Enter last name" wire:model="last_name" style="margin-bottom:10px;;">
                                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                            
                                    <div class="form-group" >
                                        <label for="mobile_number">Phone Number <span class="text-danger">  *</span></label>
                                        <input type="text" class="form-control placeholder-small" placeholder="Enter phone number" wire:model="mobile_number" style="margin-bottom:10px;;">
                                        @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group" >
                                        <label for="alternate_mobile_number">Alternate Phone Number <span class="text-danger">  *</span></label>
                                        <input type="text" class="form-control placeholder-small" placeholder="Enter alternate phone number" wire:model="alternate_mobile_number" style="margin-bottom:10px;;">
                                        @error('alternate_mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                        <div class="form-group" >
                                                <label for="education">Education <span class="text-danger">  *</span></label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter education details" wire:model="education"  style="margin-bottom:10px;;">
                                                @error('education') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                            <div class="form-group" >
                                                <label for="experience">Experience :</label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter experience" wire:model="experience"  style="margin-bottom:10px;;">
                                                @error('experience') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="email">Email  <span class="text-danger">  *</span></label>
                                                <input type="email" class="form-control placeholder-small" placeholder="Enter email" wire:model="email" style="margin-bottom:10px;;">
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="email">Company Email  <span class="text-danger">  *</span></label>
                                                <input type="email" class="form-control placeholder-small" placeholder="Enter company email"wire:model="company_email" style="margin-bottom:10px;;">
                                                @error('company_email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="adhar_no">Aadhar Number :</label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter adhar number" wire:model="adhar_no" style="margin-bottom:10px;;">
                                                @error('adhar_no') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
 
                                <!-- Password -->
                                <div class="form-group" >
                                    <label for="password">Password <span class="text-danger">  *</span></label>
                                    <input type="password" class="form-control placeholder-small" placeholder="Enter password" wire:model="password" style="margin-bottom:10px;;">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <div class="group" style="display:flex;wrap:nowrap; gap:20px;margin-bottom:10px;">
                                         <label style="margin-top:5px;" >Gender <span class="text-danger">  *</span>:</label><br>
                                            <div style="display:flex; align-items:start;gap:20px;margin-left:10px;margin-top:2px;">
                                            <div class="form-check form-check-inline" style="display:flex;gap:5px;" >
                                                <input class="form-check" type="radio" wire:model="gender" value="Male" id="maleRadio" name="gender" >
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
                                   <div style="margin:5px 0 20px 0"><h5>Job Details</h5></div>  

                                   <div class="form-group" >
                                        <label for="hire_date">Hire Date <span class="text-danger">  *</span></label>
                                        <input type="text" class="form-control placeholder-small" wire:model="hire_date" x-data x-init="initDatepicker($refs.hire_date, 'M-d-Y')" x-ref="hire_date" style="font-size: 12px;" placeholder="Enter hire date....">
                                        @error('hire_date') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                <!-- ... (other properties) ... -->
                                <div class="form-group">
                                    <label for="department">Department <span class="text-danger">  *</span></label>
                                    <input type="text" class="form-control placeholder-small" placeholder="Enter department"wire:model="department" style="margin-bottom:10px;;">
                                    @error('department') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="job_title">Job Title <span class="text-danger">  *</span></label>
                                    <input type="text" class="form-control placeholder-small" placeholder="Enter job title"wire:model="job_title" style="margin-bottom:10px;;">
                                    @error('job_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="loction">Job Location <span class="text-danger">  *</span></label>
                                    <input type="text" class="form-control placeholder-small" placeholder="Enter job location" wire:model="job_location" style="margin-bottom:10px;;">
                                    @error('job_location') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                    <div class="form-group" >
                                        <label for="company_name">Company Name <span class="text-danger">  *</span></label>
                                            <input type="text" class="form-control placeholder-small" placeholder="Enter company name" wire:model="company_name" style="margin-bottom:10px;;">
                                             @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="company_id">Company ID <span class="text-danger">  *</span></label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter company Id" wire:model="company_id"  style="margin-bottom:10px;;">
                                                @error('company_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="form-group" >
                                                <label for="manager_id">Manager Id <span class="text-danger">  *</span></label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter manager Id" wire:model="manager_id"  style="margin-bottom:10px;;">
                                                @error('manager_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="report_to">Report To <span class="text-danger">  *</span></label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter reporting manager name" wire:model="report_to"  style="margin-bottom:10px;;">
                                                @error('report_to') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                    <div class="form-group">
                                        <div class="group" style="display:flex;wrap:nowrap; gap:10px;margin-top:15px;">
                                        <label for="employee_type" style="margin-top:5px;">Employee Type <span class="text-danger">  *</span></label>
                                       <div style="display:flex; align-items:start;gap:10px;  margin-left:10px;margin-top:2px;">
                                            <div class="gender"style="display:flex;wrap:nowrap;gap:5px;">
                                                <input class="form-check" type="radio" wire:model="employee_type" wire:change="employeeCall" value="full-time" id="full-timeRadio" name="employee_type" style="height:12px;width:12px;">
                                                <label class="form-check-label" for="full-timeRadio" style="margin-top:4px;">Full Time</label>
                                            </div>
                                            <div class="gender"style="display:flex;wrap:nowrap;gap:5px;">
                                                <input class="form-check" type="radio" wire:model="employee_type" wire:change="employeeCall"  value="part-time" id="part-timeRadio" name="employee_type"style="height:12px;width:12px;">
                                                <label class="form-check-label" for="part-timeRadio" style="margin-top:4px;">Part Time</label>
                                            </div>
                                            <div class="gender"style="display:flex;wrap:nowrap;gap:5px;">
                                                <input class="form-check" type="radio" wire:model="employee_type" wire:change="employeeCall"  value="contract" id="contractRadio" name="employee_type"style="height:12px;width:12px;">
                                                <label class="form-check-label" for="contractRadio" style="margin-top:4px;">Contract</label>
                                            </div>
                                         </div>
                                       </div>
                                    @error('employee_type') <span class="text-danger">{{ $message }}</span> @enderror

                                    @if($showContractorField)
                                        <div class="form-group">
                                            <label for="contractor_company_id">Contractor Company ID <span class="text-danger">  *</span></label>
                                            <input type="text" class="form-control" id="contractor_company_id" wire:model="contractor_company_id">
                                            @error('contractor_company_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="group" style="display:flex;wrap:nowrap; gap:10px;margin-top:15px;">
                                    <label for="employee_status" style="margin-top:5px;">Employee Status <span class="text-danger">  *</span></label>
                                    <div style="display:flex; align-items:start;gap:10px;margin-left:10px;margin-top:2px;">
                                         <div class="gender"style="display:flex;wrap:nowrap;gap:5px;">
                                            <input class="form-check" type="radio" wire:model="employee_status" value="active" id="activeRadio" name="employee_status" style="height:12px;width:12px;">
                                            <label class="form-check-label" for="activeRadio" style="margin-top:4px;">Active</label>
                                        </div>
                                        <div class="gender"style="display:flex;wrap:nowrap;gap:5px;">
                                            <input class="form-check" type="radio" wire:model="employee_status"   value="on-leave" id="on-leaveRadio" name="employee_status"style="height:12px;width:12px;">
                                            <label class="form-check-label" for="on-leaveRadio" style="margin-top:4px;">On-Leave</label>
                                        </div>
                                        <div class="gender"style="display:flex;wrap:nowrap;gap:5px;">
                                            <input class="form-check" type="radio" wire:model="employee_status"   value="terminated" id="terminatedRadio" name="employee_status"style="height:12px;width:12px;">
                                            <label class="form-check-label" for="terminatedRadio" style="margin-top:4px;">Terminated</label>
                                        </div>
                                         </div>
                                    </div>
                                    @error('employee_status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group" >
                                    <div class="group" style="display:flex;wrap:nowrap; gap:20px;margin-top:15px;">
                                    <label style="margin-top:5px;">International Employee <span class="text-danger">  *</span></label>
                                    <div class="gender"style="display:flex;wrap:nowrap;gap:5px;">
                                        <input class="form-check" type="radio" wire:model="inter_emp" value="yes" id="yesRadio" name="inter_emp" style="height:12px;width:12px;" >
                                        <label class="form-check-label" style="margin-top:5px;" for="yesRadio">Yes</label>
                                    </div>
                                    <div class="gender"style="display:flex;wrap:nowrap;gap:5px;">
                                        <input class="form-check" type="radio" wire:model="inter_emp" value="no" id="noRadio" name="inter_emp"  style="height:12px;width:12px;">
                                        <label class="form-check-label"style="margin-top:5px;" for="noRadio">No</label>
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
                                    <label for="address">Address <span class="text-danger">  *</span></label>
                                    <input type="text"class="form-control placeholder-small" placeholder="Enter employee address" wire:model="address" style="margin-bottom:10px;">
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="city">City <span class="text-danger">  *</span></label>
                                    <input type="text"class="form-control placeholder-small" placeholder="Enter city" wire:model="city" style="margin-bottom:10px;">
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="state">State <span class="text-danger">  *</span></label>
                                    <input type="text" class="form-control placeholder-small" placeholder="Enter state name" wire:model="state" style="margin-bottom:10px;">
                                    @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="postal_code">Pin Code <span class="text-danger">  *</span></label>
                                    <input type="text"class="form-control placeholder-small" placeholder="Enter pincode" wire:model="postal_code" style="margin-bottom:10px;">
                                    @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="country">Country <span class="text-danger">  *</span></label>
                                    <input type="text" class="form-control placeholder-small" placeholder="Enter country name" wire:model="country" style="margin-bottom:10px;">
                                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                               </div>
                               <div class="employee-details">
                                         <div style="margin:5px 0 20px 0"><h5>Employee Personal Details</h5></div>  

                                <div class="form-group" >
                                        <label for="date_of_birth">Date of Birth <span class="text-danger">  *</span></label>
                                        <input type="text" class="form-control placeholder-small" placeholder="Enter date of birth" wire:model="date_of_birth" x-data x-init="initDatepicker($refs.date_of_birth, 'M-d-Y')" x-ref="date_of_birth" style="font-size: 12px;margin-bottom:10px;">
                                        @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
    
                                    <div class="form-group">
                                    <label for="blood_group">Blood Group <span class="text-danger">  *</span></label>
                                    <input type="text" class="form-control placeholder-small" placeholder="Enter blood group type" wire:model="blood_group" style="margin-bottom:10px;">
                                    @error('blood_group') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="religion">Religion <span class="text-danger">  *</span></label>
                                    <input type="text" class="form-control placeholder-small" placeholder="Enter religion" wire:model="religion" style="margin-bottom:10px;">
                                    @error('religion') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="nationality">Nationality <span class="text-danger">  *</span></label>
                                    <input type="text" class="form-control placeholder-small" placeholder="Enter natinality" wire:model="nationality" style="margin-bottom:10px;">
                                    @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <div  class="group" style="display:flex;wrap:nowrap; gap:20px;">
                                        <label style="margin-top:5px;">Martial Status <span class="text-danger">  *</span>:</label><br>
                                         <div style="display:flex; align-items:start;gap:20px;margin-left:10px;margin-top:2px;">
                                         <div class="gender"style="display:flex;wrap:nowrap;gap:5px;">
                                            <input class="form-check" type="radio" wire:model="marital_status"  wire:change="marriedStatus" value="unmarried" id="unmarriedRadio" name="marital_status_group" style="height:12px;width:12px;">
                                            <label class="form-check-label" for="unmarriedRadio" style="margin-top:3px;">Unmarried</label>
                                        </div>
                                        <div class="gender"style="display:flex;wrap:nowrap;gap:5px;">
                                            <input class="form-check" type="radio" wire:model="marital_status"  wire:change="marriedStatus" value="married" id="marriedRadio" name="marital_status_group"style="height:12px;width:12px;">
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
                                    <div class="group" style="display:flex;wrap:nowrap; gap:20px;margin:10px 0;" >
                                        <label>Physically Challenge <span class="text-danger">  *</span></label><br>
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
                                    <div style="margin:5px 0 20px 0"><h5>Other Details</h5></div>  
                                        <div class="form-group" >
                                                <label for="nick_name">Nick Name :</label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter nick name" wire:model="nick_name"  style="margin-bottom:10px;">
                                                @error('nick_name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="emergency_contact">Emergency Contact :</label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter emergency phone number" wire:model="emergency_contact"  style="margin-bottom:10px;">
                                                @error('emergency_contact') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="time_zone">Time Zone :</label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter time zone" wire:model="time_zone" style="margin-bottom:10px;">
                                                @error('time_zone') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="pf_no">PF Number :</label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter PF number" wire:model="pf_no" style="margin-bottom:10px;">
                                                @error('pf_no') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="pan_no">Pan Number :</label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter PAN number" wire:model="pan_no" style="margin-bottom:10px;">
                                                @error('pan_no') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="biography">Biography :</label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter biography" wire:model="biography" style="margin-bottom:10px;">
                                                @error('biography') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="facebook">Facebook :</label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter your facebook URL" wire:model="facebook" style="margin-bottom:10px;">
                                                @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="linked_in">LinkedIn :</label>
                                                <input type="text" class="form-control placeholder-small" placeholder="Enter your LinkedIn URL" wire:model="linked_in" style="margin-bottom:10px;">
                                                @error('linked_in') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="twitter">Twitter :</label>
                                                <input type="text"class="form-control placeholder-small" placeholder="Enter your twitter URL" wire:model="twitter" style="margin-bottom:10px;">
                                                @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                           
                                            <div class="form-group" >
                                                <label for="skill_set">Skill Set<span class="text-danger">  *</span></label>
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

    <div class="row" style="margin-top: 10px; width: 100%;paddng:0;">

    
    <div class="col-md-3" style=" background-color: #f2f2f2;; border-radius: 5px; color:rgb(2, 17, 79);  text-align:center; margin-right: 10px; padding: 15px;"><h6>Our Employees</h6>
       </div>
       <div class="col-md-8 info" style=" background-color: #f2f2f2; border-radius: 5px; padding: 15px 20px; display: flex; flex-direction: column;">
       <div >
                 @if ($selectedCustomer)
                   <div class="emp-content" >
                        <div >
                            @php
                            $selectedPerson = $selectedCustomer ?? $customers->first();
                            $isActive = $selectedPerson->status == 'active';
                            @endphp
                        </div>
                          <div class="details">
                                <div class="col-md-6" >
                                    <div class="align-data">
                                        <strong>Employee Name </strong> 
                                        <span><strong>:</strong> {{ optional($selectedPerson)->first_name }} {{ optional($selectedPerson)->last_name }}</span>
                                    </div>
                                     <div class="align-data">
                                        <strong>Employee ID </strong> 
                                        <span> <strong>:</strong> (#{{ optional($selectedPerson)->emp_id }})</span>
                                     </div>
                                     <div class="align-data">
                                        <strong>Phone </strong> 
                                        <span> <strong>:</strong> {{ optional($selectedPerson)->mobile_number }}</span>
                                     </div>
                                     @if (!empty($showSOLists))
                                            @php
                                                $contractCompany = $showSOLists[0]->customer_company_name ?? null;
                                            @endphp
                                            <div class="align-data">
                                                <strong>Contract Company </strong> 
                                                <span> <strong>:</strong> {{ $contractCompany ?: 'On Bench' }}</span>
                                            </div>
                                        @else
                                            <div class="align-data">
                                                <strong>Work Status </strong> 
                                                <span> <strong>:</strong>On Bench</span>
                                            </div>
                                        @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="align-data">
                                       <strong style="white-space: nowrap;">Address</strong>
                                        <span style="line-height:1.6;"><strong>:</strong> {{ optional($selectedPerson)->address }},{{ optional($selectedPerson)->city }}</span>
                                    </div>
                                    <div class="align-data">
                                        <strong>Company Email</strong>
                                        <span style="white-space: nowrap; overflow-wrap: break-word; max-width: calc(100% - 20px);"><strong>:</strong> {{ optional($selectedPerson)->company_email }}</span>
                                    </div>
                                    <div class="align-data">
                                       <strong>Company Name</strong>
                                        <span><strong>:</strong> {{ optional($selectedPerson)->company_name }}</span>
                                    </div>
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

            <div class="emp-content" >
                        <div >
                            @php
                            $selectedPerson = $selectedCustomer ?? $customers->first();
                            $isActive = $selectedPerson->status == 'active';
                            @endphp
                            
                        </div>
                      
                          <div class="details"  >
                              
                                <div class="col-md-6" >
                                    <div class="align-data">
                                        <strong>Employee Name </strong> 
                                        <span><strong>:</strong> {{ optional($selectedPerson)->first_name }} {{ optional($selectedPerson)->last_name }}</span>
                                    </div>
                                     <div class="align-data">
                                        <strong>Employee ID </strong> 
                                        <span> <strong>:</strong> (#{{ optional($selectedPerson)->emp_id }})</span>
                                     </div>
                                     <div class="align-data">
                                        <strong>Phone </strong> 
                                        <span> <strong>:</strong> {{ optional($selectedPerson)->mobile_number }}</span>
                                     </div>
                                     @if (!empty($showSOLists))
                                        @php
                                            $contractCompany = $showSOLists[0]->customer_company_name ?? null;
                                        @endphp
                                        <div class="align-data">
                                            <strong>Contract Company </strong> 
                                            <span> <strong>:</strong> {{ $contractCompany ?: 'On Bench' }}</span>
                                        </div>
                                    @else
                                        <div class="align-data">
                                            <strong>Work Status </strong> 
                                            <span> <strong>:</strong> On Bench</span>
                                        </div>
                                    @endif

                                </div>

                                <div class="col-md-6">
                                    <div class="align-data">
                                       <strong style="white-space: nowrap;">Address</strong>
                                        <span style="line-height:1.6;"><strong>:</strong> {{ optional($selectedPerson)->address }},{{ optional($selectedPerson)->city }}</span>
                                    </div>
                                    <div class="align-data">
                                        <strong>Company Email</strong>
                                        <span style="white-space: nowrap; overflow-wrap: break-word; max-width: calc(100% - 20px);"><strong>:</strong> {{ optional($selectedPerson)->company_email }}</span>
                                    </div>

                                    <div class="align-data">
                                       <strong>Company Name</strong>
                                        <span><strong>:</strong> {{ optional($selectedPerson)->company_name }}</span>
                                    </div>
                                  </div>
                          </div>
                     </div>
            @endif

        </div>
       </div>
     
       @if ($allCustomers->isEmpty())
    <div class="container" style="border:1px solid #ccc; display:flex; flex-direction:column; width:80%;border-radius:10px;box-shadow:1px 1px 0px 0 rgba(0,0,0,0.1);">
            <img src="https://img.freepik.com/premium-vector/no-data-concept-illustration_86047-488.jpg" alt="" style="width:400px; height:400px;">
            <p style="color:#778899; text-align:center; font-weight:500;">No data found</p>
     @else
    <div class="row" style="margin-top: 10px; width: 100%;height:350px; padding:0;">
        <div class="col-md-3" style=" background-color: #f2f2f2;; border-radius: 5px; margin-right: 10px; ">
        <div class="container" style="margin-top: 15px; padding:0;">
                <div class="row" >
                    <div class="col" style="margin: 0px; padding: 0px">
                        <div class="input-groups" style="display:flex;">
                            <input wire:model="searchTerm"  type="text" class="form-control" placeholder="Search for Name or ID" aria-label="Search" aria-describedby="basic-addon1">
                            <div class="input-groups-append">
                                <button wire:click="filter" style="height: 28px; border-radius: 0 5px 5px 0; background-color: #003767; color: #fff; border: none;" class="btn" type="button">
                                    <i style="text-align: center;" class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="scroll-container" >
            @foreach($allCustomers as $customer)
                    <div wire:click="selectCustomer('{{ $customer->customer_id }}', '{{ $customer->emp_id }}')" class="container" style="width:95%; background-color: {{ optional($selectedCustomer)->customer_id == $customer->customer_id && optional($selectedCustomer)->emp_id == $customer->emp_id ? '#ccc' : 'white' }}; border-radius: 5px; padding:10px auto; cursor: pointer;">
                        <div class="employee-data">
                            <span style="font-size: 0.725rem;  display: block;white-space: nowrap;text-overflow: ellipsis;  max-width: 150px;  line-height: 1.2;overflow: hidden;">{{ $customer->first_name }} {{ $customer->last_name }}</span> 
                            <span style="color: #778899; font-size: 0.625rem;">(#{{ $customer->emp_id }})</span>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- Details of the selected person -->
      
            <div class="col-md-8" style=" background-color: #f2f2f2; border-radius: 5px; padding: 10px 15px;">
            <div style="text-align: start; diplay:flex;">
            @php
            $selectCustomer = $this->selectedCustomer ??  $this->customers->first();
            @endphp
               <button class="button-btn" wire:click="updateAndShowSoList('{{ optional ($selectCustomer)->emp_id }}')" style="{{ $activeButton === 'SO' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 5px; border-radius: 5px; border: none;">
                    Working With
                </button>
                    <button class="button-btn" style="background-color:grey ;" >Email Activities</button>
                    <button class="button-btn"  style="background-color:  grey;" >Notes</button>
                    <button class="button-btn" style="background-color: grey;" >Time Sheets</button>
            </div>
           


@if($activeButton=="SO")
@if (!empty($showSOLists))
<div>
<table class="table">
    <thead>
        <tr>
            <th>Serial No</th>
            <th>Company ID's</th>
            <th>Company Names</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Time Sheet Type</th>
            <th>Time Sheet Begins</th>
            <th>Invoice Type</th>
            <th>Payment Terms</th>
            <th>SO To </th>
        </tr>
    </thead>
    <tbody>
    @php
    $serialNumber = 1;
   @endphp
  @forelse($showSOLists as $index => $salesOrder)
    @php
        $endDate = \Carbon\Carbon::parse($salesOrder->end_date);
        $currentDate = now();
    @endphp

    @if ($endDate->greaterThanOrEqualTo($currentDate))
        <tr>
            <td>{{ $serialNumber++ }}</td>
            <td>{{ $salesOrder->cus->customer_id }}</td>
            <td>{{ $salesOrder->cus->customer_company_name }}</td>
            <td>{{ \Carbon\Carbon::parse($salesOrder->start_date)->format('d-m-Y') }}</td>
            <td>{{ $endDate->format('d-m-Y') }}</td>
            <td>{{ $salesOrder->time_sheet_type }}</td>
            <td>{{ $salesOrder->time_sheet_begins }}</td>
            <td>{{ $salesOrder->invoice_type }}</td>
            <td>{{ $salesOrder->payment_terms }}</td>
            <td>{{ $salesOrder->com->company_name }}</td>
        </tr>
    @endif

@empty
    <tr>
        <td colspan="12" style="text-align: center;">No Data Found</td>
    </tr>
@endforelse

    </tbody>
</table>
</div>
@else
        <!-- Display a message when showSOLists is empty -->
        <div style="margin-top:20px;">
                <div style="background:white; border:1px solid #ccc; border-radius:5px; text-align:center; font-size:0.725rem; display:flex; justify-content:center; align-items:center; height: 200px;">
                    <p>No contract projects found for the selected employee.</p>
                </div>
            </div>

    @endif
@endif
        </div>
     </div>
    </div>

</div>