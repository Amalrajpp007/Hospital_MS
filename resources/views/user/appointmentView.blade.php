<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Appointment</title>
    <link rel="stylesheet" href="../assets/css/maicons.css">

<link rel="stylesheet" href="../assets/css/bootstrap.css">

<link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

<link rel="stylesheet" href="../assets/vendor/animate/animate.css">

<link rel="stylesheet" href="../assets/css/theme.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    @include('user.nav')
    <div class="container mt-5">
    <table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Doctor</th>
      
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($appointments as $appointment)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$appointment->doctor}}</td>
    
      <td>{{$appointment->date}}</td>
      <td>{{$appointment->status}}</td>
      <td style="display:flex;justify-content:center;"><a href="{{url('cancel_appointment',$appointment->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Cancel</a></td>
    </tr>
    @endforeach
  </tbody>
</table></div>
</body>
</html>