<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\Status;

class TaskItem extends Component
{

    public Task $task;
    public $statuses;

    public $status_id;
    public $title;

    public function changeStatus()
    {
        $this->task->update([
            'status_id' => $this->status_id
        ]);
    }

    public function changeTitle()
    {
        $this->task->update([
            'title' => $this->title
        ]);
    }

    public function destroy()
    {
        $msj = "La tarea con el id: {$this->task->id} se ha eliminado";
        $this->task->delete();
        $this->dispatch('task-deleted', $msj);
    }

    public function mount(Task $task, $statuses)
    {
        $this->task = $task;
        $this->statuses = $statuses;
        $this->status_id = $task->status_id;
        $this->title = $task->title;
    }

    public function render()
    {
        return view('livewire.task-item');
    }

}
