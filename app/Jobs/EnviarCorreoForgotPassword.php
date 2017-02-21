<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendForgotEmail;
use App\Usuario;

use Mail, Uuid;
class EnviarCorreoForgotPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $correoElectronico;
    protected $usuario;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;
        // Obtener usuario de la DB
        $this->usuario = Usuario::where('correo_electronico', $this->correoElectronico)->first();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         // Genero token único de validación
        $reset_password_token = Uuid::uuid4()->toString();

        // Creo el url de reestablecer contraseña
        $url = url('/passwords/reset').'?reset_password_token='.$reset_password_token;

        // Guardo el token generado en la DB
        $this->usuario->reset_password_token = $reset_password_token;
        $this->usuario->save();
         // Envio el correo
        Mail::to($this->correoElectronico)->send(new SendForgotEmail ($url));
    }
}
