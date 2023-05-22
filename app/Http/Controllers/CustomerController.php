<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Nembie\IbanRule\ValidIban;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function CustomerView()
    {
        $data['allData'] = Customer::simplePaginate(10);
        return view('customers.view_customer', $data);
    }


    public function CustomerAdd()
    {
        return view('customers.create_customer');
    }

    public function CustomerStore(Request $request)
    {
       //for test
     /*  $data = new Customer();
        $data = [
            'Firstname' => 'Theresa',
            'Lastname' => 'Bogisich',
            'DateOfBirth' => '2002-10-09',
            'Email' => 'skiles.theodora@feeney.com',
            'PhoneNumber' => '09109803600',
            'BankAccountNumber' => 'GB94BARC20201530093459',

        ];
        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'


        );*/

        return redirect()->route('customers.view')->with($notification);

       $validatedData = $request->validate([
            'email' => ['email:rfc,dns'],
            'phone' => ['phone:IR,MY,BE,mobile'],
            'bankaccount' => ['required', new ValidIban()]
        ]);


        if (Customer::where('Firstname', '=', $request->Firstname)->where('Lastname', '=', $request->Lastname)->where('DateOfBirth', '=', $request->dob)->exists()) {
            $notification = array(
                'message' => 'Duplicate Entry',
                'alert-type' => 'success'


            );

            return redirect()->route('customers.add')->with($notification);

        } else {
            if (Customer::where('Email', '=', $request->email)->exists()) {
                $notification = array(
                    'message' => 'Duplicate Entry',
                    'alert-type' => 'success'


                );

                return redirect()->route('customers.add')->with($notification);

            } else {
                if (Customer::where('PhoneNumber', '=', $request->phone)->exists()) {
                    $notification = array(
                        'message' => 'Duplicate Entry',
                        'alert-type' => 'success'


                    );

                    return redirect()->route('customers.add')->with($notification);
                } else {
                    $data = new Customer();
                    $data->Firstname = $request->Firstname;
                    $data->Lastname = $request->Lastname;
                    $data->DateOfBirth = $request->dob;
                    $data->PhoneNumber = $request->phone;
                    $data->Email = $request->email;
                    $data->BankAccountNumber = $request->bankaccount;
                    $data->save();

                    $notification = array(
                        'message' => 'Customer Inserted Successfully',
                        'alert-type' => 'success'


                    );

                    return redirect()->route('customers.view')->with($notification);
                }
            }
        }


    }


    public function CustomerEdit($id)
    {
        $editData = Customer::find($id);
        return view('customers.edit_customer', compact('editData'));
    }


    public function CustomerUpdate(Request $request, $id)
    {
//for test
       /* $data = Customer::find($id);
        $data->update([ 'Firstname' => $request->Firstname,
        'Lastname' => $request->Lastname,
        'DateOfBirth' => $request->dob,
      ' PhoneNumber' => $request->phone,
       'Email' => $request->email,
       'BankAccountNumber' => $request->bankaccount]);
        $data->save();
        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'


        );

        return redirect()->route('customers.view')->with($notification);*/

      $validatedData = $request->validate([
            'email' => ['email:rfc,dns'],
            'phone' => ['phone:IR,MY,BE,mobile'],
            'bankaccount' => ['required', new ValidIban()]
        ]);


        if (Customer::where('Firstname', '=', $request->Firstname)->where('Lastname', '=', $request->Lastname)->where('DateOfBirth', '=', $request->dob)->where('id','!=',$id)->exists()) {
            $notification = array(
                'message' => 'Duplicate Entry',
                'alert-type' => 'success'


            );

            return redirect()->route('customers.edit',$id)->with($notification);

        } else {
            if (Customer::where('Email', '=', $request->email)->where('id','!=',$id)->exists()) {
                $notification = array(
                    'message' => 'Duplicate Entry',
                    'alert-type' => 'success'


                );

                return redirect()->route('customers.edit',$id)->with($notification);

            } else {
                if (Customer::where('PhoneNumber', '=', $request->phone)->where('id','!=',$id)->exists()) {
                    $notification = array(
                        'message' => 'Duplicate Entry',
                        'alert-type' => 'success'


                    );

                    return redirect()->route('customers.edit',$id)->with($notification);
                } else {
                    $data = Customer::find($id);
                    $data->Firstname = $request->Firstname;
                    $data->Lastname = $request->Lastname;
                    $data->DateOfBirth = $request->dob;
                    $data->PhoneNumber = $request->phone;
                    $data->Email = $request->email;
                    $data->BankAccountNumber = $request->bankaccount;
                    $data->save();

                    $notification = array(
                        'message' => 'Customer Updated Successfully',
                        'alert-type' => 'success'


                    );

                    return redirect()->route('customers.view')->with($notification);
                }
            }
        }

    }

    public function CustomerDelete($id)
    {
        $customer = Customer::find($id);
        $customer->Delete();
        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'info'


        );

        return redirect()->route('customers.view')->with( $notification);
    }
}
