<x-app-layout>

<div class="py-12">
<div class="container">

    <div class="row">

        <div class="col-md-8">
            <div class="card">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <div class="card-header">
                    Data Table<br>
                    <a data-toggle="modal" href="#" id="smallButton" data-target="#smallModal"
                    data-attr="" title="show">
                    <i class="fas fa-eye text-success  fa-lg">tes</i>
                </a>
                </div>

                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                        </tr>
                    </thead>

                </table>

                 </div>
        </div>


        </div>
</div>
</div>
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="smallBody">
            <div>
                <!-- the result to be displayed apply here -->
                <form>
                    @csrf
                    <div class="form-group">
                      <label for="inputEmail3" >Category Name</label>

                        <input type="text" name="category_name" class="form-control" id="inputEmail3">
                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>




            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="simpan" class="btn btn-primary">Add Category</button>

              </div>
            </form>
        </div>
    </div>
</div>
</div>

</x-app-layout>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#users-table').DataTable({
    "pageLength": 10,
    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'semua']],
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": true,
    "processing":true,
    "bServerSide": true,
    "order": [[ 1, "desc" ]],
    "autoWidth": false,

    "ajax":{
      url: "{{url('')}}/datatable/data",
      type: "GET",
    //   data:function(d){
    //     d.organisasi = organisasi;
    //     d.bpjs_kesehatan = bpjs_kesehatan;
    //     d.bpjs_ketenagakerjaan = bpjs_ketenagakerjaan;
    //     return d
    //   }
    },
    columnDefs: [

      {
        "targets": 0,
        "class":"text-nowrap",
        "render": function(data, type, row, meta){
            return row.category_name;
        }
      },
      {
        "targets": 1,
        "class":"text-nowrap",
        "render": function(data, type, row, meta){
          return row.nama_user;
        }
      }

    ]
    });

    $(document).on('click', '#smallButton', function(event) {
        //alert("tes")
            event.preventDefault();
            let href = $(this).attr('data-attr');
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();

        });
   $(document).on('click', '#simpan', function(event) {
            alert("yes");
        });

    });



</script>
