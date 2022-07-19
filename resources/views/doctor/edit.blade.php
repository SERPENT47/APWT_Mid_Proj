@extends('layouts.dash')
@section('content')
    <h3>Edit Profile</h3>
        <form method="post" action="" enctype="multipart/form-data">
            {{@csrf_field()}}
            <br>
            <img src="{{asset('Doctor Photos'.$dr->photo)}}" width="120px" height="100px" alt="Photo">
            <br>
            <input type="file" name="photo">
            @error('photo')
                {{$message}}<br>
            @enderror
            <br>
            photo name: <input type="text" name="photoname" value="{{$dr->photo}}"><br>
            <input type="hidden" name="id" placeholder="Id" value="{{$dr->id}}"><br>
            <br><br>
            Name: <input type="text" name="name" placeholder="Name" value="{{$dr->name}}"><br>
            @error('name')
                {{$message}}<br>
            @enderror
            <br>
            Email: <input type="email" name="email" placeholder="Email" value="{{$dr->email}}"><br>
            @error('email')
                {{$message}}<br>
            @enderror
            <br>
            Phone: <input type="text" name="phone" placeholder="Phone No." value="{{$dr->phone}}"><br>
            @error('phone')
                {{$message}}<br>
            @enderror
            <br>
            Qualification: <input type="text" name="qualification" placeholder="Qualification" value="{{$dr->qualification}}"><br>
            @error('qualification')
                {{$message}}<br>
            @enderror
            <br>
            Speciality: <input type="text" name="speciality" placeholder="Speciality" value="{{$dr->speciality}}"><br>
            @error('speciality')
                {{$message}}<br>
            @enderror
            <br>
            Experience: <input type="number" name="experience" placeholder="Years of Experience" value="{{$dr->experience}}"><br>
            @error('experience')
                {{$message}}<br>
            @enderror
            <br>
            Password: <input type="password" name="password" placeholder="Passsword" value="{{$dr->password}}"><br>
            @error('password')
                {{$message}}<br>
            @enderror
            <br>
            Confirm Password: <input type="password" name="cpassword" placeholder="Confirm Passsword" value="{{$dr->cpassword}}"><br>
            @error('cpassword')
                {{$message}}<br>
            @enderror
            <br>
            <input type="submit" value="Edit">
            <button onclick="window.location='{{route('doctor.dash')}}'">Back</button>
        </form>
@endsection