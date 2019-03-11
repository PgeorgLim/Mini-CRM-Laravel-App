@extends('layouts.app')

@section('pageTitle', 'My Customers')

@section('content')
    <div class="heading-primary">
        <h1>My Customers</h1>
    </div>

    <div class="d-flex justify-content-between mt-3 mb-3">
        <div class="col-md-8 pl-0">
            <form method="post" action="/customers/filter">
                @csrf
                <input class="p-1 search-input" name="fullname" placeholder="Search By Name" >
                <input class="p-1 search-input ml-3" name="email" placeholder="Search By Email" >
                <div class="col-md-12 pl-0 mt-2">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div>
            <a class="btn btn-primary" href="/customers/create" role="button">Add New</a>
        </div>
    </div>

    <table class="table table-striped mt-4 mb-8">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Edit</th>
            @if (Auth::user()->userlevel->level == 1)
            <th scope="col">Delete</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id  }}</td>
                <td>{{ $customer->fullname  }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td><a href="/customers/{{ $customer->id }}/edit"><i class="fas fa-edit"></i></a></td>
                @if (Auth::user()->userlevel->level == 1)
                <td>
                    <a href="#" onclick="deleteCustomer({{ $customer->id }})">
                        <i class="fas fa-trash"></i>
                    </a>
                    <form id="delete-form-{{ $customer->id }}" method="post" action="/customers/{{ $customer->id }}" style="display: none">
                        @method('DELETE')
                        @csrf
                    </form>
                </td>
                 @endif
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection