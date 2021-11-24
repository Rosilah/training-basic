

  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users Index') }}</div>

                <div class="card-body">
                  <table class= "table">
                    <thead>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Create</th>
                      <th>Action</th>

                      <thead>
                        <body>

                        @foreach ($users as $user)
                         <tr>

                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name}}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->created_at->diffForHumans() }}</td>

                        <td>

                        <a class="btn btn-primary" href="/users/{{ $user->id}}">show</a>
                        <a class="btn btn-success" href="/users/{{ $user->id}}/edit">edit</a>
                        <a onclick="return confirm ('Yakin Ke Sayang???') "class="btn btn-danger" href="/users/{{ $user->id}}/delete">delete</a>
                        @endforeach
                        </body>
                     </table>


                     {{$users->links()}}
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
