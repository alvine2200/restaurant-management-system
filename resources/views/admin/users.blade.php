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


        <div style="position:relative; top: 60px; right: -160px;">


          @if(Session::has('message'))

          <div class="alert alert-success">

          <button type="button" class="close" data-dismiss="alert">X</button>

          
            {{ Session()->get('message')}}

          </div>
        

          @endif

          <table bgcolor="grey" border="3px solid black">

            <tr>
              <th style="padding:1.7rem">ID</th>
              <th style="padding:1.7rem">Name</th>
              <th style="padding:1.7rem">Email</th>
              <th style="padding:1.7rem">Action</th>
            </tr>

            @foreach($data as $data)

            <tr align="center" class="">

              <td class="pt-4">{{$data->id}}</td>
              <td class="pt-4">{{$data->name}}</td>
              <td class="pt-4">{{$data->email}}</td>

              @if($data->usertype=='0')
              <td class="pt-4"><a href="{{route('delete_user', $data->id)}}" onclick="return confirm('Want to Delete This?')" class="btn btn-danger">Delete</a></td>
              @else
              <td class="pt-4"><a href="#" class="btn btn-primary">-----</a></td>
              @endif

            </tr>

            @endforeach


          </table>
        </div>

      </div>

    
       
    @include('admin.script')
    
  </body>
</html>