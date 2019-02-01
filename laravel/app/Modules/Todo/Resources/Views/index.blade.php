@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Todos') }}</div>
                <div class="card-body">
                    
                    <a href="todo/create">{{ __('Create a new Todo') }}</a>
                    
                    @if (!$todos->count())
                        <p>
                            <br> {{ __('You have no Todos.') }}
                        </p>
                    @else
                        @foreach ($todos as $todo)
                            @include('todo::todo')
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
