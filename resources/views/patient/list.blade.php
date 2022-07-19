<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Pescription</th>
    </tr>
    @foreach($patients as $pt)
        <tr>
            <td>{{$pt->id}}</td>
            <td>{{$pt->name}}</td>
            <td>{{$pt->age}}</td>
            <td>{{$pt->email}}</td>
            <td>{{$pt->phone}}</td>
            
            <td><a href="{{route('make.pescription',['id'=>$pt->id])}}">Make</a>
            <a href="{{route('pescription.view',['id'=>$pt->id])}}">View</a>
            <a href="{{route('edit.pescription',['id'=>$pt->id])}}">Edit</a></td>
        </tr>
    @endforeach
</table>
{{$patients->links()}}
<br>
<button onclick="window.location='{{route('doctor.dash')}}'">Back</button>