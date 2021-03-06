@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($todo->exists ? 'Edit' : 'Create') }} Todo</div>
                <div class="card-body">
                    <form method="POST" action="{{ $todo->exists ? route('todo_edit', ['id' => $todo->id]) : route('todo_create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" 
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                       name="description" value="{{ old('description', $todo->description) }}" 
                                       required autofocus maxlength="30">

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                        @if ($todo->exists)
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    <input id="done" type="checkbox" name="done" 
                                           value="1" {{ old('done', $todo->done) ? 'checked' : '' }}>

                                    <label for="done" class="col-form-label text-md-right">{{ __('Done') }}</label>
                                </div>
                            </div>
                        @endif
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __($todo->exists  ? 'Save' : 'Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
