<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Usuario;
use Uuid, Mail;
class EnviarConfirmacionDeCuenta implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $usuario;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->usuario = $usuario;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Genero un token único
        $token = Uuid::uuid4()->toString();

        // Se general el URL de confirmación que será enviado dentro del email
        // al usuario
        $url = url('validar-correo').'?email='.$this->usuario->correo_electronico.'&token='.$token;

        // Guardo el token en confirmation_token del usuario
        $this->usuario->confirmation_token = $token;
        $this->usuario->save();

        // Envio el correo
        Mail::send('verificacion-cuenta', compact(url), function($mail){
            $mail->to($usuario->correo_electronico)
                ->subject('Verificación de correo electrónico');
        });

    }
}
