@extends('admin.dashboard')
@section('title')
    <!-- Feedback Management -->
@endsection
@section('content')
    <div class="container">
        <form action="">
            <h2>All CUSTOMERS MANAGEMENT</h2>
            <!-- <a href="./create.blade.php">Add New Customer</a> -->
            <table border="1" width="50%">
                <tr>
                    <th>CustomerID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>PhoneNumber</th>
                    <th>Address</th>
                    <th>Zip</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>CreatedAt</th>
                    <th>UpdateAt</th>
                    <th colspan="2">Action</th>
                </tr>
                @foreach ($customers as $it)
                    <tr>
                        <td>{{ $it->id }}</td>
                        <td>{{ $it->first_name }}</td>
                        <td>{{ $it->last_name }}</td>
                        <td>{{ $it->phone_number }}</td>
                        <td>{{ $it->address }}</td>
                        <td>{{ $it->zip }}</td>
                        <td>{{ $it->email }}</td>
                        <td>{{ $it->user_name }}</td>
                        <td>{{ $it->password }}</td>
                        <td>{{ $it->created_at }}</td>
                        <td>{{ $it->updated_at }}</td>
                        <!-- <td>
                        <a href="{{ url("customer/update/{$it->id}") }}">Update</a>
                    </td> -->
                        <td>
                            <a href="customer/delete/{{ $it->id }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>


        </form>
    </div>
@endsection
