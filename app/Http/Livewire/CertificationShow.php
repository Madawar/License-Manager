<?php

namespace App\Http\Livewire;

use App\Models\CertificateLog;
use App\Models\Department;
use Livewire\Component;
use App\Models\License;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificationShow extends Component
{
    public $license;
    public $modalShow;
    public $message = null;

    use WithFileUploads;

    /**Search Traits */


    protected $rules = [
        'license.license_type' => '',
        'license.department_id' => '',
        'license.license_certification' => 'required|min:5',
        'license.last_acquired' => 'required|date',
        'license.renewal' => 'required|numeric',
        'license.license_period' => 'required',
        'license.license_key' => '',
        'license.notes' => '',
        'license.notify' => 'required',
        'license.reminder' => 'required|numeric',
        'license.license_reminder_period' => 'required',
        'license.brandName' => '',
        'license.asset_serial' => '',
        'license.modelName' => '',
        'license.brandName' => '',
    ];

    public function mount($license = null)
    {
        $this->license = License::find($license);

        if (is_null($this->license)) {
            $this->license = new License();
        }
    }

    public function updatedLicense()
    {
    }

    public function saveLicense()
    {
        $this->validate();

        $this->license->save();
    }

    public function render()
    {
        $licenses = array('warranty' => 'Warranty', 'license' => 'License', 'certification' => 'Certification');
        $departments = Department::all()->pluck('name', 'id');
        return view('livewire.certification-show')->extends('layouts.app')->with(compact('licenses', 'departments'));
    }

    public function renewCertificate()
    {
        CertificateLog::create(array(
            'license_id' => $this->license->id,
            'renewal_date' => $this->license->last_acquired
        ));

        $this->saveLicense();
        $this->showModal('License Renewal Updated', '', 'Your License Renewal Has Been Updated');
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

    public function download()
    {
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(Storage::path('Template.docx'));
        $licenses =  License::all();
        $replacements = $licenses->toArray();

        $templateProcessor->cloneBlock('block_name', 0, true, false, $replacements);

        $path = 'public/' . Str::random(5) . '.docx';
        $templateProcessor->saveAs(Storage::path($path));
        return $path;
    }
}
