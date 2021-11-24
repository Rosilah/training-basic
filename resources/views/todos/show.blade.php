@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Todos Show') }}</div>

                <div class="card-body">
                    </div class="form-group">
                            <label>Title</label>
                            <input type="text" readonly value ="{{$todo->title}}" name="title" class='form-control'>
                            </div>

                                <div class="from-group">
                                    <label>description</label>
                                    <input type="text" readonly value="{{$todo->description}}" nama="description" class="form-control">
                                </div> 
                                @if($todo->attachment)
                                <a
                                    target="_blank"
                                    href="{{ asset('storage/'.$todo->attachment)}}"
                                    class="btn btn-link">

                                    Open this attachemnt
                                    </a>
                                  @endif
                                    
                                <a class ="btn btn-primary" href="/todos">Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
