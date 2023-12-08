<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Models\CompanyDetails;
use App\Models\CustomerDetails;
use App\Models\EmpDetails;
use App\Models\Invoice;
use App\Models\PurchaseOrder;
use App\Models\SalesOrder;
use App\Models\VendorDetails;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Customers extends Component
{
    use WithFileUploads;
    public $vendorId;
    public $rate;
    public $rateType;
    public $endClientTimesheetRequired;
    public $timeSheetType;
    public $timeSheetBegins;
    public $invoiceType;
    public $paymentType;
    public $customers, $selected_customer;
    public $company_name;
    public $show = false;

    public  $customer_profile, $company_id, $customer_name, $email, $phone, $address, $notes, $customer_company_name;
    public $selectedDate;
    public function updatedSelectedDate()
    {
        // This method will be called when the date input changes
        // You can manually handle the date format conversion here
        $this->selectedDate = date('m-d-Y', strtotime($this->selectedDate));
    }

    public function hydrate()
    {
        // This method will be called on every Livewire request
        // Use it to manually update the date format for display
        $this->selectedDate = date('m-d-Y', strtotime($this->selectedDate));
    }

       public $selectedCustomer;
    public $customerId;
    public $soList = false;
    public $showSOLists;

    // employee registration
    public $emp_id;
    public $first_name;
    public $last_name;
    public $date_of_birth;
    public $gender;
    public $company_email;
    public $mobile_number;
    public $alternate_mobile_number;
    public $city;
    public $state;
    public $postal_code;
    public $country;
    public $hire_date;
    public $employee_type;
    public $department;
    public $manager_id;
    public $report_to;
    public $employee_status;
    public $emergency_contact;
    public $password;
    public $image;
    public $blood_group;
    public $nationality;
    public $religion;
    public $marital_status;
    public $spouse;
    public $physically_challenge;
    public $inter_emp;
    public $job_location;
    public $education;
    public $experience;
    public $pan_no;
    public $aadhar_no;
    public $pf_no;
    public $nick_name;
    public $time_zone;
    public $biography;
    public $facebook;
    public $twitter;
    public $linked_in;
    public $is_starred;
    public $skill_set;
    public $savedImage;
    public $isHr;
    public $contractor_company_id;
    public $showContractorField = false;
    public $regForm = false;

    public function employeeCall()
    {
        $this->showContractorField = $this->employee_type === 'contract';
    }
    
    public function regOpen()
    {
        $this->so = false;
        $this->regForm = true;
    }

    public function regClose()
    {
        $this->regForm = false;
        $this->so=true;
        $this->resetFieldsForSo();
    }
    
    public function register(){
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'email' => 'required|email|unique:emp_details',
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|unique:emp_details',
            'mobile_number' => 'required|string|max:15',
            'alternate_mobile_number' => 'nullable|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'hire_date' => 'required|date',
            'employee_type' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'manager_id' => 'required|string|max:255',
            'report_to' => 'required|string|max:255',
            'company_id' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'contractor_company_id' => $this->employee_type == 'contract' ? 'required|string|max:255' : '', // Add this line
        ]);

       $imagePath = $this->image->store('employee_image', 'public');
       $this->savedImage = $imagePath;
       $contractorCompanyId = $this->employee_type == 'contract' ? $this->contractor_company_id : null;
     
       
         EmpDetails::create([

            'emp_id' => $this->emp_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'email' => $this->email,
            'company_name' => $this->company_name,
            'company_email' => $this->company_email,
            'mobile_number' => $this->mobile_number,
            'alternate_mobile_number' => $this->alternate_mobile_number,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'country' => $this->country,
            'hire_date' => $this->hire_date,
            'employee_type' => $this->employee_type,
            'manager_id' => $this->manager_id,
            'report_to' => $this->report_to,
            'department' => $this->department,
            'job_title' => $this->job_title,
            'employee_status' => $this->employee_status,
            'emergency_contact' => $this->emergency_contact,
            'password' => $this->password,
            'image' => $imagePath, // Example storage for image upload
            'blood_group' => $this->blood_group,
            'nationality' => $this->nationality,
            'religion' => $this->religion,
            'marital_status' => $this->marital_status,
            'spouse' => $this->spouse,
            'physically_challenge' => $this->physically_challenge,
            'inter_emp' => $this->inter_emp,
            'job_location' => $this->job_location,
            'education' => $this->education,
            'experience' => $this->experience,
            'pan_no' => $this->pan_no,
            'aadhar_no' => $this->aadhar_no,
            'pf_no' => $this->pf_no,
            'nick_name' => $this->nick_name,
            'time_zone' => $this->time_zone,
            'biography' => $this->biography,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'linked_in' => $this->linked_in,
            'company_id' => $this->company_id,
            'is_starred' => $this->is_starred,
            'skill_set' => $this->skill_set,
            'contractor_company_id' => $contractorCompanyId,
           ]);

        session()->flash('emp_success', 'Employee registered successfully!');

        // Clear the form fields
        $this->reset();
        $this->regForm = false;
        $this->so = true;

    }

    public function updateAndShowSoList($customerId)
    {
        $this->activeButton = 'SO';
        $this->showSoList($customerId);
    }
    public $invoices;
    public function showInvoices($customerId)
    {
        $companyId = auth()->user()->company_id;

        $this->activeButton = 'Invoices';
        $this->invoices = Invoice::with('customer', 'company')->where('company_id', $companyId)->where('customer_id', $customerId)->orderBy('created_at', 'desc')->get();
    }
    public function showSoList($customerId)
    {
        $companyId = auth()->user()->company_id;

        $this->showSOLists = SalesOrder::with('cus', 'com', 'emp')->where('company_id', $companyId)->where('customer_id', $customerId)->orderBy('created_at', 'desc')->get();
        $this->soList = true;
    }
    public function closeSOList()
    {
        $this->soList = false;
    }
    public $job_title, $startDate, $endDate, $consultant_name, $customerName, $paymentTerms;
    public function resetFieldsForSo()
    {
        $this->rate = null;
        $this->rateType = null;
        $this->job_title = null;
        $this->endClientTimesheetRequired = null;
        $this->timeSheetType = null;
        $this->timeSheetBegins = null;
        $this->invoiceType = null;
        $this->paymentTerms = null;
        $this->consultant_name = null;
        $this->customerName = null;
        $this->startDate = null;
        $this->endDate = null;
    }
    public function saveSalesOrder()
    {
        $this->validate([
            'rate' => 'required',
            'rateType' => 'required',
            'job_title' => 'required',
            'endClientTimesheetRequired' => 'required',
            'timeSheetType' => 'required',
            'timeSheetBegins' => 'required',
            'invoiceType' => 'required',
            'paymentTerms' => 'required',
            'consultant_name' => 'required',
            'customerName' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        $companyId = auth()->user()->company_id;

        SalesOrder::create([
            'company_id' => $companyId,
            'emp_id' => $this->consultant_name,
            'customer_id' => $this->customerName,
            'job_title' => $this->job_title,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'rate' => $this->rate . ' ' . $this->rateType,
            'end_client_timesheet_required' => $this->endClientTimesheetRequired,
            'time_sheet_type' => $this->timeSheetType,
            'time_sheet_begins' => $this->timeSheetBegins,
            'invoice_type' => $this->invoiceType,
            'payment_terms' => $this->paymentTerms,
        ]);
        session()->flash('sales-order', 'Sales order submitted successfully.');
        $this->resetFieldsForSo();
        $this->so = false;
    }
    public function selectCustomer($customerId)
    {
        $this->selectedCustomer = CustomerDetails::where('customer_id', $customerId)->first();
    }

    public $filteredPeoples;
    public $peopleFound;

    public $searchTerm;
    public function filter()
    {
        // Trim the search term to remove leading and trailing spaces
        $trimmedSearchTerm = trim($this->searchTerm);

        // Use Eloquent to filter records based on the search term
        $this->filteredPeoples = CustomerDetails::where(function ($query) use ($trimmedSearchTerm) {
            $query->where('customer_company_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('customer_id', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('customer_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('status', 'LIKE', '%' . $trimmedSearchTerm . '%');
        })
            ->get();

        // Check if any records were found
        $this->peopleFound = count($this->filteredPeoples) > 0;
    }


    public function open()
    {
        $this->so = false;
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }
    public function resetFieldsForCus()
    {
        $this->customer_profile = null;
        $this->customer_name = null;
        $this->email = null;
        $this->phone = null;
        $this->address = null;
        $this->notes = null;
        $this->customer_company_name = null;
        // Add other fields you want to reset here
    }
    public function addCustomers()
    {

        $this->validate([
            'customer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'notes' => 'required',
            'customer_company_name' => 'required'
        ]);
        $companyId = auth()->user()->company_id;

        CustomerDetails::create([
            'company_id' => $companyId,
            'customer_name' => $this->customer_name,
            'customer_company_name' => $this->customer_company_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'notes' => $this->notes,
        ]);
        session()->flash('success', 'Customer added successfully.');
        $this->resetFieldsForCus();
        $this->resetFieldsForSo();
        $this->show = false;
    }

    public function addcCustomers()
    {

        $this->validate([
            'customer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'notes' => 'required',
            'customer_company_name' => 'required'
        ]);
        $companyId = auth()->user()->company_id;

        CustomerDetails::create([
            'company_id' => $companyId,
            'customer_name' => $this->customer_name,
            'customer_company_name' => $this->customer_company_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'notes' => $this->notes,
        ]);
        session()->flash('success', 'Customer added successfully.');
        $this->customer = false;
        $this->so = true;
    }

    public $edit = false;
    public $activeButton = 'EmailActivities';


    public $selectedCustomerId;
    public function editCustomers($customerId)
    {
        $this->selectedCustomerId = $customerId;

        $this->edit = true;
        $this->selected_customer = CustomerDetails::find($customerId);

        // Assign values to Livewire properties
        $this->customer_profile = $this->selected_customer->customer_company_logo;
        $this->company_id = $this->selected_customer->company_id;
        $this->customer_name = $this->selected_customer->customer_name;
        $this->customer_company_name = $this->selected_customer->customer_company_name;
        $this->email = $this->selected_customer->email;
        $this->phone = $this->selected_customer->phone;
        $this->address = $this->selected_customer->address;
        $this->notes = $this->selected_customer->notes;
    }
    public function closeEdit()
    {
        $this->edit = false;
    }

    public function updateCustomers()
    {
        $this->validate([
            'customer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'notes' => 'required',
            'customer_company_name' => 'required'
        ]);
        $customer = CustomerDetails::find($this->selectedCustomerId);

        if ($this->customer_profile instanceof \Illuminate\Http\UploadedFile) {
            $customerProfilePath = $this->customer_profile->store('customer_profiles', 'public');
            $customer->update(['customer_company_logo' => $customerProfilePath]);
        }
        $companyId = auth()->user()->company_id;


        $customer->update([
            'company_id' => $companyId,
            'customer_name' => $this->customer_name,
            'customer_company_name' => $this->customer_company_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'notes' => $this->notes,
        ]);

        // Reset the Livewire properties and set edit mode to false
        $this->reset();
        $this->edit = false;
    }
    public function updateStatus($customerId)
    {
        $customer = CustomerDetails::find($customerId);

        $customer->status = $customer->status == 'active' ? 'inactive' : 'active';
        $customer->save();
        return redirect('/customers');
    }

    public $allCustomers;
    public $companies;
    public $so = false;
    public function addSO()
    {

        $this->so = true;
    }
    public function cancelSO()
    {
        $this->so = false;
    }
    public $vendors, $employees;
    public function selectedConsultantId()
    {
        if ($this->consultant_name === 'addConsultant') {
            $this->regForm=true;
            $this->so=false;
        }

        $selectedConsultantId = $this->employees->firstWhere('emp_id', $this->consultant_name);
        $this->job_title = $selectedConsultantId ? $selectedConsultantId->job_title : null;
    }

    public function callCustomer()
    {
        if ($this->customerName === 'AddCustomer') {
          
            $this->customer = true;
            $this->so=false;
        }
    }
    public $customer = false;
    public function cCustomer()
    {
        $this->so = true;
        $this->customer = false;
        $this->resetFieldsForSo();
    }
    public function sCustomer()
    {
        $this->customer = true;
    }
    public function render()
    {
        $companyId = auth()->user()->company_id;

        $this->vendors = VendorDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->employees = EmpDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->customers = CustomerDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->allCustomers = $this->filteredPeoples ?: $this->customers;
        return view('livewire.customers');
    }
}
