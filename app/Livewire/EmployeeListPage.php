<?php

namespace App\Livewire;
use App\Models\CompanyDetails;
use App\Models\SalesOrder;
use App\Models\EmpDetails;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class EmployeeListPage extends Component
{
    use WithFileUploads;
    public $customers, $selected_customer;
    public $company_name;
    public $selectedCustomer;
    public $filteredPeoples;
    public $peopleFound;
    public $edit = false;
    public $searchTerm;
    public $allCustomers;
    public $companies;
    public $workingProjects = [];
    public $activeButton = false;
    public $showSOLists = []; 
    public $empId;
 
// employee registration
public $emp_id;
public $first_name;
public $last_name;
public $date_of_birth;
public $gender ='Male';
public $email;
public $company_email;
public $mobile_number;
public $alternate_mobile_number;
public $address;
public $city;
public $state;
public $postal_code;
public $country;
public $hire_date;
public $employee_type = 'full-time';
public $department;
public $job_title;
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
public $showSpouseField = false;
public $show = false;

public function employeeCall()
{
    $this->showContractorField = $this->employee_type === 'contract';
}
public function marriedStatus()
{
    $this->showSpouseField = $this->marital_status === 'married';
}

public function open()
{
    $this->show = true;
}

public function close()
{
    $this->show = false;
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
    $this->show = false;
}

    public function updateAndShowSoList($empId)
    {
        $this->activeButton = 'SO';
        $this->showSoList($empId);
    }
    public function showSoList($empId)
    {
        if (!$empId) {
            return;
        }

        $companyId = auth()->user()->company_id;

        $this->showSOLists = SalesOrder::join('customer_details', 'sales_orders.customer_id', '=', 'customer_details.customer_id')
        ->join('emp_details', 'sales_orders.emp_id', '=', 'emp_details.emp_id')
        ->where('customer_details.company_id', $companyId)
        ->where('sales_orders.emp_id', $empId) // Filter by emp_id
        ->select('sales_orders.*', 'emp_details.*', 'customer_details.customer_company_name') // Select the column directly without alias
        ->orderByDesc('sales_orders.created_at')
        ->get();
    }

    public function selectCustomer($customerId, $empId)
{
    // Check if emp_id from EmpDetails matches emp_id in sales_orders
    $empDetails = EmpDetails::where('emp_id', $empId)->first();

    if ($empDetails) {
        // Set the selected customer
        $this->selectedCustomer = $empDetails;

        // Check if the emp_id is working on projects (exists in SalesOrder)
        $workingOnProjects = SalesOrder::where('emp_id', $empId)->exists();

        if ($workingOnProjects) {
            // If working on projects, call showSoList
            $this->showSoList($empId);
        } else {
            $this->showSOLists = [];
        }
    } else {
        // Handle the case where no matching emp_id is found
        // You can add any specific logic or error handling here
    }
}

    

    public function filter()
    {
        // Trim the search term to remove leading and trailing spaces
        $trimmedSearchTerm = trim($this->searchTerm);

        // Use Eloquent to filter records based on the search term
        $companyId = Auth::user()->company_id;
        $this->filteredPeoples = EmpDetails::where('employee_type', '!=', 'contract')->where('company_id', $companyId)->orderByDesc('created_at')->where(function ($query) use ($trimmedSearchTerm) {
            $query->where('first_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('last_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('emp_id', 'LIKE', '%' . $trimmedSearchTerm . '%');
        })
            ->get();

        // Check if any records were found
        $this->peopleFound = count($this->filteredPeoples) > 0;
    }
   
    public function render()
    {
        $companyId = Auth::user()->company_id;
        $this->customers = EmpDetails::where('employee_type', '!=', 'contract')->where('company_id', $companyId)->orderByDesc('created_at')->get();
      
        $this->allCustomers = $this->filteredPeoples ?: $this->customers;
        return view('livewire.employee-list-page');
    }
}
