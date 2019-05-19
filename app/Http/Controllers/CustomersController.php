<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $customers = Customer::with('branch')->get();
      
       return view('customers.index', compact('customers'));
           
    }

    public function create()
    {
        $branches = Branch::all();
        $customer = new Customer();

       return view('customers.create', compact('branches', 'customer'));
    }
    
    public function store()
    {
        $customer = Customer::create($this->validateRequest());
       
        event(new NewCustomerHasRegisteredEvent($customer));
        
        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $branches = Branch::all();
        
        return view('customers.edit', compact('customer', 'branches'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());
       
        return redirect('customers/'. $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        
        return redirect('customers');
     }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'branch_id' => 'required',
       ]);
    }
}
