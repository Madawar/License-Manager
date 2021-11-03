Dear all,
<p>
    The {{ Str::ucfirst($license->license_type) }} {{ Str::ucfirst($license->license_certification) }}, is nearing
    expiry
    ({{ Carbon\Carbon::parse($license->next_renewal)->format('j-M-y') }}).
</p>
<p>
    Please start the procedure of renewing this {{ $license->license_type }}

</p>
<br />
