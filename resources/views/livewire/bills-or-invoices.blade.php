<div style="padding: 20px;">
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

        .modal-content {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .blurred-backdrop {
            filter: blur(5px);
            /* Adjust the blur intensity as needed */
        }

        .error {
            font-size: 12px;
            color: red;
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

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            color: #343a40;
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
    </style>

    <body>
        <div style="text-align: start">
            <button wire:click="openBill" style="margin-right: 10px;" class="button">ADD Bill</button>
            <button wire:click="openInvoice" style="margin-right: 10px;" class="button">ADD Invoice</button>
        </div>
        @if(session()->has('add-bill'))
        <div id="successAlert" style="text-align: center;" class="alert alert-success">
            {{ session('add-bill') }}
        </div>
        @elseif(session()->has('add-invoice'))
        <div id="salesOrderAlert" style="text-align: center;" class="alert alert-success">
            {{ session('add-invoice') }}
        </div>
        @endif
        <script>
            setTimeout(function() {
                document.getElementById('successAlert').style.display = 'none';
                document.getElementById('salesOrderAlert').style.display = 'none';
            }, 5000);
        </script>

        @if($invoice=="true")
        <div id="salesOrderrModal" class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                        <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>Add Invoice</b></h5>
                        <button wire:click="closeInvoice" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                            <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="addInvoice">

                            <div class="form-group">
                                <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Customer Name:</label>
                                <select wire:change="callCustomer" style="font-size: 12px;" class="form-control" id="vendorName" wire:model="customer_name">
                                    <option style="font-size: 12px;" value="">Select Customer</option>
                                    <option style="font-size: 12px;" value="addCustomer">
                                        << Add Customer>>
                                    </option>
                                    @foreach($customers as $customer)
                                    <option style="font-size: 12px;" value="{{ $customer->customer_id }}">{{ $customer->customer_company_name }}</option>
                                    @endforeach
                                </select>
                                @error('customer_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="amount" style="font-size: 12px;">Amount:</label>
                                <input type="text" wire:model="amount">
                                @error('amount') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="due_date" style="font-size: 12px;">Due Date:</label>
                                <input style="font-size: 12px;" id="due_date" type="text" wire:model="due_date"x-data x-init="initDatepicker($refs.due_date, 'M-d-Y')" x-ref="due_date" class="form-control">

                                @error('due_date') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;" for="invoiceType">Payment Net Terms:</label>
                                <select style="font-size: 12px;" class="form-control" id="invoiceType" wire:model="payment_terms">
                                    <option style="font-size: 12px;">Select payment net terms</option>
                                    <option style="font-size: 12px;" value="Net 0">Net 0</option>
                                    <option style="font-size: 12px;" value="Net 15">Net 15</option>
                                    <option style="font-size: 12px;" value="Net 0">Net 30</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('payment_terms') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="description" style="font-size: 12px;">Description:</label>
                                <textarea wire:model="description"></textarea>
                                @error('description') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="status" style="font-size: 12px;">Status:</label>
                                <input type="text" wire:model="status">
                                @error('status') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="currency" style="font-size: 12px;">Currency:</label>
                                <input type="text" wire:model="currency">
                                @error('currency') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="notes" style="font-size: 12px;">Notes:</label>
                                <textarea wire:model="notes"></textarea>
                                @error('notes') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>


                            <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                                <button style="font-size: 12px;" class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalBackdrop" class="modal-backdrop fade show"></div>
        @endif




        @if($bill=="true")
        <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                        <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>Add Bill</b></h5>
                        <button wire:click="closeBill" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                            <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="addBill">


                            <div class="form-group">
                                <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Vendor Name:</label>
                                <select wire:change="callVendor" style="font-size: 12px;" class="form-control" id="vendorName" wire:model="vendor_name">
                                    <option style="font-size: 12px;" value="">Select Vendor</option>
                                    <option style="font-size: 12px;" value="addVendor">
                                        << Add Vendor>>
                                    </option>
                                    @foreach($vendors as $vendor)
                                    <option style="font-size: 12px;" value="{{ $vendor->vendor_id }}">{{ $vendor->vendor_name }}</option>
                                    @endforeach
                                </select>
                                @error('vendor_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>



                            <div>
                                <label for="amount" style="font-size: 12px;">Amount:</label>
                                <input type="text" wire:model="amount">
                                @error('amount') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="due_date" style="font-size: 12px;">Due Date:</label>
                                <input style="font-size: 12px;" id="due_date" type="text" wire:model="due_date"x-data x-init="initDatepicker($refs.due_date, 'M-d-Y')" x-ref="due_date" class="form-control">

                                @error('due_date') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;" for="invoiceType">Payment Net Terms:</label>
                                <select style="font-size: 12px;" class="form-control" id="invoiceType" wire:model="payment_terms">
                                    <option style="font-size: 12px;">Select payment net terms</option>
                                    <option style="font-size: 12px;" value="Net 0">Net 0</option>
                                    <option style="font-size: 12px;" value="Net 15">Net 15</option>
                                    <option style="font-size: 12px;" value="Net 0">Net 30</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('payment_terms') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="description" style="font-size: 12px;">Description:</label>
                                <textarea wire:model="description"></textarea>
                                @error('description') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="status" style="font-size: 12px;">Status:</label>
                                <input type="text" wire:model="status">
                                @error('status') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="currency" style="font-size: 12px;">Currency:</label>
                                <input type="text" wire:model="currency">
                                @error('currency') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="notes" style="font-size: 12px;">Notes:</label>
                                <textarea wire:model="notes"></textarea>
                                @error('notes') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>


                            <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                                <button style="font-size: 12px;" class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalBackdrop" class="modal-backdrop fade show"></div>

        @endif



        @if($show=="true")
        <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                        <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Customers Details</b></h5>
                        <button wire:click="closeCustomer" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
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
                                <button class="btn btn-danger" wire:click="closeCustomer" type="button" style="font-size: 12px;">Cancel</button>
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
                                <button style="margin-left: 5%; font-size: 12px;" class="btn btn-success" type="submit">Submit</button>
                                <button class="btn btn-danger" wire:click="closeVendor" type="button" style="font-size: 12px;">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show blurred-backdrop"></div>
        @endif
        <p style="text-align: center;">
            <button class="button" wire:click="$set('activeButton', 'Bills')" style="{{ $activeButton === 'Bills' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }}; margin-right: 10px; border-radius: 5px; border: none">
                View Bill's
            </button>
            <button class="button" wire:click="$set('activeButton', 'Invoices')" style="{{ $activeButton === 'Invoices' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }};margin-right: 10px; border-radius: 5px; border: none;">
                View Invoice's
            </button>

            @if($activeButton=="Invoices")
        <table class="table">
            <thead>
                <tr>
                    <th>Invoice Number</th>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th>Payment Terms</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Currency</th>
                    <th>Notes</th>
                    <th>Invoiced By</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->customer_id }}</td>
                    <td>{{ $invoice->customer->customer_company_name }}</td>
                    <td>{{ $invoice->amount }}</td>
                    <td>{{ $invoice->due_date }}</td>
                    <td>{{ $invoice->payment_terms }}</td>
                    <td>{{ $invoice->description }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>{{ $invoice->currency }}</td>
                    <td>{{ $invoice->notes }}</td>
                    <td>{{ $invoice->company->company_name }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" style="text-align: center;">Invoices Not Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @endif

        @if($activeButton=="Bills")
        <table class="table">
            <thead>
                <tr>
                    <th>Bill Number</th>
                    <th>Vendor ID</th>
                    <th>Vendor Name</th>
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
                    <td>{{ $bill->vendor->vendor_name }}</td>
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

        @endif
        </p>




    </body>
</div>

<script>
    function initDatepicker(el, format) {
        flatpickr(el, {
            dateFormat: format,
        });
    }
</script>