<?php

namespace App\Http\Livewire\Department;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class DepartmentList extends Component
{
    public $department;
    public $modalShow;
    public $message = null;
    public $filter = null;
    public $search = null;
    public $pagination = null;
    public $sortBy = null;

    use WithFileUploads;
    use WithPagination;

    /**Search Traits */


    protected $rules = [
        'department.field' => '',
        'filter' => '',
        'search' => '',
        'pagination' => '',
        'sortBy' => '',
        'date' => '',
    ];

    public function mount($department = null)
    {
        $this->department = $department;
        if (is_null($this->department)) {
            $this->department = new Department();
        }
    }
    public function updatedDepartment()
    {
        $this->validate();
        $this->department->save();
    }
    public function query()
    {
        $query = Department::query();
        $query = $query->with('licenses');

        return $query;
    }

    public function render()
    {
        $departments = $this->query();
        if ($this->pagination != 'all' or $this->pagination != '') {
            $departments = $departments->paginate($this->pagination);
        } elseif ($this->pagination == '') {
            $departments = $departments->paginate(10);
        } else {
            $departments = $departments->get();
        }
        $options = array();
        return view('livewire.department.department-list')->extends('layouts.app')->with(compact('departments', 'options'));
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
