@extends('user.layout')
@section('title')
    Register
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/product-detail.css') }}" />
@endsection
@section('content')
    {{-- <form action="{{ url('admin/customer/createProcess') }}" method="post">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h1 style="text-align: center;">REGISTER INFORMATION</h1>
        <table border="1" align="center" style="margin: 0 auto;">
            <tr>
                <td>FirstName:</td>
                <td><input type="text" name="txtFirstName" minlength="2" maxlength="12" required></td>
            </tr>
            <tr>
                <td>LastName:</td>
                <td><input type="text" name="txtLastName" minlength="2" maxlength="12" required></td>
            </tr>
            <tr>
                <td>PhoneNumber:</td>
                <td><input type="number" name="txtPhoneNumber" pattern="[-+]?[0-9]" maxlength="12" required></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="txtAddress" required></td>
            </tr>
            <tr>
                <td>Zip:</td>
                <td><input type="number" name="txtZip" pattern="[-+]?[0-9]" maxlength="12" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="txtEmail"
                        pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$"
                        required>
                </td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="txtUserName" minlength="2" maxlength="12" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="txtPassword" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"
                        title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number."
                        maxlength="12" required></td>
            </tr>
            <tr>
                <td>CreatedAt:</td>
                <td><input name="txtCreateAt" type="date"></td>
            </tr>
            <tr>
                <td>UpdateAt:</td>
                <td><input name="txtUpdateAt" type="date"></td>
            </tr>
            <tr align="right">
                <td colspan="2">
                    <input type="submit" value="Add new">
                </td>
            </tr>
        </table>
    </form> --}}

    <div class="wrapper">
        {{-- <div class="form-left">
            <h2 class="text-uppercase">information</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.
            </p>
            <p class="text">
                <span>Sub Head:</span>
                Vitae auctor eu augudsf ut. Malesuada nunc vel risus commodo viverra. Praesent elementum facilisis leo vel.
            </p>
            <div class="form-field">
                <input type="submit" class="account" value="Have an Account?">
            </div>
        </div> --}}
        <form class="form-right" action="{{ url('admin/customer/createProcess') }}" method="post">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h2 class="text-uppercase">Registration form</h2>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>First Name</label>
                    <input type="text" name="txtFirstName" minlength="2" maxlength="12" required class="input-field">
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="txtLastName" minlength="2" maxlength="12" required class="input-field">
                </div>
            </div>
            <div class="mb-3">
                <label>Phone Number</label>
                <input type="tel" name="txtPhoneNumber" pattern="[-+]?[0-9]" maxlength="12" class="input-field" required>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input type="text" name="txtAddress" class="input-field" required>
            </div>
           
            <div class="mb-3">
                <label>Your Email</label>
                <input type="email" name="txtEmail"
                pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$"
                required class="input-field">
            </div>
            <div class="mb-3">
                <label>Zip</label>
                <input type="number" name="txtZip" pattern="[-+]?[0-9]" maxlength="12" required class="input-field">
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Username</label>
                    <input type="text" name="txtUserName" minlength="2" maxlength="12" required class="input-field">
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    <input type="password" name="txtPassword" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"
                    title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number."
                    maxlength="12" required class="input-field">
                </div>
            </div>
            <div class="mb-3">
                <label class="option">I agree to the <a href="#">Terms and Conditions</a>
                    <input type="checkbox" checked>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="form-field">
                <input type="submit" value="Register" class="register" name="register">
            </div>
        </form>
    </div>
@endsection
