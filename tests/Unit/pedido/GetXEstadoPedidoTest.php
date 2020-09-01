<?php

namespace Tests\Unit\pedido;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\Pedido;

class GetXEstadoPedidoTest extends TestCase
{
    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testPedidoIsAprobed()
    {
        $pedido = new Pedido;
        $pedido->estado_pedido = 2;
        $this->assertTrue($pedido->isAprobed());
    }

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testPedidoIsRejected()
    {
        $pedido = new Pedido;
        $pedido->estado_pedido = 3;
        $this->assertTrue($pedido->isRejected());
    }

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testPedidoIsEsperaInsumos()
    {
        $pedido = new Pedido;
        $pedido->estado_pedido = 4;
        $this->assertTrue($pedido->isEsperaInsumos());
    }

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testPedidoIsEjecucion()
    {
        $pedido = new Pedido;
        $pedido->estado_pedido = 5;
        $this->assertTrue($pedido->isEjecucion());
    }

    /**
     * A basic unit test example.
     * @group pedido
     * @return void
     */
    public function testPedidoIsTerminado()
    {
        $pedido = new Pedido;
        $pedido->estado_pedido = 6;
        $this->assertTrue($pedido->isTerminado());
    }
}
