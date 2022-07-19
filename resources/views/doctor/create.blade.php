@extends('layouts.form')
@section('content')
<button onclick="window.location='{{route('home')}}'">Back</button>
<br><br>
    <form method="post" action="" enctype="multipart/form-data">
        {{@csrf_field()}}
        Name: <input type="text" name="name" placeholder="Name" value="{{old('name')}}"><br>
        @error('name')
            {{$message}}<br>
        @enderror
        <br>
        Email: <input type="email" name="email" placeholder="Email" value="{{old('email')}}"><br>
        @error('email')
            {{$message}}<br>
        @enderror
        <br>
        Phone: <input type="text" name="phone" placeholder="Phone No." value="{{old('phone')}}"><br>
        @error('phone')
            {{$message}}<br>
        @enderror
        <br>
        Qualification: <input type="text" name="qualification" placeholder="Qualification" value="{{old('Qualification')}}"><br>
        @error('qualification')
            {{$message}}<br>
        @enderror
        <br>
        Speciality: <input type="text" name="speciality" placeholder="Speciality" value="{{old('speciality')}}"><br>
        @error('speciality')
            {{$message}}<br>
        @enderror
        <br>
        Experience: <input type="number" name="experience" placeholder="Years of Experience" value="{{old('experience')}}"><br>
        @error('experience')
            {{$message}}<br>
        @enderror
        <br>
        Password: <input type="password" name="password" placeholder="Passsword"><br>
        @error('password')
            {{$message}}<br>
        @enderror
        <br>
        Confirm Password: <input type="password" name="cpassword" placeholder="Confirm Passsword"><br>
        @error('cpassword')
            {{$message}}<br>
        @enderror
        <br>
        <input type="file" name="photo">
        @error('photo')
            {{$message}}<br>
        @enderror
        <br><br>
        <input type="submit" value="Create">
    </form>
@endsection