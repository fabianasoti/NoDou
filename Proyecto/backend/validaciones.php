<?php

class UsuarioValidator
{
    public static function nombreValido(string $nombre): bool
    {
        return strlen(trim($nombre)) >= 3;
    }

    public static function emailValido(string $email): bool
    {
        return filter_var(trim($email), FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function passwordValida(string $password): bool
    {
        return strlen($password) >= 8;
    }
}

class GastoValidator
{
    private const METODOS_VALIDOS = ['iguales', 'porcentaje', 'articulos'];

    public static function tituloValido(string $titulo): bool
    {
        return strlen(trim($titulo)) >= 3;
    }

    public static function montoValido(float $monto): bool
    {
        return $monto > 0;
    }

    public static function metodoDivisionValido(string $metodo): bool
    {
        return in_array($metodo, self::METODOS_VALIDOS, true);
    }

    public static function fechaGastoValida(string $fecha): bool
    {
        $dt = DateTime::createFromFormat('Y-m-d', $fecha);

        return $dt !== false && $dt->format('Y-m-d') === $fecha;
    }
}

class GastoFijoValidator
{
    public static function diaVencimientoValido(int $dia): bool
    {
        return $dia >= 1 && $dia <= 31;
    }

    public static function estadoPagoValido(int $estado): bool
    {
        return in_array($estado, [0, 1], true);
    }
}

class ContactoValidator
{
    private const ACCIONES_VALIDAS = ['crear', 'eliminar', 'saldar_cobro', 'saldar_pago'];

    public static function nombreContactoValido(string $nombre): bool
    {
        return trim($nombre) !== '';
    }

    public static function accionValida(string $accion): bool
    {
        return in_array($accion, self::ACCIONES_VALIDAS, true);
    }
}

class DivisionValidator
{
    public static function participantesValidos(array $nombres): bool
    {
        return count($nombres) >= 2;
    }

    public static function validarParticipantes(array $nombres): void
    {
        if (!self::participantesValidos($nombres)) {
            throw new InvalidArgumentException('Se requieren al menos 2 participantes.');
        }
    }

    public static function porcentajesValidos(array $porcentajes): bool
    {
        if (count($porcentajes) === 0) {
            return false;
        }

        $suma = 0.0;

        foreach ($porcentajes as $porcentaje) {
            $valor = (float) $porcentaje;
            if ($valor < 0 || $valor > 100) {
                return false;
            }
            $suma += $valor;
        }

        return abs($suma - 100.0) < 0.01;
    }

    public static function validarPorcentajes(array $porcentajes): void
    {
        if (!self::porcentajesValidos($porcentajes)) {
            throw new InvalidArgumentException('Los porcentajes deben sumar 100 y estar entre 0 y 100.');
        }
    }
}