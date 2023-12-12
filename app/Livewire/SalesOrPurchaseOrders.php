<?php

namespace App\Livewire;

use App\Models\CustomerDetails;
use App\Models\EmpDetails;
use App\Models\PurchaseOrder;
use App\Models\SalesOrder;
use App\Models\VendorDetails;
use Livewire\Component;
use Livewire\WithFileUploads;

class SalesOrPurchaseOrders extends Component
{
    use WithFileUploads;
    public $po, $so = false;
    public $selectedVendor, $vendor_id, $customers;
    public $show = false;
     
    // employee registration
    public $emp_id;
    public $first_name;
    public $last_name;
    public $date_of_birth;
    public $gender ='Male';
    public $company_name;
    public $company_email;
    public $mobile_number;
    public $alternate_mobile_number;
    public $city;
    public $state;
    public $postal_code;
    public $country;
    public $hire_date;
    public $employee_type = 'full-time';
    public $department;
    public $manager_id;
    public $report_to;
    public $employee_status ='active';
    public $emergency_contact;
    public $password;
    public $image;
    public $blood_group;
    public $nationality;
    public $religion;
    public $marital_status ='unmarried';
    public $spouse;
    public $physically_challenge = 'No';
    public $inter_emp ='no';
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
    public $company_id;
    public $is_starred;
    public $skill_set;
    public $savedImage;
    public $isHr;
    public $contractor_company_id;
    public $showContractorField = false;
    public $regForm = false;
    public $showSpouseField = false;
    public $edit = false;

    public function employeeCall()
    {
        $this->showContractorField = $this->employee_type === 'contract';
    }
    public function marriedStatus()
    {
        $this->showSpouseField = $this->marital_status === 'married';
    }
    
    public function regOpen()
    {
        $this->so = false;
        $this->regForm = true;
        $this->resetFieldsForSo();
    }

    public function regClose()
    {
        $this->regForm = false;
        $this->so=true;
        $this->resetFieldsForPo();
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
            'contractor_company_id' => $this->employee_type == 'contract' ? 'required|string|max:255' : '', // Add this line
        ]);

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
        $this->po = true;

    }

    public function addPO()
    {
        $this->po = true;
        // $this->selectedVendor = VendorDetails::where('vendor_id', $vendorId)->first();
        // $this->vendor_id = $this->selectedVendor->vendor_id;
    }
    public $activeButton = "SO";

    public function closePO()
    {
        $this->po = false;
    }
    public $showSOLists, $showPOLists;

    public $employees, $vendors, $consultantName, $customerName, $consultant_name, $vendorName, $job_title, $startDate, $endDate, $rate, $rateType, $endClientTimesheetRequired, $timeSheetType, $timeSheetBegins, $invoiceType, $paymentTerms;

    public function savePurchaseOrder()
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
            'consultantName' => 'required',
            'vendorName' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        $companyId = auth()->user()->company_id;

        PurchaseOrder::create([
            'company_id' => $companyId,
            'emp_id' => $this->consultantName,
            'vendor_id' => $this->vendorName,
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
        session()->flash('purchase-order', 'Purchase order submitted successfully.');
        $this->po = false;
    }

    public function addSO()
    {

        $this->so = true;
    }
    public function closeSO()
    {
        $this->so = false;
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
            'consultantName' => 'required',
            'customerName' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        $companyId = auth()->user()->company_id;

        SalesOrder::create([
            'company_id' => $companyId,
            'emp_id' => $this->consultantName,
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
        $this->so = false;
    }
    public $vendor_profile, $vendor_name, $email, $phone, $vendor_company_name, $address;
    public function addVendors()
    {
        $this->validate([
            
            'vendor_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'vendor_company_name' => 'required'
        ]);
        $companyId = auth()->user()->company_id;

        VendorDetails::create([
            'company_id' => $companyId,
            'contact_person' => $this->vendor_name,
            'vendor_name' => $this->vendor_company_name,
            'email' => $this->email,
            'phone_number' => $this->phone,
            'address' => $this->address,
        ]);
        session()->flash('vendor', 'Vendor added successfully.');
        $this->resetFieldsForPo();
        $this->showVendor = false;
        $this->po = true;
    }

    public $customer_name, $customer_company_name, $notes, $customer_profile;
    public function close()
    {
        $this->so = true;
        $this->show = false;
        $this->resetFieldsForSo();
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
        $this->resetFieldsForSo();
        $this->resetFieldsForPo();
        $this->show = false;
        $this->so = true;
    }

    public function selectedConsultantId()
    {
        if ($this->consultantName === 'addConsultant') {
            $this->regForm=true;
            $this->so=false;
        }
        $selectedConsultantId = $this->employees->firstWhere('emp_id', $this->consultantName);
        $this->job_title = $selectedConsultantId ? $selectedConsultantId->job_title : null;
    }
    public function selectedConsultantPoId()
    {
        if ($this->consultantName === 'addConsultant') {
            $this->regForm=true;
            $this->po=false;
        }
        $selectedConsultantId = $this->employees->firstWhere('emp_id', $this->consultantName);
        $this->job_title = $selectedConsultantId ? $selectedConsultantId->job_title : null;
    }
    public $showVendor = false;
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
    public function open()
    {
        $this->so = false;
        $this->show = true;
    }
    public function closeVendor()
    {
        $this->po = true;
        $this->showVendor = false;
        $this->resetFieldsForPo();
    }
    public function openVendor()
    {
        $this->po = false;
        $this->showVendor = true;
    }

    public $customer = false;
    public $vendor = false;
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
    public function resetFieldsForPo()
    {
        $this->rate = null;
        $this->rateType = null;
        $this->job_title = null;
        $this->endClientTimesheetRequired = null;
        $this->timeSheetType = null;
        $this->timeSheetBegins = null;
        $this->invoiceType = null;
        $this->paymentTerms = null;
        $this->consultantName = null;
        $this->vendorName = null;
        $this->startDate = null;
        $this->endDate = null;
        // Add other fields you want to reset here
    }

    public function resetVendorFields()
    {
        $this->vendor_profile = null;
        $this->vendor_name = null;
        $this->email = null;
        $this->phone = null;
        $this->address = null;
        $this->vendor_company_name = null;
        // Add other fields you want to reset here
    }
    public function callCustomer()
    {
        if ($this->customerName === 'addCustomer') {
            $this->so = false;
            $this->show = true;
        }
    }
    public function callVendor()
    {
        if ($this->vendorName === 'addVendor') {
           
            $this->showVendor = true;
            $this->po=false;
        }
    }
    public function render()
    {
        $companyId = auth()->user()->company_id;
        $this->employees = EmpDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->showSOLists = SalesOrder::with('cus', 'com', 'emp')->where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->showPOLists = PurchaseOrder::with('ven', 'com', 'emp')->where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->customers = CustomerDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->vendors = VendorDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();

        return view('livewire.sales-or-purchase-orders');
    }
}
