@extends('layouts.dash')
@section('content')
    <br>
    <img src="{{asset('Doctor Photos'.$dr->photo)}}" width="120px" height="100px" alt="Photo">
    <br><br>
    Id: <input type="text" value="{{$dr->id}}" name="id" disabled=true><br>
    <br>
    Name: <input type="text" value="{{$dr->name}}" disabled=true><br>
    <br>
    Email: <input type="email" value="{{$dr->email}}" disabled=true><br>
    <br>
    Phone: <input type="text" value="{{$dr->phone}}" disabled=true><br>
    <br>
    Qualification: <input type="text" value="{{$dr->qualification}}" disabled=true><br>
    <br>
    Speciality: <input type="text" value="{{$dr->speciality}}" disabled=true><br>
    <br>
    Experience: <input type="text" value="{{$dr->experience}}" disabled=true><br>
    <br>
@endsection