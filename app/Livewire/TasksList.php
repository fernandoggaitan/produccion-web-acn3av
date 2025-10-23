<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class TasksList extends Component
{

    public $count_mount = 0;
    public $count_render = 0;

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

    public function mount()
    {
        $this->count_mount++;
        $this->profes = $this->getProfes();
    }

    public function render()
    {
        //Contar la cantidad de veces que se renderiza el componente.
        $this->count_render++;
        //
        $tasks = Task::select( ['id', 'title', 'completed'] )
                ->when( $this->search, fn(Builder $builder) => 
                    $builder->where('title', 'like', "%{$this->search}%")
                )
                ->paginate(10);
        return view('livewire.tasks-list', [
            'tasks' => $tasks,
            'count_render' => $this->count_render            
        ]);
    }

    private function getProfes()
    {
        return User::select( ['id', 'name'] )
                ->whereHas('roles', fn(Builder $builder) => 
                    $builder->where('id', 2)
                )
                ->orderBy('name')
                ->get();
    }

}
