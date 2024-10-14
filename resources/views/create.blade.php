<!-- Modal -->

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Create User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('store')}}" method="POST" id="record_create" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="createInputImage">Select image to upload:</label><br/>
                  <input type="file" class="form-control" name="fileToUploadImage" id="fileToUploadImage">
                </div>
                <div class="form-group">
                  <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;width: 170px;height: 100px;">
                </div>
                <div class="form-group">
                    <label for="createInputName">Name</label>
                    <input type="name" name="name" class="form-control" id="createInputName" aria-describedby="nameHelp" placeholder="Enter Name">
                    <small id="nameHelp" class="form-text text-muted">We'll never share your Name with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="createInputPhone">Phone</label>
                    <input type="phone" name="phone" class="form-control" id="createInputPhone" aria-describedby="phoneHelp" placeholder="Enter Phone">
                    <small id="phoneHelp" class="form-text text-muted">We'll never share your Phone with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="createInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="createInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="createInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="createInputPassword1" placeholder="Password">
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  