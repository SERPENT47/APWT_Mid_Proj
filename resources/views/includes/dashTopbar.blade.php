<h1>Dr. {{$dr->name}}</h1>
<button onclick="window.location='{{route('doctor.edit')}}'">Edit</button>
<button onclick="window.location='{{route('patient.list')}}'">Patient List</button>
<button onclick="window.location='{{route('logout')}}'">Logout</button>