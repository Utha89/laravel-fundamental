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

            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                       Multi Picture
                    </div>

                    <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="inputEmail3" >Image</label>

                              <input type="file" name="image" class="form-control" id="inputEmail3" multiple>
                              @error('image')
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
