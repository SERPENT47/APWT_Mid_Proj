<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<h2>List of Doctors</h2>
<br>
<button onclick="window.location='{{route('home')}}'">Back</button>
<br><br>
<form action="">
    <input type="search" name="search" placeholder="Search Doctor">
    <input type="submit" value="Search">
</form>
<br>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Qualification</th>
        <th>Speciality</th>
        <th>Experience</th>
        <th>Photo</th>
    </tr>
    @foreach($doctors as $dr)
        <tr>
            <td>{{$dr->id}}</td>
            <td>{{$dr->name}}</td>
            <td>{{$dr->email}}</td>
            <td>{{$dr->phone}}</td>
            <td>{{$dr->qualification}}</td>
            <td>{{$dr->speciality}}</td>
            <td>{{$dr->experience}}</td>
            <td>
                <img src="{{asset('Doctor Photos'.$dr->photo)}}" width="120px" height="100px" alt="Photo">
            </td>
        </tr>
    @endforeach
</table>
{{$doctors->links()}}