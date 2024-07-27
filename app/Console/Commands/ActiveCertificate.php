<?php

namespace App\Console\Commands;

use App\Models\certificate;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ActiveCertificate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:active-certificate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Active certificate for the user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Fecha actual
        $today = Carbon::now()->format('Y-m-d');

        // Obtener certificados que necesitan ser actualizados
        $certificates = certificate::where('broadcast_date', $today)
            ->where('status', 'inactive')
            ->get();

        // Actualizar el estado de los certificados
        foreach ($certificates as $certificate) {
            $certificate->status = 'active';
            $certificate->save();
        }

        
       
    }
}