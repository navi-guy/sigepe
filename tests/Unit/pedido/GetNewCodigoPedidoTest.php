<?php

namespace Tests\Unit\pedido;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\Pedido;

class GetNewCodigoPedidoTest extends TestCase
{
    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetNewCodigoPedidoOneDigit()
    {
        $pedido = new Pedido;
        $last_id = 1;
        $new_codigo = $pedido->getNewCodigo($last_id);
        $this->assertEquals('FISI-PED-000002',$new_codigo);
    }

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetNewCodigoPedidoThreeDigit()
    {
        $pedido = new Pedido;
        $last_id = 322;
        $new_codigo = $pedido->getNewCodigo($last_id);
        $this->assertEquals('FISI-PED-000323',$new_codigo);
    }

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testGetNewCodigoPedidoSixDigit()
    {
        $pedido = new Pedido;
        $last_id = 666666;
        $new_codigo = $pedido->getNewCodigo($last_id);
        $this->assertEquals('FISI-PED-666667',$new_codigo);
    }
}
