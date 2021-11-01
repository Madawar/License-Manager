<?php

namespace App\Http\Livewire\Department;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithFileUploads;

class DepartmentCreator extends Component
{
    public $department;
    public $modalShow;
    public $message = null;

    use WithFileUploads;

    /**Search Traits */


    protected $rules = [
        'department.name' => '',
        'department.email' => '',
    ];

    public function mount($department = null)
    {
        $this->department= $department;
        if (is_null($this->department)) {
            $this->department = new Department();
        }
    }
    public function updatedDepartment()
    {
        //$this->validate();
        //$this->department->save();
    }

    public function saveDepartment(){
        $this->validate();
        $this->department->save();
    }
    public function render()
    {
        return view('livewire.department.department-creator')->extends('layouts.app');
    }

    public function showModal($title, $subText, $information)
    {
        $this->message['title'] = $title;
        $this->message['subtext'] = $subText;
        $this->message['information'] = $information;
        $this->modalShow = true;
    }

    public function closeModal()
    {
        $this->modalShow = false;
    }
}
