
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h4 class="text-white">Collapsed content</h4>
      <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>
<div class="main-panel">
        <div class="page-section">
        <div class="container" align="center" style="padding-top:100px;">
        
          <h2>Send Mail </h2>
            <form action="{{route('send_email',$data->id)}}" method="POST">
                
                @csrf
                <div style="padding:15px;">
                    <label for="name">Greeting</label>
                    <input type="text" style="color:black;" name="greeting" placeholder="Greeting" requred="" value="">
                </div>
                <div style="padding:15px;">
                    <label for="name">Body</label>
                    <input type="text" style="color:black;" name="body" placeholder="Mail Body" requred="">
                </div>
                <div style="padding:15px;">
                    <label for="room">Action Text</label>
                    <input type="text" style="color:black;" name="text" placeholder="Action Text" requred="" >
                </div>
                <div style="padding:15px;">
                    <label for="room">Action Url</label>
                    <input type="text" style="color:black;" name="url" placeholder="Action Url" requred="">
                </div>
                <div style="padding:15px;">
                    <label for="room">End Part</label>
                    <input type="text" style="color:black;" name="end" placeholder="End Part" requred="">
                </div>
                
               
                
                <div style="padding:15px;">
                    
                    <input type="submit" class="btn btn-success bg-success">
                </div>
               
            </form>
          <p class="text-success">  @if(session()->has('message'))
            
                {{session()->get('message')}}<p>
                
           
          @endif
           </div>
          
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <div style="padding-left:15px;padding-top:15px;">
                
@include('admin.script')
</body>
</html>