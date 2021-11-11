<x-app-layout>


<div class="container">
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
            <tbody>
                @foreach ($data as $data )
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->created_at }}</td>
                  </tr>

                @endforeach

            </tbody>
          </table>
    </div>
</div>
</x-app-layout>
