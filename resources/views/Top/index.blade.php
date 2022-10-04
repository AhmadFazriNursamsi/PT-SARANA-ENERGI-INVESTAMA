<x-app-layout>
    
<x-slot name="header">

<div class="container">
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card shadow">
              <div class="card-header d-flex justify-content-between align-items-center">
                <div class="text-secondary fw-bold fs-3">Top Rated</div>
                  <button type="button" id="add" class="btn btn-dark" data-toggle="modal">Add New Post</button>
                </div>
                <div class="card-body">
                  <div class="row" id="getdatashow">
                    <h1 class="text-center text-secondary my-y">Movie Loading..</h1>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>

      <!-- Modal -->
      <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <form action="#" method="POST" enctype="multipart/form-data" id="formm" novalidate>
                @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Modal title</h5>
                <button type="button" class="close btn btn-danger cl-add" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="judul">judul</label>
                  <input type="text" name="judul" id="juduladd" class="form-control " placeholder="judul" required>
                  <!-- <div class="invalid-feedback">Post judul is required</div> -->
                </div>
                <div class="mb-3">
                  <label for="genre">genre</label>
                  <input type="text" name="genre" id="genreadd" class="form-control" placeholder="genre" required>
                  <div class="invalid-feedback">Post genre is required</div>
                  <input type="hidden" name="idd" id="hiddenid">
                </div>
                <div class="mb-3">
                  <label for="descrip">descrip</label>
                  <input type="text" name="descrip" id="descripadd" class="form-control" placeholder="descrip" required>
                  <div class="invalid-feedback">Post descrip is required</div>
                </div>

                <div class="mb-3">
                  <label for="duration">duration</label>
                  <input type="number" name="duration" id="durationadd" class="form-control" placeholder="duration" required>
                  <div class="invalid-feedback">Post duration is required</div>
                </div>
                <div class="mb-3">
                  <label for="image">image</label>
                  <input type="file" id="imageadd" name="image" class="form-control" placeholder="image" required>
                  <div class="invalid-feedback">Post image is required</div>
                </div>
                <div id="imgshow">

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary cl-add" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="add_post_btn">Save changes</button>
              </div>
            </div>
          </form>
          </div>
        </div>
@section('script')
<script type="text/javascript">


$('#formm').submit(function(e){
    // var id = 
    var idx = $("#hiddenid").val();
    console.log(idx);
    var url = "{{ asset('/top/store') }}";
    if(idx != '')
    var url = "{{ asset('/top/update') }}/" +idx;
      e.preventDefault();
      let formData = new FormData(this);
      var form = $('#formm');
    $.ajax({
        type: "POST",
        url: url,
        enctype: 'multipart/form-data',
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
   

    success: function (response) 
    {
            Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            html:'Paket Berhasil <b>Disimpan</b>'
        });
        $('#juduladd').val("");
        $('#genreadd').val("");
        $('#descripadd').val("");
        $('#durationadd').val("");
        $('#imageadd').val("");
        
        // getdata();
        $('#addmodal').modal('hide');
        getdata();
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
    }
});
});

    $(document).ready(function (){
        getdata();
    });

    function getdata() { 
     
      var url = "{{ asset('/top/getdata') }}";

      var table3 = document.querySelector("#getdatashow");
      table3.innerHTML= "";
    //   table3= "";
      $.ajax({
        type: 'get',
        url:url,
        success: function(response){

          $.each(response.data, function (x,y) { 
            console.log(x,y);
            var html = '<div class="col-md-4">\
                  <div class="card shadow-ms">\
                      <img src="images/uploads/'+y["img"]+'" alt="" width="300" height=" 200">\
                    <div class="card-body">\
                        <div class="d-flex md-0 justify-content-between align-items-center">\
                          <div class="card-title fs-5 fw-bold"> '+y["judul"]+' </div>\
                          <div class="badge bg-dark">'+y["genre"]+'</div>\
                        </div>\
                        <div class="badge mt-0 bg-dark">'+y["duration"]+' Menit</div>\
                        </div >\
                        <p >'+y["descrip"]+'\
                        </p>\
                    </div>\
                    <div class="card-footer d-flex justify-content-between align-items-center">\
                      <div style="font-style: italic;">'+y["created_at"]+'</div>\
                      <div>\
                        <button type="button" id="'+y["id"]+'" onclick="editbtn('+y["id"]+')" data-toggle="modal" data-target="#edit_post_modal" data-attid="'+y["id"]+'" class="btn btn-success btn-sm post_edit_btn">Edit</button>\
                        <button type="button" id="'+y["id"]+'" onclick="deletebtn('+y["id"]+')" class="btn btn-danger btn-sm post_delete_btn">Delete</button>\
                      </div></div></div></div>  </div>'   
                      table3.innerHTML = table3.innerHTML + html;      
           })
        }
      })
     }

     $('#add').on('click', function(){
        $('#addmodal').modal('show');
     })
     $('.cl-add').on('click', function () { 
        $('#addmodal').modal('hide');
      })
    function editbtn(id) { 
        var url = "{{ asset('/top/getdata/edit') }}/" +id;
        $('#addmodal').modal('show');
        $.ajax({
        type: 'get',
        url:url,
        success: function(response){
            // console.log(response.data)
            data = response.data
        $('#juduladd').val(data.judul);
        $('#genreadd').val(data.genre);
        $('#descripadd').val(data.descrip);
        
        $('#hiddenid').val(data.id);
        $('#durationadd').val(data.duration);
        $('#imgshow').html(' <img src="images/uploads/'+data["img"]+'" alt="" width="300" height=" 200">');
       }});
    }
    function deletebtn(id) { 
        var url = "{{ asset('/top/getdata/delete') }}/" +id;
        $.ajax({
            type: 'get',
            url:url,
            success: function(response){
                console.log(response);

                Swal.fire({
                title: "Are you sure?",
                text: "Your will not be able to recover this imaginary file!",
                type: "danger",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
                });
                
                // getdata();
            }
        })
     }

    </script>
    @endsection    
</x-app-layout>
