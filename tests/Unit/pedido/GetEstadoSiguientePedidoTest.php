<?php

namespace Tests\Unit\pedido;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\Pedido;

class GetEstadoSiguientePedidoTest extends TestCase
{
    const APROBAR  = ['estado_pedido' => 1 ];
    const EJECUTAR = ['estado_pedido' => 2 ];
    const APROBAR2 = ['estado_pedido' => 4 ];
    const TERMINAR = ['estado_pedido' => 5 ];

    const PEDIDO = ['cod_pedido' => 'FISI-PED-999999', 'nombre_cli' => 'nombre', 'direccion_cli' => 'dir', 'telefono_cli' => '123123123', 'ruc_cli' => '12312312312', 'fecha' => '2020-08-31', 'product' => ['1'], 'qty' => ['1'], 'rate_value' => ['100.00'], 'amount_value' => ['100.00'], 'monto_bruto' => '100.00', 'descuento' => null, 'monto_neto' => '118.00'];

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetNextEstadoPedidoIsAprobar()
    {
        $pedido = Pedido::create(array_merge(self::PEDIDO, self::APROBAR));
        $this->assertEquals('Aprobar', $pedido->getSiguienteEstado());
        $pedido->delete();
    }

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetNextEstadoPedidoIsEjecutar()
    {
        $pedido = Pedido::create(array_merge(self::PEDIDO, self::EJECUTAR));
        $this->assertEquals('Ejecutar', $pedido->getSiguienteEstado());
        $pedido->delete();
    }

        /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetNextEstadoPedidoIsAprobar2()
    {
        $pedido = Pedido::create(array_merge(self::PEDIDO, self::APROBAR2));
        $this->assertEquals('Aprobar', $pedido->getSiguienteEstado());
        $pedido->delete();
    }

        /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetNextEstadoPedidoIsTerminar()
    {
        $pedido = Pedido::create(array_merge(self::PEDIDO, self::TERMINAR));
        $this->assertEquals('Terminar', $pedido->getSiguienteEstado());
        $pedido->delete();
    }
}
