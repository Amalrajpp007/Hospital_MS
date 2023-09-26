<div class="page-section">
    <div class="container">

      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" action="{{route('user.appointment')}}" method='POST'>
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Full name" name='username'>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="email" class="form-control" placeholder="Email address.." name='email'>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" class="form-control" name='date'>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  id="departement" class="custom-select" name='doctor'>
            <option> Select doctor</option>
              @foreach($doctors as $d)
             
              <option value="{{$d->name}}">{{$d->name}}  ---> {{$d->speciality}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" class="form-control" placeholder="Phone Number.." name="phone">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" style="background-color:green; color:white; margin-top:10px;width:300px;height:50px;">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->