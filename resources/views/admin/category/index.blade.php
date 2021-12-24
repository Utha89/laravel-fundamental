<x-app-layout>

<div class="py-12">
<div class="container">
    {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Hi... <b>{{ Auth::user()->name }}</b>
        <b style="float: right; ">Total Users
        <span class="badge badge-danger">{{ count($data) }}</span>
        </b>
    </h2> --}}
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
                    All Category
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        {{-- @php($i=1) --}}
                        @foreach ($data as $datax )
                        <tr>
                            <th scope="row">{{ $data->firstItem()+$loop->index }}</th>
                            <td>{{ $datax->category_name }}</td>
                             <!--Join Pake query orm -->
                            <td>{{ $datax->user->name }}</td>
                           <!--Join Pake query builder -->
                           {{-- <td>{{ $datax->name}}</td> --}}
                            <td>
                            @if ($datax->created_at == null)
                                <span class="text-danger">No Data Set</span>

                            @else
                            <!--Query Builder-->
                            {{-- {{$data->created_at->diffForHumans()}} --}}


                            {{-- Query Orm --}}
                            {{( \Carbon\Carbon::parse($datax->created_at)->diffForHumans()) }}




                            @endif
                        </td>
                        <td>
                            <a href="{{ url('category/edit/'.$datax->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ url('softdelete/category/'.$datax->id) }}" class="btn btn-danger">Delete</a>

                        </td>
                          </tr>

                        @endforeach

                    </tbody>
                  </table>
                  {{ $data->links() }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add Category
                </div>

                <div class="card-body">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="inputEmail3" >Category Name</label>

                        <input type="text" name="category_name" class="form-control" id="inputEmail3">
                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                        <button type="submit" class="btn btn-primary">Add Category</button>



                  </form>
                </div>
            </div>
        </div>
        </div>
</div>



<!--Tabel Soft Delete-->
<div class="container">
    {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Hi... <b>{{ Auth::user()->name }}</b>
        <b style="float: right; ">Total Users
        <span class="badge badge-danger">{{ count($data) }}</span>
        </b>
    </h2> --}}
    <div class="row">

        <div class="col-md-8">
            <div class="card">


                <div class="card-header">
                    Soft Delete
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        {{-- @php($i=1) --}}
                        @foreach ($trashCat as $datax )
                        <tr>
                            <th scope="row">{{ $data->firstItem()+$loop->index }}</th>
                            <td>{{ $datax->category_name }}</td>
                             <!--Join Pake query orm -->
                            <td>{{ $datax->user->name }}</td>
                           <!--Join Pake query builder -->
                           {{-- <td>{{ $datax->name}}</td> --}}
                            <td>
                            @if ($datax->created_at == null)
                                <span class="text-danger">No Data Set</span>

                            @else
                            <!--Query Builder-->
                            {{-- {{$data->created_at->diffForHumans()}} --}}


                            {{-- Query Orm --}}
                            {{( \Carbon\Carbon::parse($datax->created_at)->diffForHumans()) }}




                            @endif
                        </td>
                        <td>
                            <a href="{{ url('category/restore/'.$datax->id) }}" class="btn btn-info">Restore</a>
                            <a href="{{ url('category/delete/'.$datax->id) }}" class="btn btn-danger">Delete</a>

                        </td>
                          </tr>

                        @endforeach

                    </tbody>
                  </table>
                  {{ $trashCat->links() }}
            </div>
        </div>


        </div>
</div>
</div>


<!--Data Table-->
<div class="container">
    {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Hi... <b>{{ Auth::user()->name }}</b>
        <b style="float: right; ">Total Users
        <span class="badge badge-danger">{{ count($data) }}</span>
        </b>
    </h2> --}}
    <div class="row">
        <html lang="en">


        <div class="col-md-8">
            <div class="card">


                <div class="card-header">
                    Data Table
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
</x-app-layout>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
$(function() {
    $(document).ready( function () {
    $('#users-table').DataTable({
    "pageLength": 100,
    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'semua']],
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": true,
    "processing":true,
    "bServerSide": true,
    "order": [[ 1, "desc" ]],
    "autoWidth": false,

    "ajax":{
      url: "{{url('')}}/category/data",
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
    });
});
</script>
