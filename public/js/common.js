
$( document ).ready(function() {

    //image priview start
    document.getElementById("fileToUploadImage").addEventListener("change", function () {
        if (this.files[0]) {
          var picture = new FileReader();
          picture.readAsDataURL(this.files[0]);
          picture.addEventListener("load", function (event) {
            document
              .getElementById("uploadedImage")
              .setAttribute("src", event.target.result);
            document.getElementById("uploadedImage").style.display = "block";
          });
        }
      });

         //image priview start
    document.getElementById("fileToUploadImageupdate").addEventListener("change", function () {
        if (this.files[0]) {
          var picture = new FileReader();
          picture.readAsDataURL(this.files[0]);
          picture.addEventListener("load", function (event) {
            document
              .getElementById("uploadedImageupdate")
              .setAttribute("src", event.target.result);
            document.getElementById("uploadedImageupdate").style.display = "block";
          });
        }
      });
      
    //image priview end
    // console.log("ready js");
    $( ".editClass" ).on( "click", function() {
        var record_id=$(this).data('id');;
        // console.log("IN edit");
        console.log("record_id--> "+record_id);
            $.ajax({
                url: "/getData",
                type: "GET",
                data: {
                    record_id:record_id
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                // cache: false,
                success: function(data){
                // console.log(data);
                console.log(data);
                $("#record_id").attr('value',data.id);
                $("#updateInputName").attr('value',data.name);
                $("#updateInputEmail1").attr('value',data.email);
                $("#updateInputPhone").attr('value',data.phone);
                if(data.image)
                {
                  $("#uploadedImageupdate").attr('src','user_profile/'+data.image);
                }
                else
                {
                  $("#uploadedImageupdate").attr('src','user_profile/avatar.png');
                }
                  
                }
            });
        } );

        $( ".deleterecord" ).on( "click", function() {
            var record_id=$(this).data('id');;
            var check=confirm("Are you sure to delete this record");
            if(check)
            {
                $.ajax({
                    url: "/deleteData",
                    type: "GET",
                    data: {
                        record_id:record_id
                    },
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    // cache: false,
                    success: function(data){
                    // console.log(data);
                    console.log(data.msg);
                    if(data.status=="success")
                    {
                        alert("Record Delete Successfully.");
                        location.reload();
                    }
                    else
                    {
                        alert("Something went wrong");
                        location.reload();
                    }
                      
                    }
                });
            }
        });
});