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
                    width: 100px;
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
                        <th>Date</th>
                        <th>Type</th>
                        <th>No</th>
                        <th>Consultant Name</th>
                        <th>Rate</th>
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
                        <td>PO</td>
                        <td>{{ $salesOrder->po_number }}</td>
                        <td>{{ $salesOrder->emp->first_name }} {{ $salesOrder->emp->last_name }}</td>
                        <td>{{ $salesOrder->rate }}</td>
                        <td>{{ \Carbon\Carbon::parse($salesOrder->start_date)->format('M-d-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($salesOrder->end_date)->format('M-d-Y') }}</td>
                        <td>{{ $salesOrder->time_sheet_type }}</td>
                        <td>{{ $salesOrder->invoice_type }}</td>
                        <td>{{ $salesOrder->payment_terms }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" style="text-align: center;">PurchaseOrders Not Found</td>
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
                    width: 100px;
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
                        <th>Date</th>
                        <th>Type</th>
                        <th>No</th>
                        <th>Consultant Name</th>
                        <th>Rate</th>
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
                        <td>{{ $salesOrder->emp->first_name }} {{ $salesOrder->emp->last_name }}</td>
                        <td>{{ $salesOrder->rate }}</td>
                        <td>{{ \Carbon\Carbon::parse($salesOrder->start_date)->format('M-d-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($salesOrder->end_date)->format('M-d-Y') }}</td>
                        <td>{{ $salesOrder->time_sheet_type }}</td>
                        <td>{{ $salesOrder->invoice_type }}</td>
                        <td>{{ $salesOrder->payment_terms }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" style="text-align: center;">SalesOrders Not Found</td>
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