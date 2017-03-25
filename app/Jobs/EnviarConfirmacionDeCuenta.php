<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Usuario;
use Uuid, Mail;
use App\Mail\SendConfirmationAccount;
class EnviarConfirmacionDeCuenta implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $usuario;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Usuario $usuario)
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
        // Se genera un token único
        $token = Uuid::uuid4()->toString();

        // Se genera el URL de confirmación que será enviado dentro del email
        // al usuario
        $url = url('validar-correo').'?email='.$this->usuario->correo_electronico.'&token='.$token;

        // Se guarda el token en confirmation_token del usuario
        $this->usuario->confirmation_token = $token;
        $this->usuario->save();
        // Se Envia el correo
        Mail::to($this->usuario->correo_electronico)->send(new SendConfirmationAccount($url)); 
    }
}
