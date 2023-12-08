<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Models\CustomerDetails;
use App\Models\EmpDetails;
use App\Models\Invoice;
use App\Models\VendorDetails;
use Livewire\Component;

class BillsOrInvoices extends Component
{
    public $bills, $invoices;
    public $activeButton = "Bills";

    public $bill_number;
    public $vendor_name;
    public $customer_name;
    public $amount;
    public $due_date;
    public $payment_terms;
    public $description;
    public $status;
    public $currency;
    public $notes;
    public $company_id;

    public $bill = false;
    public function show()
    {
        $this->bill = true;
    }

    public function showInvoice()
    {
        $this->invoice = true;
    }
    public $customer_company_name, $customer_profile;
    public $vendor_profile, $email, $phone, $vendor_company_name, $address;
    public $showVendor = false;
    public $show = false;
    public $po = false;
    public function openBill()
    {
        $this->bill = true;
    }
    public function closeBill()
    {
        $this->bill = false;
    }
    public function callCustomer()
    {
        if ($this->customer_name === 'addCustomer') {
            $this->invoice = false;
            $this->show = true;
        }
    }
    public function callVendor()
    {
        if ($this->vendor_name === 'addVendor') {
            $this->bill = false;
            $this->showVendor = true;
        }
    }
    public function openCustomer()
    {
        $this->show = true;
        $this->invoice = false;
    }
    public function closeCustomer()
    {

        $this->invoice = true;
        $this->show = false;
        $this->resetInvoiceFields();
    }
    public function closeVendor()
    {

        $this->bill = true;

        $this->showVendor = false;
        $this->resetBillFields();
    }
    public function openVendor()
    {
        $this->bill = false;
        $this->showVendor = true;
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
        $this->resetBillFields();
        $this->showVendor = false;
        $this->bill = true;
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

        $this->resetInvoiceFields();
        $this->show = false;
        $this->invoice = true;
    }

    public $open_balance;
    public function addBill()
    {
        $this->validate([
            'vendor_name' => 'required',
            'amount' => 'required',
            'due_date' => 'required',
            'payment_terms' => 'required',
            'description' => 'nullable',
            'status' => 'nullable',
            'currency' => 'required',
            'notes' => 'nullable',
            'consultant_name' => 'required',
            'type' => 'required',
            'rate' => 'required',
            'rateType' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'open_balance' => 'required',
            'hrs' => 'required',
            'days' => 'required'
        ]);

        $companyId = auth()->user()->company_id;

        // Create a new bill
        Bill::create([
            'period' => $this->startDate.' - '. $this->endDate,
            'emp_id' => $this->consultant_name,
            'rate' => $this->rate . ' ' . $this->rateType,
            'type' => $this->type,
            'bill_number' => $this->bill_number,
            'vendor_id' => $this->vendor_name,
            'amount' => $this->amount,
            'due_date' => $this->due_date,
            'payment_terms' => $this->payment_terms,
            'description' => $this->description,
            'status' => $this->status,
            'currency' => $this->currency,
            'notes' => $this->notes,
            'company_id' => $companyId,
            'open_balance' => $this->open_balance,
            'hrs_or_days' => $this->hrs . ' hours' . ' - ' . $this->days . ' days'

        ]);
        $this->bill = false;

        session()->flash('add-bill', 'Bill added successfully.');
    }
    public function resetBillFields()
    {
        $this->vendor_name = null;
        $this->amount = null;
        $this->due_date = null;
        $this->payment_terms = null;
        $this->description = null;
        $this->status = null;
        $this->currency = null;
        $this->notes = null;
        // Add other fields you want to reset here
    }

    public $rate, $rateType, $type, $startDate, $endDate, $hrs_or_days;
    public function resetInvoiceFields()
    {
        $this->customer_name = null;
        $this->amount = null;
        $this->due_date = null;
        $this->payment_terms = null;
        $this->description = null;
        $this->status = null;
        $this->currency = null;
        $this->notes = null;
        // Add other fields you want to reset here
    }
    public function selectedConsultantId()
    {
        if ($this->consultant_name === 'addConsultant') {
            $this->redirect('/emp-register');
        }

    }


    public $consultant_name, $hrs, $days;
    public function addInvoice()
    {

        $this->validate([
            'customer_name' => 'required',
            'amount' => 'required',
            'due_date' => 'required',
            'payment_terms' => 'required',
            'description' => 'nullable',
            'status' => 'nullable',
            'currency' => 'required',
            'notes' => 'nullable',
            'consultant_name' => 'required',
            'type' => 'required',
            'rate' => 'required',
            'rateType' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'open_balance' => 'required',
            'hrs' => 'required',
            'days' => 'required'

        ]);
        $companyId = auth()->user()->company_id;

        Invoice::create([
            'period' => $this->startDate.' - '. $this->endDate,
            'rate' => $this->rate . ' ' . $this->rateType,
            'type' => $this->type,
            'emp_id' => $this->consultant_name,
            'customer_id' => $this->customer_name,
            'amount' => $this->amount,
            'due_date' => $this->due_date,
            'payment_terms' => $this->payment_terms,
            'description' => $this->description,
            'status' => $this->status,
            'currency' => $this->currency,
            'notes' => $this->notes,
            'company_id' => $companyId,
            'open_balance' => $this->open_balance,
            'hrs_or_days' => $this->hrs . ' hours' . ' - ' . $this->days . ' days'

        ]);
        $this->invoice = false;
        session()->flash('add-invoice', 'Invoice added successfully.');
    }
    public function close()
    {
        $this->bill = false;
    }
    public $invoice = false;
    public function closeInvoice()
    {
        $this->invoice = false;
    }
    public $employees;
    public function openInvoice()
    {
        $this->invoice = true;
    }
    public $vendors, $customers;
    public function render()
    {
        $companyId = auth()->user()->company_id;
        $this->customers = CustomerDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->vendors = VendorDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->bills = Bill::with('emp', 'vendor', 'company')->where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->invoices = Invoice::with('emp', 'customer', 'company')->where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->employees = EmpDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();

        return view('livewire.bills-or-invoices');
    }
}
