<h2>Login to your Account</h2>
<br>
<button onclick="window.location='{{route('home')}}'">Back</button>
<br><br>
<form action="" method="post">
    {{@csrf_field()}}
    Id: <input type="text" name="id" placeholder="ID"><br>
    @error('id')
     {{$message}} <br>
    @enderror
    <br>
    Password: <input type="password" name="password" placeholder="Password">
    <br><br>
    <input type="submit" value="Login"> 
</form>
<h5>{{Session::get('msg')}}</h5>
@if(Session::has('logged'))
<h3>Already Logged in </h3>
@endif