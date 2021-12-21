<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.admincss')
   
  </head>
  <body>



      @include('admin.dashboard')

      <div class="container-scroller">

         @include('admin.sidebar')


         <div style="position:relative; top: 60px; align:center; background-color: grey;">

          <table>
            
              <tr align="center" style="font-size: 1rem;">
                <th style="padding:25px;">id </th>
                <th style="padding:25px;">Name</th>
                <th style="padding:25px;">Email</th>
                <th style="padding:25px;">Phone</th>
                <th style="padding:25px;">Guests</th>
                <th style="padding:25px;">Date</th>
                <th style="padding:25px;">Time</th>
                <th style="padding:25px;">Message</th>
              </tr>

              @foreach($data as $data)

              <tr align="center" style="border:1px solid black;">
                <td style="padding: 25px">{{$data->id}}</td>
                <td style="padding: 25px">{{$data->name}}</td>
                <td style="padding: 25px">{{$data->email}}</td>
                <td style="padding: 25px">{{$data->phone}}</td>
                <td style="padding: 25px">{{$data->guest}}</td>
                <td style="padding: 25px">{{$data->date}}</td>
                <td style="padding: 25px">{{$data->time}}</td>
                <td style="padding: 25px">{{$data->message}}</td>
              </tr>


              @endforeach


          </table>
           

         </div>


      </div>


    
        
    @include('admin.script')
    
  </body>
</html>