<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    <!-- Required meta tags -->

    <style type="text/css">
      label{
        width: 200px;
      }
      form input{
        color: black;
      }
    </style>


    @include('admin.admincss')
   
  </head>
  <body>

      @include('admin.dashboard')

      <div class="container-scroller">

         @include('admin.sidebar')


        <div style="position:relative; top: 60px; right:-150px;" class="pt-4">


                 @if(Session::has('message'))

                      <div class="alert alert-success">

                      <button type="button" class="close" data-dismiss="alert">X</button>

                      
                        {{ Session()->get('message')}}

                      </div>
                    

                    @endif





                   <form action="{{route('update_food', $data->id)}}" method="post" enctype="multipart/form-data">

                      @csrf

                      <div  class="mb-3 ">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $data->title }}" required>
                      </div>

                      <div class="mb-3 ">
                        <label>Price</label>
                        <input type="number" name="price" value="{{ $data->price }}" required>
                      </div>

                      <div class="mb-3 ">
                        <label>Image</label>
                        <img class="flex-wrap" height="100px" width="100px" src="/foodimage/{{$data->image}}">
                      </div>

                      <div class="mb-3">
                        <label>Change Image</label>
                        <input type="file" name="image" >
                      </div>

                      <div class="mb-3 ">
                        <label>Description</label>
                        <input type="text" name="description" value="{{ $data->description }}" required>
                      </div>

                      <div class="mb-3 ">
                        <button type="submit" class="btn btn-outline-primary">Update Foods</button>
                      </div>
                      
                    </form>



                  </div>


      </div>
    
        
    @include('admin.script')
    
  </body>
</html>