<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class TasksList extends Component
{

    use WithPagination;

    public $title = '';
    public $search = '';
    public $profes;

    public function add()
    {
        Task::create([
            'title' => $this->title
        ]);
        $this->title = '';
    }

    public function changeComplete( Task $task )
    {
        /*
        if( $task->completed ){
            $completed = false;
        }else{
            $completed = true;
        }
        */
        //Cambiamos el valor boolean de la propiedad completed de la tarea.
        $completed = !$task->completed;
        $task->update([
            'completed' => $completed
        ]);
    }

    public function render()
    {
        $tasks = Task::select( ['id', 'title', 'completed'] )
                ->when( $this->search, fn(Builder $builder) => 
                    $builder->where('title', 'like', "%{$this->search}%")
                )
                ->paginate(10);
        return view('livewire.tasks-list', [
            'tasks' => $tasks
        ]);
    }

}