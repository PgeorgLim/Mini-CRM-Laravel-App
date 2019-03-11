<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Phone;
use DemeterChain\C;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    //array that contains our validations
    private $validateArray = [
        'fullname' => 'bail|required|max:255',
        'email' => 'max:50',
        'address' => 'max:50',
        'gender' => 'required',
        'date_of_birth' => ''
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::all();

        return view('customers.list', ['customers' => $customers]);
    }

    /*
     * Function for filtering/searching customers
     */
    public function filter(Request $request, Customer $customer)
    {
        $customerFilter = $customer->newQuery();

        // Search for a customer based on their full name.
        if ($request->has('fullname')) {
            $customerFilter->where('fullname', 'like', '%'.$request->input('fullname').'%')->get();
        }

        // Search for a customer based on their email.
        if ($request->has('email')) {
            $customerFilter->where('email', 'like', '%'.$request->input('email').'%')->get();
        }

        //return the results
        return view('customers.list', ['customers' => $customerFilter->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /*
     * Function for creating Customer phones
     */
    public function create_customer_phones(Request $request, Customer $customer)
    {
        if ($request->has('phones')){
            //Getting all phone numbers
            $phonesArray = $request->input('phones');

            //Create a new phone record for each phone in the above array
            foreach ($phonesArray as $phone){
                $customer->phones()->create([
                    'phone_number' => $phone,
                ]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creating Customer
        $fields = $request->validate($this->validateArray);
        $customer = Customer::create($fields);

        //Creating Customer Phones
        $this->create_customer_phones($request, $customer);

        return redirect('customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //Updating Customer
        $fields = $request->validate($this->validateArray);
        $customer->update($fields);

        //Updating Customer Phones
        $customer->phones()->delete();
        $this->create_customer_phones($request, $customer);

        return redirect('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }
}
