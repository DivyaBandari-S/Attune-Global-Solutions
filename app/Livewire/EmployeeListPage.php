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
