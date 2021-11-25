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
                      </tr>
                    </thead>
                    <tbody>
                        {{-- @php($i=1) --}}
                        @foreach ($data as $datax )
                        <tr>
                            <th scope="row">{{ $data->firstItem()+$loop->index }}</th>
                            <td>{{ $datax->category_name }}</td>
                            <td>{{ $datax->name}}</td>
                            <td>
                            @if ($datax->created_at == null)
                                <span class="text-danger">No Data Set</span>

                            @else
                            <!--ORM-->
                            {{-- {{$data->created_at->diffForHumans()}} --}}


                            {{-- Query Builder --}}
                            {{( \Carbon\Carbon::parse($datax->created_at)->diffForHumans()) }}




                            @endif
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
                        <button type="submit" class="btn btn-primary">Sign in</button>



                  </form>
                </div>
            </div>
        </div>
        </div>
</div>
</div>
</x-app-layout>
