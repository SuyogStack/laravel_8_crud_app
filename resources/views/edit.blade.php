<!-- Modal -->

<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('updateData')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" name="recordId" id="record_id" value="">
              <div class="form-group">
                <label for="updateInputImage">Select image to upload:</label><br/>
                <input type="file" class="form-control" name="fileToUploadImageupdate" id="fileToUploadImageupdate">
              </div>
              <div class="form-group">
                <img id="uploadedImageupdate" src="" alt="Uploaded Image" accept="image/png, image/jpeg" style="width: 170px;height: 100px;">
              </div>
              <div class="form-group">
                  <label for="updateInputName">Name</label>
                  <input type="updatename" name="updatename" class="form-control" id="updateInputName" placeholder="Enter Name" value="">
                  <small id="nameHelp" class="form-text text-muted">We'll never share your Name with anyone else.</small>
              </div>
              <div class="form-group">
                  <label for="updateInputPhone">Phone</label>
                  <input type="updatephone" name="updatephone" class="form-control" id="updateInputPhone" placeholder="Enter Phone" value="">
                  <small id="phoneHelp" class="form-text text-muted">We'll never share your Phone with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="updateInputEmail1">Email address</label>
                <input type="updateemail" name="updateemail" class="form-control" id="updateInputEmail1" placeholder="Enter email" value="">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="updateInputPassword1">Password</label>
                <input type="updatepassword" name="updatepassword" class="form-control" id="updateInputPassword1" placeholder="Update Password">
              </div>
            
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
      </div>
    </div>
  </div>
