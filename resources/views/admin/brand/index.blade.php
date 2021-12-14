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
                        All Brand
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand Image</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                            {{-- @php($i=1) --}}
                            @foreach ($data as $datax )
                            <tr>
                                <th scope="row">{{ $data->firstItem()+$loop->index }}</th>
                                <td>{{ $datax->brand_name }}</td>

                                <td><img src="{{ asset($datax->brand_image) }}" style="height: 40px; width: 70px"></td>

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
                                <a href="{{ url('brand/edit/'.$datax->id) }}" class="btn btn-info">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>

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
                        Add Brand
                    </div>

                    <div class="card-body">
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="inputEmail3" >Brand Name</label>

                            <input type="text" name="brand_name" class="form-control" id="inputEmail3">
                            @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" >Brand Image</label>

                              <input type="file" name="brand_image" class="form-control" id="inputEmail3">
                              @error('brand_image')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                        <br>
                            <button type="submit" class="btn btn-primary">Add Brand</button>



                      </form>
                    </div>
                </div>
            </div>
            </div>
    </div>




    </div>
    </x-app-layout>
