<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.admincss')
   
  </head>
  <body>

    <style type="text/css">
      label{
        width: 200px;
      }
      form input{
        color: black;
      }
    </style>

 
      @include('admin.dashboard')

    <div class="container-scroller">

      @include('admin.sidebar')

      
        <div align="center" style="position:relative; top: 60px; background-color: grey; " class="pt-4">

        



          @if(Session::has('message'))

          <div class="alert alert-success">

            <button class="button" class="close" data-dismiss="alert">X</button>
            
            {{ Session()->get('message')}}

          </div>

          @endif

          <div align="center" class="mb-3">
            
            <span style="font-size:1.5rem;">Add Food Stuffs</span>

          </div>

          
          <form  style="width: 400px" action="{{route('add_foodmenu')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div  class="mb-3 ">
              <label>Title</label>
              <input type="text" name="title" placeholder="Title..." required>
            </div>

            <div class="mb-3 ">
              <label>Price</label>
              <input type="number" name="price" placeholder="Price..." required>
            </div>

            <div class="mb-3 ">
              <label>Description</label>
              <input type="text" name="description" placeholder="Description..." required>
            </div>

            <div class="mb-3 ">
              <label >Add_Food_Image</label>
              <input style="align-content: center;" type="file" name="image" placeholder="Image..." required>
            </div>

            <div class="mb-3 ">
              <button type="submit" class="btn btn-success">Add Food</button>
            </div>
            
          </form>


          <div style="padding-top: 80px;" >

            @if(Session::has('message'))

              <div class="alert alert-success">

              <button type="button" class="close" data-dismiss="alert">X</button>

              
                {{ Session()->get('message')}}

              </div>
            

            @endif




            <div align="center" class="header">
              <span style="font-size: 1.5rem;">Foods In the Menu Section</span>
            </div>

            <table bgcolor="grey">
            
            <tr>
              <th style="padding:30px;">ID</th>
              <th style="padding:30px;">Food_Title</th>
              <th style="padding:30px;">Price</th>
              <th style="padding:30px;">Description</th>
              <th style="padding:30px;">Image</th>
              <th style="padding:30px;">Action</th>
              <th style="padding:30px;">Update</th>

            </tr>

            @foreach($data as $data)

            <tr align="center" style="border: 1px solid black;">
              <td class="mb-2">{{ $data->id }}</td>
              <td class="mb-2">{{ $data->title }}</td>
              <td class="mb-2">{{ $data->price }}</td>
              <td align="left" class="mb-2">{{ $data->description }}</td>
              <td class="mb-2"><img height="100px;" width="100px;" src="/foodimage/{{ $data->image }}"></td>
              
               <td><a href="{{ route('update_menu',$data->id) }}" class="btn btn-success">Update</a></td>

              <td><a href="{{ route('delete_menu',$data->id) }}" onclick="return confirm('Do you want to delete this Food')" class="btn btn-danger">Delete</a></td>
            </tr>

            @endforeach


          </table>

          </div>

        </div>

      


    </div>


    
        

    @include('admin.script')
    
  </body>
</html>