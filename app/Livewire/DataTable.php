<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class DataTable extends Component
{
    public function render()
    {
        $dataTable = Todo::all();
        return view('livewire.data-table',compact('dataTable'));
    }
}
