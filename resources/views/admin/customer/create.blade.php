<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE</title>
</head>
<body>
    <form action="{{url('admin/customer/createProcess')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <h1 style="text-align: center;">REGISTER CUSTOMER</h1>
        <table border="1" align="center">
            <tr>
                <td>CustomerID:</td>
                <td><input name="txtCode"></td>
            </tr>
            <tr>
                <td>FirstName:</td>
                <td><input name="txtFirstName"></td>
            </tr>
            <tr>
                <td>LastName:</td>
                <td><input name="txtLastName"></td>
            </tr>
            <tr>
                <td>PhoneNumber:</td>
                <td><input name="txtPhoneNumber"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input name="txtAddress"></td>
            </tr>
            <tr>
                <td>Zip:</td>
                <td><input name="txtZip"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input name="txtEmail"></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input name="txtUserName"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input name="txtPassword"></td>
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
    </form>
</body>
</html>