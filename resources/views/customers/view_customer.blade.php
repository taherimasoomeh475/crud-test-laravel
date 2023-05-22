@extends('index_master')
@section('admin')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>MC Crud Test</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('customers.add') }}"> Create Customer</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>C.No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date Of Birth</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Bank Account Number</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allData as $key=>$customer)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{$customer->Firstname}}</td>
                <td>{{$customer->Lastname}}</td>
                <td>{{$customer->DateOfBirth}}</td>
                <td>{{$customer->PhoneNumber}}</td>
                <td>{{$customer->Email}}</td>
                <td>{{$customer->BankAccountNumber}}</td>
                <td>
                    <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-info">Edit</a>
                    <a href={{ route('customers.delete',$customer->id) }}" class="btn btn-danger" id="delete">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
{{ $allData->links() }}
@endsection

