@extends('user.layout')
@section('title')
    Edit
@endsection
@section('content')
    <form action="{{ url("/customer/updateProcess/{$rs->id}") }}" method="post">
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        {{ csrf_field() }}
        <h1 style="text-align: center;">UPDATE INFORMATION</h1>
        <table border="1" align="center">
            <tr>
                <td>CustomerID:</td>
                <td><input name="txtCode" value="{{ $rs->id }}" readonly></td>
            </tr>
            <tr>
                <td>FirstName:</td>
                <td>
                    <input type="text" name="txtFirstName" minlength="2" maxlength="12" value="{{ $rs->first_name }}">
                </td>
            </tr>
            <tr>
                <td>LastName:</td>
                <td>
                    <input type="text" name="txtLastName" minlength="2" maxlength="12" value="{{ $rs->last_name }}">
                </td>
            </tr>
            <tr>
                <td>PhoneNumber:</td>
                <td>
                    <input type="number" name="txtPhoneNumber" pattern="[-+]?[0-9]" maxlength="12"
                        value="{{ $rs->phone_number }}">
                </td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="txtAddress" value="{{ $rs->address }}"></td>
            </tr>
            <tr>
                <td>Zip:</td>
                <td>
                    <input type="number" name="txtZip" pattern="[-+]?[0-9]" maxlength="12" value="{{ $rs->zip }}">
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" name="txtEmail"
                        title="The domain portion of the email address is invalid (the portion after the @)."
                        pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$"
                        value="{{ $rs->email }}">
                </td>
            </tr>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="txtUserName" minlength="2" maxlength="12" value="{{ $rs->user_name }}">
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="txtPassword" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"
                        title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number."
                        maxlength="12" value="{{ $rs->password }}">
                </td>
            </tr>
            <tr>
                <td>CreatedAt:</td>
                <td><input name="txtCreateAt" type="date" value="{{ $rs->created_at }}"></td>
            </tr>
            <tr>
                <td>UpdateAt:</td>
                <td><input name="txtUpdateAt" type="date" value="{{ $rs->updated_at }}"></td>
            </tr>
            <tr align="right">
                <td colspan="2">
                    <input type="submit" value="Update">
                </td>
            </tr>
        </table>
    </form>
@endsection
