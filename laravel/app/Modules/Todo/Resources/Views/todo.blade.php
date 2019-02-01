<div id='todo-{{ $todo->id }}' class='todo row mt-3'>
    <p class="col-8">
        {{ $todo->description }} <br>
        
         <small class='status'>{{ $todo->done ? 'Done' : 'Pending' }}</small>
    </p>
    
    @include('todo::actions')
</div>
