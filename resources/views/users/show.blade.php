@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users Show') }}</div>

                <div class="card-body">
                    </div class="form-group">
                            <label>Name</label>
                            <input type="text" readonly value ="{{$user->name}}" name="name" class='form-control'>
                            </div>

                                <div class="from-group">
                                    <label>Email</label>
                                    <input type="text" readonly value="{{$user->email}}" nama="email" class="form-control">
                                </div> 
                                <a class ="btn btn-primary" href="/users">Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
