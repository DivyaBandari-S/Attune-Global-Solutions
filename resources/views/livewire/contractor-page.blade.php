<div style="padding:10px 15px; background:#fff; ">
    <!-- Add this to your HTML file -->
    <style>
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
           gap:20px;
           font-size:0.725rem;
           padding:5px 10px;
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
            background-color:grey;
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
      .scroll-container {
          overflow-y: auto;
          padding:5px;
          min-height: 250px;
          max-height: 350px;
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
      @media (max-width: 760px) {
    .details {
        flex-direction: column;
        align-items: flex-start;
    }

    .col-md-6 {
        width: 100%;
        margin-bottom: 10px; /* Add some space between the columns */
    }
  
}

    </style>
       <div style="margin-top:40px;display:flex;justify-content:flex-end; ">
          <button class="button" style="text-align:center; padding:3px 10px;font-size:0.795rem;"><a href="{{route('emp-register')}}" style="outline:none;text-decoration:none;color:#fff;">ADD Contractors</a></button>
          <button class="button" style="text-align:center; padding:3px 10px;font-size:0.795rem;margin-left:10px;"><a href="{{route('employee-list-page')}}" style="outline:none;text-decoration:none;color:#fff;">Employees List</a></button>
       </div>
     <div>
     @if(session()->has('success'))
    <div style="text-align: center;" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
   
    <div class="row" style="margin-top: 10px; width: 100%;paddng:0;">
       <div class="col-md-3" style=" background-color: #f2f2f2;; border-radius: 5px; color:rgb(2, 17, 79);  text-align:center; margin-right: 10px; padding: 15px;"><h6>Contractors List</h6>
       </div>
       <div class="col-md-8 info" style=" background-color: #f2f2f2; border-radius: 5px; padding: 15px 20px; display: flex; flex-direction: column;">
       <div >
                 @if ($selectedContractor)
                   <div class="emp-content" >
                        <div >
                            @php
                            $selectedPerson = $selectedContractor ?? $customers->first();
                            $isActive = $selectedPerson->status == 'active';
                            @endphp
                        </div>
                          <div class="details" >
                         
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
                                     
                                </div>

                                <div class="col-md-6">
                                    <div class="align-data">
                                       <strong style="white-space: nowrap;">Address</strong>
                                        <span style="line-height:1.6;"><strong>:</strong> {{ optional($selectedPerson)->address }}</span>
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

            @elseif (!$contractors->isEmpty())
            <!-- Display details of the first person in the list -->
            @php
            $firstPerson = $contractors->first();
            $starredPerson = DB::table('customer_details')
            ->where('customer_id', $firstPerson->customer_id)
            ->first();
            @endphp

            <div class="emp-content" >
                        <div >
                            @php
                            $selectedPerson = $selectedContractor ?? $contractors->first();
                            $isActive = $selectedPerson->status == 'active';
                            @endphp
                            
                        </div>
                      
                          <div class="details" >
                              
                                <div class="col-md-6" >
                                    <div class="align-data">
                                        <strong>Contractor Name </strong> 
                                        <span><strong>:</strong> {{ optional($selectedPerson)->first_name }} {{ optional($selectedPerson)->last_name }}</span>
                                    </div>
                                     <div class="align-data">
                                        <strong>Contractor ID </strong> 
                                        <span> <strong>:</strong> (#{{ optional($selectedPerson)->emp_id }})</span>
                                     </div>
                                     <div class="align-data">
                                        <strong>Phone </strong> 
                                        <span> <strong>:</strong> {{ optional($selectedPerson)->mobile_number }}</span>
                                     </div>
                                    
                                </div>

                                <div class="col-md-6">
                                    <div class="align-data">
                                       <strong style="white-space: nowrap;">Address</strong>
                                        <span style="line-height:1.6;"><strong>:</strong> {{ optional($selectedPerson)->address }}</span>
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
     
       @if ($allContractors->isEmpty())
    <div class="container" style="border:1px solid #ccc; display:flex; flex-direction:column; width:80%;border-radius:10px;box-shadow:1px 1px 0px 0 rgba(0,0,0,0.1);">
            <img src="https://img.freepik.com/premium-vector/no-data-concept-illustration_86047-488.jpg" alt="" style="width:400px; height:400px;">
            <p style="color:#778899; text-align:center; font-weight:500;">No data found</p>
     @else
    <div class="row" style="margin-top: 10px; width: 100%; padding:0;">
        <div class="col-md-3" style=" background-color: #f2f2f2;; border-radius: 5px; margin-right: 10px; ">
            <div class="container" style="margin-top: 15px; padding:0;">
                <div class="row" >
                    <div class="col" style="margin: 0px; padding: 0px">
                        <div class="input-group" style="display:flex;">
                            <input wire:model="searchTerm" style="font-size: 11px; width:80%;box-sizing: border-boxcursor: pointer; border-radius: 5px 0 0 5px;" type="text" class="form-control" placeholder="Search for Name or ID" aria-label="Search" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button wire:click="filter" style="height: 28px; border-radius: 0 5px 5px 0; background-color: #003767; color: #fff; border: none;" class="btn" type="button">
                                    <i style="text-align: center;" class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="scroll-container" >
            @foreach($allContractors as $customer)
            <div wire:click="selectContractor('{{ $customer->customer_id }}', '{{ $customer->emp_id }}')" class="container" style="width:95%; background-color: {{ $selectedContractor && $selectedContractor->customer_id == $customer->customer_id ? '#ccc' : 'white' }}; border-radius: 5px; padding:10px auto; cursor: pointer;">

        <div class="employee-data">
            <span style="font-size: 0.795rem; display: block; white-space: nowrap; text-overflow: ellipsis; max-width: 150px; line-height: 1.2; overflow: hidden;">{{ $customer->first_name }} {{ $customer->last_name }}</span>
            <span style="color: #778899; font-size: 0.625rem;">(#{{ $customer->emp_id }})</span>
        </div>
    </div>
@endforeach

                @endif
            </div>
        </div>

        <!-- Details of the selected person -->
      
            <div class="col-md-8" style=" background-color: #f2f2f2; border-radius: 5px; padding: 10px 15px;">
            @php
            $selectContractor = $this->selectedContractor ??  $this->contractors->first();
            @endphp
                <div style="text-align: start; diplay:flex;">
                <button class="button-btn" wire:click="updateAndShowSoList('{{ optional($selectContractor)->emp_id }}')" style="{{ $activeButton === 'SO' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 5px; border-radius: 5px; border: none;">
        Working Project
    </button>



                    <button class="button-btn" wire:click="showContent('showEmailActivities')" @if($showEmailActivities) style="background-color:  rgb(2, 17, 79);" @endif>Email Activities</button>
                    <button class="button-btn" wire:click="showContent('showNotes')" @if($showNotes) style="background-color:  rgb(2, 17, 79);" @endif>Notes</button>
                    <button class="button-btn" wire:click="showContent('showTimeSheets')" @if($showTimeSheets) style="background-color:  rgb(2, 17, 79);" @endif>Time Sheets</button>
                </div>

                @if($activeButton=="SO")

<!-- resources/views/livewire/purchase-order-table.blade.php -->

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
  @forelse($showSOLists as  $salesOrder)
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
        <td colspan="12" style="text-align: center;">Contractors Not Found</td>
    </tr>
@endforelse

    </tbody>
</table>

</div>
@endif
                 
            </div>
         </div>
    </div>

</div>