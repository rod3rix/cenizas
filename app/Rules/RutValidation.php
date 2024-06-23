<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RutValidation implements Rule
{
    public function passes($attribute, $value)
    {
        return $this->validateRut($value);
    }

    public function message()
    {
        return 'El RUT no es válido.';
    }

    private function validateRut($rut)
    {
        $rut = str_replace(['.', '-'], '', $rut);

        $numero = substr($rut, 0, -1);
        $dv = strtolower(substr($rut, -1));

        $suma = 0;
        $factor = 2;

        for ($i = strlen($numero) - 1; $i >= 0; $i--) {
            $suma += $factor * $numero[$i];
            $factor = ($factor == 7) ? 2 : $factor + 1;
        }

        $dvEsperado = 11 - ($suma % 11);
        $dvEsperado = ($dvEsperado == 11) ? 0 : (($dvEsperado == 10) ? 'k' : $dvEsperado);

        return $dv == $dvEsperado;
    }
}
