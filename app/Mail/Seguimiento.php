<?php

namespace App\Mail;

use App\Documento;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Seguimiento extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Collection Al estar declarada como propiedad de esta clase, estará disponible en la vista.
     */
    public $documentos;

    /**
     * Crea instancia y consulta documentos.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->documentos = Documento::where('user_id', $userId)
            ->with('funcionarios')
            ->get();
    }

    /**
     * Construye mensaje mediante vista seguimiento.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.seguimiento');
    }
}
