<div>
<style>
    body{
        font-family: 'Roboto', sans-serif;
    }
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
<div>
    <div class="container" style="padding:0px;">
    <div id="alert-container" class="alert-container">
            <span id="close-btn" class="close-btn">&times;</span>
            @if(session()->has('emp_success'))
                {{ session('emp_success') }}
            @endif
        </div>
        <script>
        // Wait for the document to be ready (if using jQuery)
        $(document).ready(function() {
            // Show the alert container
            $('#alert-container').fadeIn();

            // Set a timeout to hide the alert after a certain duration (e.g., 5000 milliseconds)
            setTimeout(function() {
                $('#alert-container').fadeOut();
            }, 5000); // Adjust the duration as needed

            // Close the alert on close button click
            $('#close-btn').on('click', function() {
                $('#alert-container').fadeOut();
            });
        });
    </script>
<!-- modal -->
@if($show=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Customers Details</b></h5>
                    <button wire:click="close" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div class="card-header" style="background-color: #00234f;padding:7px;width:35%;margin-left:30%; border-radius:20px;">
                        <h5 class="mb-0" style="text-align: center;color:white;font-size:0.955rem;">Employee Registration Form</h5>
                    </div>
                    <form wire:submit.prevent="register" enctype="multipart/form-data">
                            <div class="row">
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
                                        <input style="font-size: 12px;" id="hire_date" type="text"  wire:model="hire_date" x-Data-x-init="initDatepicker($refs.hire_date, 'M-d-Y')" x-ref="hire_date" class="form-control">
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
        <div class="container " style=" padding:10px;background:#f2f2f2;border:1px solid #ccc;">
            <div class="col-md-12">
                <div class="emp-container" style="padding:0; margin:0 auto;">
                     <div style="display:flex;justify-content:end;">
                     <a style="text-decoration:none;font-weight:600;color:#00459c;"href="{{route('employee-list-page')}}"><button class="view-button">View Employees</button></a>
                     <a style="text-decoration:none;font-weight:600;color:#00459c;"href="{{route('contractor-page')}}"><button class="view-button">View Contractors</button></a>
                    </div>
                    <button style="margin-right: 5px; font-size: 13px; background-color: #02114f;" wire:click="open" class="btn btn-primary">ADD Customers</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function initDatepicker(el, format) {
        flatpickr(el, {
            dateFormat: format,
        });
    }
</script>
</div>