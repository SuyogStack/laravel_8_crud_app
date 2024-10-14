
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>CRUD USER</title>
</head>
<body>

      <div class="container">
        <div class="row">
          <div class="col-sm">
            <br/>
            <br/>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createRecordModel">Create User</button>
          </div>
          <div class="col-sm">
            <br/>
            <br/>
            <form action="{{route('uploadfile')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Select File to upload:</label> 
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload"><br/>
                <button type="submit" class="btn btn-primary" value="Upload File">Upload File</button>
              </form>
          </div>
          
        </div>
      </div>
    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.no</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Password</th>
                        <th>Updated At</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                     $i=1;   
                    @endphp
                    @foreach($users as $user)
                    <tr>
                        <td>{{$i}}</td>
                        <td>
                            @if($user->image)
                            
                            <img id="showImage" src="{{ asset('user_profile/'.$user->image.'') }}" alt="show Image" accept="image/png, image/jpeg" style=";width: 70px;height: 100px;">
                            @else
                            
                            <img id="uploadedImage" src="{{ asset('user_profile/avatar.png') }}" alt="Uploaded Image" accept="image/png, image/jpeg" style="width: 70px;height: 100px;">
                            @endif
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->password}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>{{$user->created_at}}</td>
                       
                        <td>
                            <i tooltip="Edit Record" class="fa fa-edit editClass" style="font-size:40px;" id="edit" data-toggle="modal" data-target="#editRecordModel" data-id="{{$user->id}}"></i> &nbsp;&nbsp; <i title="Delete Record" class="fa fa-trash deleterecord" aria-hidden="true" id="delete" data-id="{{$user->id}}" style="font-size: 40px;"></i>
                        </td>
                    </tr>
                    @php
                     $i++;   
                    @endphp
                    @endforeach
                    
                    
                </tfoot>
            </table>
        </div>
      </div>
      
    <br/>
    

    <!-- Modal -->
    <div class="modal fade" id="createRecordModel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        @include('create')
    
    </div>

     <!-- Modal -->
     <div class="modal fade" id="editRecordModel" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        @include('edit')
    
    </div>
</body>
</html>


<script type="text/javascript">
    	
 new DataTable('#example');
</script>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="./js/common.js" type="text/javascript"></script>


