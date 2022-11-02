<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
</head>
<body>
    <form action="{{url("admin/customer/updateProcess/{$rs -> id}")}}" method="post">
        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
        {{csrf_field()}}
        <h1 style="text-align: center;">UPDATE INFORMATION</h1>
        <table border="1" align="center">
            <tr>
                <td>CustomerID:</td>
                <td><input name="txtCode" value="{{$rs -> CustomerID}}" readonly></td>
            </tr>
            <tr>
                <td>FirstName:</td>
                <td><input name="txtFirstName" value="{{$rs -> FirstName}}"></td>
            </tr>
            <tr>
                <td>LastName:</td>
                <td><input name="txtLastName" value="{{$rs -> LastName}}"></td>
            </tr>
            <tr>
                <td>PhoneNumber:</td>
                <td><input name="txtPhoneNumber" value="{{$rs -> PhoneNumber}}"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input name="txtAddress" value="{{$rs -> Address}}"></td>
            </tr>
            <tr>
                <td>Zip:</td>
                <td><input name="txtZip" value="{{$rs -> Zip}}"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input name="txtEmail" value="{{$rs -> Email}}"></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input name="txtUserName" value="{{$rs -> UserName}}"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input name="txtPassword" value="{{$rs -> Password}}"></td>
            </tr>
            <tr>
                <td>CreatedAt:</td>
                <td><input name="txtCreateAt" type="date" value="{{$rs -> CreatedAt}}"></td>
            </tr>
            <tr>
                <td>UpdateAt:</td>
                <td><input name="txtUpdateAt" type="date" value="{{$rs -> UpdateAt}}"></td>
            </tr>
            <tr align="right">
                <td colspan="2">
                    <input type="submit" value="Update">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>