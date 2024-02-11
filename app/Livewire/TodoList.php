<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $name;
    public $search;
    public $editId = null;
    public $image;

    public function TodoCreate(){
       $validate = $this->validate([
        "name"=>'required',
        "image"=>'required'
       ]);
       $image =null;
    if($this->image){
    $image= $this->image->store('image','public');
}
        Todo::create([
        "name"=>$this->name,
        "image"=>$image
        ]);

        $this->reset('name','image');
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

    public function edit($id)
    {
        $this->editId = $id;
        $this->name = Todo::findOrFail($id)->name;
    }
    
    public function update($id)
    {
        $this->validate(['name' => 'required']);
        $todo = Todo::findOrFail($id);
        $todo->name = $this->name;
        $todo->save();
        $this->reset(['name', 'editId']);
        session()->flash('success', 'Todo updated!');
    }
    
    public function render()
    {
        $todoLists = Todo::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        $todoList = Todo::latest()->simplePaginate(2);
        return view('livewire.todo-list',compact('todoList','todoLists'));
    }
}
