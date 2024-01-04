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
use League\CommonMark\Extension\CommonMark\Node\Inline\Emphasis;
use Livewire\Component;
use Livewire\WithFileUploads;

class Vendors extends Component
{
    use WithFileUploads;
    public $customerId;
    public $rate;
    public $rateType;
    public $endClientTimesheetRequired;
    public $timeSheetType;
    public $timeSheetBegins;
    public $invoiceType;
    public $paymentType;
    public $selected_vendor;
    public $company_name;
    public $show = false;

    public  $vendor_profile, $company_id, $vendor_name, $email, $phone, $address, $notes, $vendor_company_name;

    public $selectedVendor;
    public $vendor_id;
    public $poList = false;
    public $showPOLists;

    // employee registration
    public $emp_id;
    public $first_name;
    public $last_name;
    public $date_of_birth;
    public $gender = 'Male';
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
    public $employee_status = 'active';
    public $emergency_contact;
    public $password;
    public $image;
    public $blood_group;
    public $nationality;
    public $religion;
    public $marital_status = 'unmarried';
    public $spouse;
    public $physically_challenge = 'No';
    public $inter_emp = 'no';
    public $job_location;
    public $education;
    public $experience;
    public $pan_no;
    public $adhar_no;
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
    public $showSpouseField = false;
    public $regForm = false;

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
        $this->po = false;
        $this->regForm = true;
    }

    public function regClose()
    {
        $this->regForm = false;
        $this->po = true;
        $this->resetFieldsForPo();
    }

    public function register()
    {
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
            'adhar_no' => $this->adhar_no,
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
        $this->resetFieldsForPo();
        $this->po = true;
    }

    public function updateAndShowPoList($vendorId)
    {
        $this->activeButton = 'PO';
        $this->showPOList($vendorId);
    }
    public function showPOList($vendorId)
    {
        $companyId = auth()->user()->company_id;

        $this->showPOLists = PurchaseOrder::with('ven', 'com', 'emp')->where('company_id', $companyId)->where('vendor_id', $vendorId)->orderBy('created_at', 'desc')->get();
        $this->poList = true;
    }
    public $bills;
    public function showBills($vendorId)
    {
        $companyId = auth()->user()->company_id;
        $this->bills = Bill::with('vendor', 'company')->where('company_id', $companyId)->where('vendor_id', $vendorId)->orderBy('created_at', 'desc')->get();

        $this->activeButton = 'Bills';
    }
    public function closePOList()
    {
        $this->poList = false;
    }

    public $employeeSkillsPairs = [['employees' => '', 'skills' => '']];

    public function addPair()
    {
        $this->employeeSkillsPairs[] = ['employees' => '', 'skills' => ''];
    }

    public $activeButton = 'Bills';

    public function removePair($index)
    {
        unset($this->employeeSkillsPairs[$index]);
        $this->employeeSkillsPairs = array_values($this->employeeSkillsPairs);
    }
    public $job_title, $startDate, $endDate, $consultantName, $vendorName, $paymentTerms;

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
            'rate' => $this->rate,
            'rate_type' => $this->rateType,
            'end_client_timesheet_required' => $this->endClientTimesheetRequired,
            'time_sheet_type' => $this->timeSheetType,
            'time_sheet_begins' => $this->timeSheetBegins,
            'invoice_type' => $this->invoiceType,
            'payment_terms' => $this->paymentTerms,
        ]);
        session()->flash('purchase-order', 'Purchase order submitted successfully.');
        $this->resetFieldsForPo();
        $this->resetVendorFields();
        $this->po = false;
    }
    public $vendor = false;
    public function callVendor()
    {
        if ($this->vendorName === 'addVendor') {
            $this->vendor = true;
            $this->po = false;
        }
    }
    public function cVendor()
    {
        $this->resetFieldsForPo();
        $this->po = true;
        $this->vendor = false;
    }
    public function selectedConsultantId()
    {
        if ($this->consultantName === 'addConsultant') {
            $this->regForm = true;
            $this->po = false;
        }
        $selectedConsultantId = $this->employees->firstWhere('emp_id', $this->consultantName);
        $this->job_title = $selectedConsultantId ? $selectedConsultantId->job_title : null;
    }
    public function selectVendor($vendorId)
    {
        $companyId = auth()->user()->company_id;
        $this->bills = Bill::with('vendor', 'company')->where('company_id', $companyId)->where('vendor_id', $vendorId)->orderBy('created_at', 'desc')->get();
        $this->selectedVendor = VendorDetails::where('vendor_id', $vendorId)->first(); 
        $this->showPOLists = PurchaseOrder::with('ven', 'com', 'emp')->where('company_id', $companyId)->where('vendor_id', $vendorId)->orderBy('created_at', 'desc')->get();
    }

    public $filteredPeoples;
    public $peopleFound;

    public $searchTerm;
    public function filter()
    {
        // Trim the search term to remove leading and trailing spaces
        $trimmedSearchTerm = trim($this->searchTerm);

        // Use Eloquent to filter records based on the search term
        $this->filteredPeoples = VendorDetails::where(function ($query) use ($trimmedSearchTerm) {
            $query->where('vendor_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('vendor_id', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('contact_person', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('status', 'LIKE', '%' . $trimmedSearchTerm . '%');
        })
            ->get();

        // Check if any records were found
        $this->peopleFound = count($this->filteredPeoples) > 0;
    }


    public function open()
    {
        $this->po = false;

        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
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
        $this->resetVendorFields();
        $this->resetFieldsForPo();

        $this->show = false;
    }


    public function addvVendors()
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
        $this->vendor = false;
        $this->po = true;
    }
    public $edit = false;

    public $selectedVendorId;
    public function editVendors($vendorId)
    {
        $this->selectedVendorId = $vendorId;

        $this->edit = true;
        $this->selected_vendor = VendorDetails::find($vendorId);


        $this->company_id = $this->selected_vendor->company_id;
        $this->vendor_name = $this->selected_vendor->contact_person;
        $this->vendor_company_name = $this->selected_vendor->vendor_name;
        $this->email = $this->selected_vendor->email;
        $this->phone = $this->selected_vendor->phone_number;
        $this->address = $this->selected_vendor->address;
    }
    public function closeEdit()
    {
        $this->edit = false;
    }

    public function updateVendors()
    {
        $this->validate([
            'vendor_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'vendor_company_name' => 'required'
        ]);
        $vendor = VendorDetails::find($this->selectedVendorId);

        if ($this->vendor_profile instanceof \Illuminate\Http\UploadedFile) {
            $vendorProfilePath = $this->vendor_profile->store('vendor_profiles', 'public');
            $vendor->update(['vendor_image' => $vendorProfilePath]);
        }

        $companyId = auth()->user()->company_id;

        $vendor->update([
            'company_id' => $companyId,
            'contact_person' => $this->vendor_name,
            'vendor_name' => $this->vendor_company_name,
            'email' => $this->email,
            'phone_number' => $this->phone,
            'address' => $this->address,
        ]);

        // Reset the Livewire properties and set edit mode to false
        $this->reset();
        $this->edit = false;
    }


    public $allVendors;
    public $companies;
    public $po = false;
    public function addPO()
    {
        $this->po = true;
    }
    public function cancelPO()
    {
        $this->po = false;
    }
    public $vendors, $vendorFirst;
    public $customers, $employees, $billss,$showPOListFirst;
    public function render()
    {
        $companyId = auth()->user()->company_id;
        $this->employees = EmpDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();

        $this->vendors = VendorDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->vendorFirst = VendorDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->first();
        $this->billss = Bill::with('vendor', 'company')->where('vendor_id', $this->vendorFirst->vendor_id)->first();
        $this->showPOListFirst = PurchaseOrder::with('ven', 'com', 'emp')->where('company_id', $companyId)->where('vendor_id', $this->vendorFirst->vendor_id)->orderBy('created_at', 'desc')->get();

        $this->customers = CustomerDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();

        $this->allVendors = $this->filteredPeoples ?: $this->vendors;
        return view('livewire.vendors');
    }
}
