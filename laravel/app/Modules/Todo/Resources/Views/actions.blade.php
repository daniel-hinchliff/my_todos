<div class='actions col text-right'>
    <a href="{{ route('todo_edit', ['id' => $todo->id]) }}" class="btn btn-secondary mb-1"> Edit </a>
    
    <form method="POST" action="{{ route('todo_delete', ['id' => $todo->id]) }}" class='d-inline'>
        @csrf

        <button type="submit" class="btn btn-secondary mb-1">
            {{ __('Delete') }}
        </button>
    </form>
</div>
