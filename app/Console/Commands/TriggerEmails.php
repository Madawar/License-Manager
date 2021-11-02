<?php

namespace App\Console\Commands;

use App\Mail\LicenseExpired;
use App\Mail\LicenseExpiredReminder;
use App\Mail\LicenseNearExpiry;
use App\Models\License;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TriggerEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:trigger {--option= : Whether the job should be queued}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $option = $this->option('option');
        $licenses = $this->query($option);
        foreach ($licenses as $license) {
            $email_sent = $license->log;
            //dd($email_sent);
            if ($option == 'nearexpiry') {
                if ($email_sent == null) {
                    Mail::to('dwanyoike@afske.aero')->send(new LicenseNearExpiry($license));
                    $license->log()->create(array('license_id' => $license->id, 'near_expiry' => 1, 'expired_date' => Carbon::today()));
                } elseif ($email_sent->near_expiry == 0) {
                    Mail::to('dwanyoike@afske.aero')->send(new LicenseNearExpiry($license));
                    $license->log()->update(array('license_id' => $license->id, 'near_expiry' => 1, 'near_expiry_date' => Carbon::today()));
                }
            } elseif ($option == 'expired') {
                if ($email_sent == null) {
                    Mail::to('dwanyoike@afske.aero')->send(new LicenseExpired($license));
                    $license->log()->create(array('license_id' => $license->id, 'expired' => 1, 'expired_date' => Carbon::today()));
                } elseif ($email_sent->expired == 0) {
                    Mail::to('dwanyoike@afske.aero')->send(new LicenseExpired($license));
                    $email_sent->update(array('expired' => 1, 'expired_date' => Carbon::today()));
                }
            } elseif ($option == 'reminder') {
                Mail::to('dwanyoike@afske.aero')->send(new LicenseExpiredReminder($license));
            }
        }
        return 0;
    }

    public function query($option)
    {
        $query = License::query();
        $query = $query->with('log');
        $query->when($option == 'nearexpiry', function ($q) {
            return $q->where('next_reminder',  Carbon::today()->format('Y-m-d'));
        });
        $query->when($option == 'expired', function ($q) {
            return $q->where('next_renewal', '<=', Carbon::today()->format('Y-m-d'));
        });
        $query->when($option == 'reminder', function ($q) {
            return $q->where('next_renewal', '<', Carbon::today()->format('Y-m-d'));
        });
        return $query->get();
    }
}
