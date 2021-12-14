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
                        Edit Brands
                    </div>

                    <div class="card-body">
                    <form action="{{ url('brand/update_process/'.$data->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="inputEmail3" >Brand Name</label>

                            <input type="text" name="brand_name" class="form-control" id="inputEmail3" value="{{ $data->brand_name }}">
                            @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" >Brand Image</label>

                              <input type="file" name="brand_image" class="form-control" id="inputEmail3" value="{{ $data->brand_image }}">
                              @error('brand_image')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>

                          <div class="form-group">
                              <img src="{{ asset($data->brand_image) }}" style="width: 400px;height: 200px;">

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
