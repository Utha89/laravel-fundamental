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
                    All Category
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created at</th>
                      </tr>
                    </thead>
                    {{-- <tbody>
                        @php($i=1)
                        @foreach ($data as $data )
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</td>
                          </tr>
        
                        @endforeach
        
                    </tbody> --}}
                  </table>
        
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
