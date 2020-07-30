<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
</head>
<body>
  <form method="post" action="{{route('login.store')}}">
    @csrf
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br>

    <input type="submit" name="btnsave" value="Save">
  </form>
</body>
</html>