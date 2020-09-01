<?php

namespace Tests\Unit\pedido;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\Pedido;

class GetEstadoActualPedidoTest extends TestCase
{
    
    const ESTADO_EN_ESPERA    = ['estado_pedido' => 1 ];
    const ESTADO_APROBADO     = ['estado_pedido' => 2 ];
    const ESTADO_RECHAZADO    = ['estado_pedido' => 3 ];
    const ESTADO_ESPERANDO    = ['estado_pedido' => 4 ];
    const ESTADO_EN_EJECUCION = ['estado_pedido' => 5 ];
    const ESTADO_EN_TERMINADO = ['estado_pedido' => 6 ];

    const PEDIDO = ['cod_pedido' => 'FISI-PED-999999', 'nombre_cli' => 'nombre', 'direccion_cli' => 'dir', 'telefono_cli' => '123123123', 'ruc_cli' => '12312312312', 'fecha' => '2020-08-31', 'product' => ['1'], 'qty' => ['1'], 'rate_value' => ['100.00'], 'amount_value' => ['100.00'], 'monto_bruto' => '100.00', 'descuento' => null, 'monto_neto' => '118.00'];

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetEstadoPedidoIsEnEspera()
    {
        $pedido = Pedido::create(array_merge(self::PEDIDO, self::ESTADO_EN_ESPERA));
        $this->assertEquals('En espera', $pedido->getEstado());
        $pedido->delete();
    }

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetEstadoPedidoIsAprobado()
    {
        $pedido = Pedido::create(array_merge(self::PEDIDO, self::ESTADO_APROBADO));
        $this->assertEquals('Aprobado', $pedido->getEstado());
        $pedido->delete();
    }

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetEstadoPedidoIsRechazado()
    {
        $pedido = Pedido::create(array_merge(self::PEDIDO, self::ESTADO_RECHAZADO));
        $this->assertEquals('Rechazado', $pedido->getEstado());
        $pedido->delete();
    }

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetEstadoPedidoIsEsperando()
    {
        $pedido = Pedido::create(array_merge(self::PEDIDO, self::ESTADO_ESPERANDO));
        $this->assertEquals('Esperando insumos', $pedido->getEstado());
        $pedido->delete();
    }
    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetEstadoPedidoIsEnEjecucion()
    {
        $pedido = Pedido::create(array_merge(self::PEDIDO, self::ESTADO_EN_EJECUCION));
        $this->assertEquals('En Ejecución', $pedido->getEstado());
        $pedido->delete();
    }

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetEstadoPedidoIsEnTerminado()
    {
        $pedido = Pedido::create(array_merge(self::PEDIDO, self::ESTADO_EN_TERMINADO));
        $this->assertEquals('Terminado', $pedido->getEstado());
        $pedido->delete();
    }
}
