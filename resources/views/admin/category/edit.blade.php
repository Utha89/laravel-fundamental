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
                    <div class="card-header">
                        Edit Category
                    </div>

                    <div class="card-body">
                    <form action="{{ url('category/update_process/'.$data->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="inputEmail3" >Category Name</label>

                            <input type="text" name="category_name" class="form-control" id="inputEmail3" value="{{ $data->category_name }}">
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                            <button type="submit" class="btn btn-primary">Update</button>



                      </form>
                    </div>
                </div>
            </div>
            </div>
    </div>
    </div>
    </x-app-layout>
