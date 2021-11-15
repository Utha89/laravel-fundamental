<x-app-layout>


<div class="container">
    {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Hi... <b>{{ Auth::user()->name }}</b>
        <b style="float: right; ">Total Users
        <span class="badge badge-danger">{{ count($data) }}</span>
        </b>
    </h2> --}}
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
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
</x-app-layout>
