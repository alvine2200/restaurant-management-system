<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <style type="text/css">

     form input{
        border: 1px solid transparent;
        border-radius: 10px;
        color: black;
      }
      
      label{
        width: 200px;
        padding-left: 1rem;
      }

      form{
        padding-top: 50px;
      }
    </style>

    @include('admin.admincss')
   
  </head>
  <body>

      @include('admin.dashboard')

      <div class="container-scroller">

           @include('admin.sidebar')


           <div style="position: relative; top:60px; right: -150px; background-color: grey; border-radius: 10px; align:center;" class="form-group">

              <div class="mt-3 header" style="font-size: 1.5rem; font-weight: 800px;" align="center" >
                
                <span>Chefs Profile Picture</span>

              </div>


              @if(Session::has('message'))

              <div class="alert alert-success">

                <button class="button" class="close" data-dismiss="alert">X</button>
                
                {{ Session()->get('message')}}

              </div>

              @endif
             
             <form action="{{ route('uploadchef')}}" method="post" enctype="multipart/form-data" >

                    @csrf

                    <div class="mb-2">
                      <label>Name</label>
                      <input type="text" name="name" placeholder="Enter chefs Name" required>
                    </div>

                     <div class="mb-2">
                      <label>Speciality</label>
                      <input type="text" name="speciality" placeholder="Enter chefs speciality" required>
                    </div>

                     <div class="mb-2">
                      <label>Phone</label>
                      <input type="number" name="phone" placeholder="Enter chefs Phone number" required>
                    </div>

                     <div class="mb-2">
                      <label>Image</label>
                      <input type="file" name="image" placeholder="Enter chefs image" required>
                    </div>

                    <div align="center" style="width: 100%; margin-top: 1rem !important; border-radius:7px;" class="mb-2">
                      <input type="submit" class="btn btn-primary" value="Upload Chefs" name="">
                    </div>

               </form>

               <div style="padding-top: 50px; border: 1px solid black;" class="mt-3">

                    <div align="center" style="font-size:1.5rem; font-weight: 600px;" class="mb-2 header">

                     <span  >Chefs List</span>

                   </div>
                 
                 <table>

                   <tr align="center">
                     <th style="padding:30px;">ID</th>
                     <th style="padding:30px;">Chef's Name</th>
                     <th style="padding:30px;">Speciality</th>
                     <th style="padding:30px;">Phone</th>
                     <th style="padding:30px;">Image</th>
                     <th style="padding:30px;">Action</th>
                   </tr>

                   @foreach ($data as $data)

                   <tr style="margin-bottom: 30px; border: 1px solid black;" align="center">
                     <td>{{ $data->id}}</td>
                     <td>{{ $data->name}}</td>
                     <td>{{ $data->speciality}}</td>
                     <td>{{ $data->phone}}</td>
                     <td><img height="100px" width="100px" src="/chefsimage/{{$data->image}}"></td>
                     <td><a href="#" class="btn btn-danger">Delete</a></td>
                   </tr>

                   @endforeach


                 </table>
               </div>

           </div>



      </div>
    
        
    @include('admin.script')
    
  </body>
</html>