<div class='actions col text-right'>
    <form method="POST" action="{{ route('todo_delete', ['id' => $todo->id]) }}" class='d-inline'>
        @csrf

        <button type="submit" class="btn btn-secondary mb-1">
            {{ __('Delete') }}
        </button>
    </form>
</div>
