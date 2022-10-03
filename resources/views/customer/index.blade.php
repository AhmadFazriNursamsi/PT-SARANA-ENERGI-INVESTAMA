<?php use App\Http\Controllers\HelpersController as Helpers;

$haveaccessadd = Helpers::checkaccess('package', 'add');
$haveaccessdelete = Helpers::checkaccess('package', 'delete');
$haveaccessedit= Helpers::checkaccess('package', 'edit');

?>
@section('title')
<title>Item Penawaran</title>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight hetf2"><i class="bi bi-box2-fill"></i>
        {{ __('ITEM') }}  <button class="btn btn-success btn-sm" id="btn_addcustomer" onclick="addModal()"><i class="fa fas-plus"></i> ITEM</button> 
        </h2>
    </x-slot>
                                                    {{-- HEADER --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive">
                    <table id="itemTable" class="table text-start table-striped align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="align-center">Name</th>
                                    <th class="align-center">Email</th>
                                    <th class="align-center">Jumlah</th>
                                    <!-- <th class="align-center">Website</th> -->
                                    <th class="align-center">Action</th>                                    
                                </tr>
                                
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="align-center">Name</th>
                                    <th class="align-center">Email</th>
                                    <th class="align-center">Jumlah</th>
                                    <!-- <th class="align-center">Website</th> -->
                                    <th class="align-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                             
     
    @section('script')
<script type="text/javascript">
    var url = "{{ asset('/api/customer/getdata') }}";
    function searcAjax(a, skip = 0){
        if($(a).val().length > global_length_src || skip == 1) {
            var getparam = getAllClassAndVal("src_class_user"); // helpers
            $('#itemTable').DataTable().ajax.url(url+"?"+getparam).load();
        }
        else {
          $('#itemTable').DataTable().ajax.url(url).load();
        }
    }

    $(document).ready(function(){
        

        var table = $('#itemTable').DataTable({
            ajax: url,
            
            columnDefs: [
                 {
                   'targets': 3,
                   'searchable':false,
                   'orderable':false,
                   'className': 'dt-body-center',
                   'render': function (data, type, full, meta){
                       return '<span class="btn btn-info btn-sm" onclick="showdetail('+full[3]+')">details</span>';
                   }
                }, 
                // {
                //     'targets': 1,
                //     'name' : 'image',
                //     'data' : 'image',
                //     'searchable':false,
                //     'orderable':false,
                //     'className': 'dt-body-center',
                //    'render': function(data, type, full, meta) 
                //     {
                //         // console.log(full[2]);
                //         return '<img src=\'{{ asset("/images/uploads/Thumbnail-") }}' + full[2] + '\' width=\"100\" height=\"100\" alt=\"Thumbnails\"  class="imagePreviewNih">'; // hampir berhasil                        
                //     }
                
                // }
            ],
            searching: true,
        }); 

        $('.closeModalmodaladd').on('click', function(){
            $('#modaladd').modal('hide');
        });
    });



    ////////////////////////////// Add Modal
    function addModal(){
      
        $("#first_name").val("");
        $("#email").val("");
        $("#no_tlp").val("");

        $(".provinsi").val("");
        $(".kabupaten").val("");
        $(".kecamatan").val("");
        $(".kelurahan").val("");
        $(".alamat").val("");
        
        $("#modaladd").modal('show');
        $(".icoon").html("<i class='bi bi-person-plus-fill'></i>");
        $(".titlemodal").html("Add Karyawan");
        $("#addvbtn").hide();
        $("#deletevbtn").hide();
        $("#undeletevbtn").hide();

        $("#hidenId").val("");
        $(".provinsi").hide();
        $(".kabupaten").hide();
        $(".kecamatan").hide();
        $(".kelurahan").hide();
        $(".alamat").hide();
        $(".btn-add-cencel").hide();
    }
    $(document).ready(function(){

$( "#formm" ).submit(function(e) {
  var idx = $("#hidenId").val();
var url= "{{ asset('karyawan/store') }}" ;
if(idx != "")
var url = "{{ asset('/karyawan/update') }}/" + idx ;


e.preventDefault();
let formData = new FormData(this);
var form = $('#formm');
        $.ajax({
            type: "POST",
            url: url,
            // processData:
            enctype: 'multipart/form-data',
            data: formData,
            contentType: false,
           processData: false,
            success: function (response) {

                data = response.data;
                if(data == 'success') {
                    Swal.fire({
                        title: 'Selamat!',
                        text: "Data Berhasil Disimpan",
                        icon: 'success'
                    });
                    $('#modaladd').modal('hide');
                    reloaddata();
                    $('.alert-danger').hide();
                }
                else {
                    $.each(response.errors, function(key, value){
                    Swal.fire({
                        title: 'Gagal!',
                        text: value,
                        icon: 'error'
                    });
                });
                    
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });  
});

    function showdetail(id) {
        $('.titlemodal').html('Show Modal')
        var addurl = $('#addvbtn').attr('data-attrref')+'/'+id;
            $('#addvbtn').attr('href', addurl);
            $('#saveee').attr('data-attid', id);

   
        var addurl = $('#deletevbtn').attr('data-attid', id);
        var url = "{{ asset('/karyawan/detail') }}/" + id;
        // console.log(url);
        var form = $('#viewCustomer');
            $('#undeletevbtn').html("Undelete");
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        data = response.data;
  
                        // console.log(data);
                        if (data) {
                            $("#show_first_name").html(data.first_nama);
                            $("#show_last_name").html(data.last_nama);
                            // $("#show_logo").html(data.logo);
                            $("#show_website").html(data.website);
                                $("#show_email").html(data.email);
                                $('#id_Link').val(data.id)
                        //     $("#show_no_tlp").html(data.no_tlp);

                           }
                                reloaddata();
                                $('#modalview').modal('show'); 
                    }
                }); 
            $('#deletevbtn').attr('data-attid', id);
            $('#editbtn').attr('data-attid', id);
            $("#hidenId").val(id);
            $('#undeletevbtn').attr('data-attid', id);
            $('#deletevbtn').html('<i class="fa fa-trash"></i> Delete Divisi');
            $("#titledetailmodal").html("Detail Customer")
    }
       
    function editshow(){
        idx = $('#editbtn').attr('data-attid',);
        // $("#hidenId").val();
        $("#iconn").html("<i class='bi bi-pencil-square'></i>");
        $(".titlemodal").html("Edit Customers");
        
        var url = "{{ asset('/karyawan/edit') }}/" + idx;
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        data = response.data;
                        // if(data) {
                            $("#first_name").val(data.first_nama);
                            $("#last_name").val(data.last_nama);
                            $("#website").val(data.website);
                            $("#email").val(data.email);
                            $('#id_Link').val(data.id)
                            
                            // }
                            // $("#closemodaledit").modal('hide');
                            $('#modaladd').modal('show');
                            $('#modalview').modal('hide');
                                
                            }
                        
                });
    }
    
    function reloaddata() {
        $('#itemTable').DataTable().ajax.url(url).load();
    }

    
</script>
@endsection    
</x-app-layout>


