<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CompanyDetails;
use App\Models\SalesOrder;
use App\Models\EmpDetails;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class ContractorPage extends Component
{
    use WithFileUploads;
    public $contractors;
    public $company_name;
    public $selectedContractor;
    public $filteredPeoples;
    public $peopleFound;
    public $edit = false;
    public $searchTerm;
    public $allContractors;
    public $companies;
    public $showWorkingProject = false;
    public $showEmailActivities = false;
    public $showNotes = false;
    public $showTimeSheets = false;
    public $workingProjects = [];
    public $showSOLists = []; 
    public $activeButton = 'SO';
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
        ->select('sales_orders.*', 'emp_details.*')
        ->orderByDesc('sales_orders.created_at')
        ->get();
}

    public function selectContractor($customerId, $empId)
    {
        // Set the selected contractor
        $this->selectedContractor = SalesOrder::
            join('customer_details', 'sales_orders.customer_id', '=', 'customer_details.customer_id')
            ->join('emp_details', 'sales_orders.emp_id', '=', 'emp_details.emp_id')
            ->where('customer_details.customer_id', $customerId)
            ->select('sales_orders.*', 'emp_details.*')
            ->orderByDesc('sales_orders.created_at')
            ->first();
    
        // Fetch all customer_id data for the selected emp_id
        $customerIds = SalesOrder::where('emp_id', $empId)->pluck('customer_id')->unique();
    
        // Set the customerIds property to be used in the Blade file
        $this->customerIds = $customerIds;
    
        // Fetch the sales orders for the selected emp_id
        $this->showSoList($empId);
    }
    

    public function filter()
    {
        // Trim the search term to remove leading and trailing spaces
        $trimmedSearchTerm = trim($this->searchTerm);

        // Use Eloquent to filter records based on the search term
        $companyId = Auth::user()->company_id;
        $this->filteredPeoples = EmpDetails::where('employee_type', '=', 'contract')->where('company_id', $companyId)->orderByDesc('created_at')->where(function ($query) use ($trimmedSearchTerm) {
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
    
        $this->contractors = EmpDetails::where('employee_type', '=', 'contract')
            ->where('company_id', $companyId)
            ->orderByDesc('created_at')
            ->get();
    
        $this->allContractors = $this->filteredPeoples ?: $this->contractors;
        
        // Fetch data using relationships
        
  

        // Now $this->allContractors contains only one emp_id for each unique customer_id
    
        return view('livewire.contractor-page', ['companyId' => $companyId]);
    }
    
    
}
