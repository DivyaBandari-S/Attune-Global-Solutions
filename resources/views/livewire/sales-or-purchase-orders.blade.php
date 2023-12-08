<div style="padding:20px">
    <html>
    <style>
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

        .error {
            font-size: 12px;
            color: red;
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

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            color: #343a40;
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

        .button {
            background-color: rgb(2, 17, 79);
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            padding: 3px;
            font-size: 12px;
            transition: background-color 0.3s ease-in-out;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .modal-content {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
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

    </html>

    <body>
        <div style="text-align: start;">
            <button style="margin-right: 10px;" wire:click="addSO" class="button">ADD SO</button>
            <button style="margin-right: 10px;" wire:click="addPO" class="button">ADD PO</button>
        </div>
        @if(session()->has('purchase-order'))
        <div id="purchaseOrderAlert" style="text-align: center;" class="alert alert-success">
            {{ session('purchase-order') }}
        </div>
        @elseif(session()->has('sales-order'))
        <div id="salesOrderAlert" style="text-align: center;" class="alert alert-success">
            {{ session('sales-order') }}
        </div>
        @endif
        <script>
            setTimeout(function() {
                document.getElementById('successAlert').style.display = 'none';
                document.getElementById('purchaseOrderAlert').style.display = 'none';
                document.getElementById('salesOrderAlert').style.display = 'none';
            }, 5000);
        </script>

        <p style="text-align: center;">
            <button wire:click="$set('activeButton', 'SO')" style="{{ $activeButton === 'SO' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 10px; border-radius: 5px; border: none;">
                View SO's
            </button>
            <button wire:click="$set('activeButton', 'PO')" style="{{ $activeButton === 'PO' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 10px; border-radius: 5px; border: none;">
                View PO's
            </button>

        </p>

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

        <div class="modal-backdrop fade show blurred-backdrop"></div>
        @endif

        @if($showVendor=="true")
        <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                        <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Vendors Details</b></h5>
                        <button wire:click="closeVendor" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                            <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="addVendors">



                            <div>
                                <label for="customer_company_name" style="font-size: 12px;">Vendor Name:</label>
                                <input type="text" wire:model="vendor_company_name">
                                @error('vendor_company_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="customer_name" style="font-size: 12px;">Contact Name:</label>
                                <input type="text" wire:model="vendor_name">
                                @error('vendor_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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



        @if($so=="true")
        <div id="salesOrderModal" class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                        <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Sales Order</b></h5>
                        <button wire:click="closeSO" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
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
                                    <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Consultant Name:</label>
                                    <select wire:change="selectedConsultantId" style="font-size: 12px;" class="form-control" wire:model="consultantName">
                                        <option style="font-size: 12px;" value="">Select Consultant</option>
                                        <option style="font-size: 12px;" value="addConsultant" >
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
                                        <option style="font-size: 12px;" value="addCustomer">
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


        <!-- !-- modal --> 
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




        @if($activeButton=="PO")

        <!-- resources/views/livewire/purchase-order-table.blade.php -->

        <div>
            <style>
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
            </style>

            <table class="table">
                <thead>
                    <tr>
                        <th>PO Number</th>
                        <th>Vendor ID</th>
                        <th>Vendor Name</th>
                        <th>Employee Name</th>
                        <th>Employee Type</th>
                        <th>Job Title</th>
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
                        <td>{{ $salesOrder->emp->employee_type }}</td>
                        <td>{{ $salesOrder->emp->job_title }}</td>
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
                        <td colspan="13" style="text-align: center;">PurchaseOrders Not Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endif
        


        @if($po=="true")
        <div id="purchaseOrderModal" class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                        <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Purchase Order</b></h5>
                        <button wire:click="closePO" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
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

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Consultant Name:</label>
                                            <select wire:change="selectedConsultantPoId" style="font-size: 12px;" class="form-control" wire:model="consultantName">
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
                                    <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Vendor Name:</label>
                                    <select wire:change="callVendor" style="font-size: 12px;" class="form-control" id="vendorName" wire:model="vendorName">
                                        <option style="font-size: 12px;" value="">Select Vendor</option>
                                        <option style="font-size: 12px;" value="addVendor">
                                            << Add Vendor>>
                                        </option>
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
                                    <button style="margin-top: 15px;font-size:12px" type="submit" class="btn btn-success">Submit Purchase Order</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalBackdrop" class="modal-backdrop fade show"></div>

        @endif






        @if($activeButton=="SO")

        <!-- resources/views/livewire/purchase-order-table.blade.php -->

        <div>
            <style>
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
            </style>

            <table class="table">
                <thead>
                    <tr>
                        <th>SO Number</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Employee Name</th>
                        <th>Employee Type</th>
                        <th>Job Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Time Sheet Type</th>
                        <th>Time Sheet Begins</th>
                        <th>Invoice Type</th>
                        <th>Payment Terms</th>
                        <th>SO to</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($showSOLists as $salesOrder)
                    <tr>
                        <td>{{ $salesOrder->so_number }}</td>
                        <td>{{ $salesOrder->customer_id }}</td>
                        <td>{{ $salesOrder->cus->customer_company_name }}</td>
                        <td>{{ $salesOrder->emp->first_name }} {{ $salesOrder->emp->last_name }}</td>
                        <td>{{ $salesOrder->emp->employee_type }}</td>
                        <td>{{ $salesOrder->emp->job_title }}</td>
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
                        <td colspan="13" style="text-align: center;">SalesOrders Not Found</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        @endif
    </body>

</div>

<script>
    function initDatepicker(el, format) {
        flatpickr(el, {
            dateFormat: format,
        });
    }
</script>