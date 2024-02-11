<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;
    public $name;
    public $search;
    public function TodoCreate(){
       $validate = $this->validate([
        "name"=>'required'
       ]);

        Todo::create([
        "name"=>$this->name
        ]);

        $this->reset('name');
        session()->flash('success','To do created!!!');
    }

    public function delete($todoId)
    {
        $todo = Todo::find($todoId);
        $todo->delete();
        session()->flash('success','Deleted');
    }

    public function checkbox($id){

        $checked = Todo::find($id);
        $checked->completed = !$checked->completed;
        $checked->save();

    }
    
    
    public function render()
    {
        $todoLists = Todo::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        $todoList = Todo::latest()->simplePaginate(2);
        return view('livewire.todo-list',compact('todoList','todoLists'));
    }
}
