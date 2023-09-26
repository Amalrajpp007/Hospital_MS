<div class="main-panel">
        <div class="page-section">
        <div class="container" align="center" style="padding-top:100px;">
        @if(session()->has('message'))
            <div class="alert alert-success" id="myDIV">
            <button type="button" class="close" data-dismiss="alert" onclick="close()">
                    
                </button>
                {{session()->get('message')}}
                
            </div></div>
          @endif
          
            <form action="{{route('save_update',$doctor->id)}}" method="POST" enctype="multipart/form-data">
                
                @csrf
                <div style="padding:15px;">
                    <label for="name">Doctor Name</label>
                    <input type="text" style="color:black;" name="name" placeholder="Write the name" requred="" value="{{$doctor->name}}">
                </div>
                <div style="padding:15px;">
                    <label for="name">Phone Number</label>
                    <input type="text" style="color:black;" name="phone" placeholder="phone number" requred=""value="{{$doctor->phone}}">
                </div>
                <div style="padding:15px;">
                    <label for="room">Room Number</label>
                    <input type="text" style="color:black;" name="room" placeholder="Room number" requred="" value="{{$doctor->room}}">
                </div>
                <div style="padding:15px;">
                    <label for="name">Speciality</label>
                    <select style="color:black" name="speciality">
                    <option  value="{{$doctor->speciality}}">
                        -------Select-------
            </option>
                        <option value="skin">
                            Skin
                 </option>
                       
                        <option value="heart">
                            Heart
                 </option>
                       
                        <option value="eye">
                        Eye
                 </option>
                       
                        <option value="nose">
                           Nose
                 </option>
                      
                        <option value="ear">
                        Ear
                 </option>
                       
                    </select>
                    <p>current:     {{$doctor->speciality}}
                </div>
                <div style="padding-left:15px;padding-top:15px;">
                
                    <label for="image">Doctor Image</label>
                    <input type="file" style="color:white;" name="file">
                </div>
                
                <div style="padding:15px;">
                    
                    <input type="submit" class="btn btn-success bg-success">
                </div>
               
            </form>
           </div>
          
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <div style="padding-left:15px;padding-top:15px;">
                
                
               
                
           
           
