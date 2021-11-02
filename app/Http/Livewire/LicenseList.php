<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Livewire\Component;
use App\Models\License;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class LicenseList extends Component
{
    public $license;
    public $modalShow;
    public $message = null;
    public $filter = null;
    public $search = null;
    public $pagination = null;
    public $sortBy = null;
    public $department = null;

    use WithFileUploads;
    use WithPagination;

    /**Search Traits */


    protected $rules = [
        'license.field' => '',
        'filter' => '',
        'search' => '',
        'pagination' => '',
        'sortBy' => '',
        'department' => '',
        'date' => '',
    ];

    public function mount($license = null)
    {
        $this->license = $license;
        if (is_null($this->license)) {
            $this->license = new License();
        }
    }

    public function updatedLicense()
    {
        $this->validate();
        $this->license->save();
    }

    public function query()
    {
        $query = License::query();
        $query = $query->with('department');
        //$query = $query->with('carrier', 'services');
        $query->when($this->filter == 'expired', function ($q) {
            return $q->where('next_renewal', '<', Carbon::today());
        });
        $query->when($this->filter == 'expiring_soon', function ($q) {
            return $q->where('next_renewal', '>', Carbon::today())->where('next_renewal', '<', Carbon::today()->addMonth(6));
        });
        $query->when($this->department != '', function ($q) {
            return $q->where('department_id', $this->department);
        });
        $query->when(in_array($this->filter, array('license', 'warranty', 'certification')), function ($q) {
            return $q->where('license_type', $this->filter);
        });
        $query->when($this->search != '', function ($q) {
            return $q->where('license_certification', 'like', '%' . $this->search . '%')
                ->orWhere('license_type', 'like', '%' . $this->search . '%')
                ->orWhere('notify', 'like', '%' . $this->search . '%')
                ->orWhere('notes', 'like', '%' . $this->search . '%');
        });
        return $query;
    }

    public function render()
    {
        $licenses = $this->query();
        if ($this->pagination != 'all' or $this->pagination != '') {
            $licenses = $licenses->paginate($this->pagination);
        } elseif ($this->pagination == '') {
            $licenses = $licenses->paginate(10);
        } else {
            $licenses = $licenses->get();
        }
        $departments = Department::all()->pluck('name', 'id');
        $options = array('expired' => 'Expired', 'expiring_soon' => 'Expiring Soon (in 6 Months Or Less)', 'license' => 'Licenses only', 'warranty' => 'Warranty Only', 'certification' => 'Certification Only');
        return view('livewire.license-list')->extends('layouts.app')->with(compact('licenses', 'options', 'departments'));
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
