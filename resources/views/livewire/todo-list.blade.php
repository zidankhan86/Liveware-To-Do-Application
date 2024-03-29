<div style="display: flex;">
    <div style="flex: 1; margin-right: 20px;">
        <h2>Todo Form</h2>
        @if (session('success'))
            <span class="btn btn-success">{{session('success')}}</span>
        @endif
        
        <form wire:submit.prevent="TodoCreate">
            <div class="form-group">
                <label>Enter Todo</label>
                <input type="text" wire:model="name" class="form-control" placeholder="Enter todo">
            </div>
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror

           <br> <div class="form-group">
        <label>Enter Image</label><br>
        <input type="file" wire:model="image" class="form-control-file">
            </div>
    @error('image')
        <span class="text-danger">{{$message}}</span>
    @enderror

            <br>
            <button type="submit" class="btn btn-primary">Create Todo</button><br><br><br>
        </form>
    </div>
    <div style="flex: 1;">
        <h2>Todo Table</h2>
        <div class="form-group row">
    <div class="col">
        <input type="text" wire:model="search" class="form-control" placeholder="Search Todo...">
    </div>
    <div class="col-auto">
        <button wire:model.live.debounce.500ms="searchTodo" class="btn btn-primary btn-sm">Search</button>
    </div>
</div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Todo</th>
                    <th scope="col">Action</th>
                    <th scope="col">Created</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($todoList as $list)
    <tr>
        <th scope="row">{{ $list->id }}</th>
        <td>
            <input type="checkbox" wire:click="checkbox({{ $list->id }})" {{ $list->completed ? 'checked' : '' }}>
            {{ $list->name }}
        </td>
        <!-- <td>
            <button href="" class="btn btn-success"><i class="fas fa-edit"></i></button>
            <button wire:click="delete({{ $list->id }})" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </td> -->
        <td>
            @if ($editId === $list->id)
                <button wire:click="update({{ $list->id }})" class="btn btn-primary btn-sm">Save</button>
                <button wire:click="cancelEdit" class="btn btn-secondary btn-sm">Cancel</button>
            @else
                <button wire:click="edit({{ $list->id }})" class="btn btn-secondary btn-sm">Edit</button>
                <button wire:click="delete({{ $list->id }})" class="btn btn-danger btn-sm">Delete</button>
            @endif
        </td>
        <td>{{ $list->created_at->format('D/M/Y') }}</td>
    </tr>
        @endforeach

            </tbody>
        </table>
        {{$todoList->links()}}
    </div>
</div>
