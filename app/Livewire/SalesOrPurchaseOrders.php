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
        $this->show = false;
        $this->so = true;
    }

    public function selectedConsultantId()
    {
        if ($this->consultantName === 'addConsultant') {
            $this->redirect('/emp-register');
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
