<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Livewire\Attributes\On; 

class TasksList extends Component
{

    use WithPagination;

    public $title = '';
    public $search = '';
    public $statuses;
    public $msj;

    #[On('task-deleted')]
    public function refreshTask($msj)
    {
        $this->msj = $msj;
    }

    public function add()
    {
        Task::create([
            'title' => $this->title,
            'status_id' => 1 //Todos se insertar en el estado 1 (Pendiente)
        ]);
        $this->title = '';
    }

    public function mount()
    {
        $this->statuses = Status::select( ['id', 'name'] )->orderBy('id')->get();
    }

    public function render()
    {
        $tasks = Task::select( ['id', 'title', 'completed', 'status_id'] )
                ->when( $this->search, fn(Builder $builder) => 
                    $builder->where('title', 'like', "%{$this->search}%")
                )
                ->paginate(10);
        return view('livewire.tasks-list', [
            'tasks' => $tasks
        ]);
    }

}