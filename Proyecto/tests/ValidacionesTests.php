<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../backend/validaciones.php';

final class ValidacionesTest extends TestCase
{
    // UsuarioValidator (6)
    public function test_nombre_usuario_valido_con_tres_caracteres(): void
    {
        $this->assertTrue(UsuarioValidator::nombreValido('Ana'));
    }

    public function test_nombre_usuario_invalido_vacio(): void
    {
        $this->assertFalse(UsuarioValidator::nombreValido('   '));
    }

    public function test_email_valido_formato_correcto(): void
    {
        $this->assertTrue(UsuarioValidator::emailValido('persona@nodou.app'));
    }

    public function test_email_invalido_sin_arroba(): void
    {
        $this->assertFalse(UsuarioValidator::emailValido('persona.nodou.app'));
    }

    public function test_password_valida_con_ocho_caracteres(): void
    {
        $this->assertTrue(UsuarioValidator::passwordValida('abc12345'));
    }

    public function test_password_invalida_muy_corta(): void
    {
        $this->assertFalse(UsuarioValidator::passwordValida('abc1234'));
    }

    // GastoValidator (8)
    public function test_titulo_gasto_valido(): void
    {
        $this->assertTrue(GastoValidator::tituloValido('Cena viernes'));
    }

    public function test_titulo_gasto_invalido_por_longitud(): void
    {
        $this->assertFalse(GastoValidator::tituloValido('ab'));
    }

    public function test_monto_gasto_valido_positivo(): void
    {
        $this->assertTrue(GastoValidator::montoValido(150.50));
    }

    public function test_monto_gasto_invalido_cero(): void
    {
        $this->assertFalse(GastoValidator::montoValido(0.0));
    }

    public function test_monto_gasto_invalido_negativo(): void
    {
        $this->assertFalse(GastoValidator::montoValido(-12.0));
    }

    public function test_metodo_division_valido_iguales(): void
    {
        $this->assertTrue(GastoValidator::metodoDivisionValido('iguales'));
    }

    public function test_metodo_division_invalido(): void
    {
        $this->assertFalse(GastoValidator::metodoDivisionValido('mitades'));
    }

    public function test_fecha_gasto_invalida_dia_fuera_de_rango(): void
    {
        $this->assertFalse(GastoValidator::fechaGastoValida('2026-02-30'));
    }

    // GastoFijoValidator (4)
    public function test_dia_vencimiento_valido_limite_inferior(): void
    {
        $this->assertTrue(GastoFijoValidator::diaVencimientoValido(1));
    }

    public function test_dia_vencimiento_valido_limite_superior(): void
    {
        $this->assertTrue(GastoFijoValidator::diaVencimientoValido(31));
    }

    public function test_dia_vencimiento_invalido_mayor_a_31(): void
    {
        $this->assertFalse(GastoFijoValidator::diaVencimientoValido(32));
    }

    public function test_estado_pago_invalido_fuera_de_binario(): void
    {
        $this->assertFalse(GastoFijoValidator::estadoPagoValido(2));
    }

    // ContactoValidator (4)
    public function test_nombre_contacto_valido_con_texto(): void
    {
        $this->assertTrue(ContactoValidator::nombreContactoValido('Laura'));
    }

    public function test_nombre_contacto_invalido_vacio(): void
    {
        $this->assertFalse(ContactoValidator::nombreContactoValido(''));
    }

    public function test_accion_contacto_valida_crear(): void
    {
        $this->assertTrue(ContactoValidator::accionValida('crear'));
    }

    public function test_accion_contacto_invalida(): void
    {
        $this->assertFalse(ContactoValidator::accionValida('editar'));
    }

    // DivisionValidator (8)
    public function test_participantes_validos_con_dos_personas(): void
    {
        $this->assertTrue(DivisionValidator::participantesValidos(['Yo', 'Carlos']));
    }

    public function test_participantes_invalidos_con_un_participante(): void
    {
        $this->assertFalse(DivisionValidator::participantesValidos(['Yo']));
    }

    public function test_porcentajes_validos_suman_cien(): void
    {
        $this->assertTrue(DivisionValidator::porcentajesValidos([40, 35, 25]));
    }

    public function test_porcentajes_invalidos_por_suma_mayor_a_cien(): void
    {
        $this->assertFalse(DivisionValidator::porcentajesValidos([60, 30, 20]));
    }

    public function test_porcentajes_invalidos_por_valor_negativo(): void
    {
        $this->assertFalse(DivisionValidator::porcentajesValidos([90, -10, 20]));
    }

    public function test_porcentajes_invalidos_array_vacio(): void
    {
        $this->assertFalse(DivisionValidator::porcentajesValidos([]));
    }

    public function test_validar_participantes_lanza_excepcion(): void
    {
        $this->expectException(InvalidArgumentException::class);
        DivisionValidator::validarParticipantes(['SoloYo']);
    }

    public function test_validar_porcentajes_lanza_excepcion(): void
    {
        $this->expectException(InvalidArgumentException::class);
        DivisionValidator::validarPorcentajes([70, 20]);
    }
}
