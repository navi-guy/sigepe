<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\User;
use CorporacionPeru\Pedido;

class UserCanRevisarPedidoTest extends TestCase
{
    const URI_REVISAR_PEDIDOS = '/revisarPedidos';
    const ALERT_STATUS = 'status';
    const NAME_PEDIDO = 'FISI-PED-999999';
    const PEDIDO = ['cod_pedido' => self::NAME_PEDIDO, 'nombre_cli' => 'nombre', 'direccion_cli' => 'dir', 'telefono_cli' => '123123123', 'ruc_cli' => '12312312312', 'fecha' => '2020-08-31', 'product' => ['1'], 'qty' => ['1'], 'rate_value' => ['100.00'], 'amount_value' => ['100.00'], 'monto_bruto' => '100.00', 'descuento' => null, 'monto_neto' => '118.00'];

    /**
     * A basic feature test example.
     * @group feature
     * @return void
     */
    public function testUserCanSeeEvaluarPedidos(){
        $this->actingAs(User::findOrFail(1));
        $response = $this->get(self::URI_REVISAR_PEDIDOS);
        $response->assertSeeText('Tabla de productos por revisar');
        $response->assertViewHas('pedidos');
        $response->assertStatus(200); //success
    }

    /**
     * A basic feature test example.
     * @group feature
     * @return void
     */
    public function testUserCanApprovePedido(){
        $this->actingAs(User::findOrFail(1));
        $pedido = Pedido::create(self::PEDIDO);
        $response = $this->json('POST', '/approve_pedido', ['id_pedido_por_aprobar' => $pedido->id]);
        $response->assertSessionHas(self::ALERT_STATUS, 'Pedido aprobado');
        $response->assertRedirect(self::URI_REVISAR_PEDIDOS);
        $response->assertStatus(302);  //redirect to /revisarPedidos
        $pedido->delete();
    }

    /**
     * A basic feature test example.
     * @group feature
     * @return void
     */
    public function testUserCanRejectPedido(){
        $this->actingAs(User::findOrFail(1));
        $pedido = Pedido::create(self::PEDIDO);
        $response = $this->json('POST', '/reject_pedido', ['id_pedido_rechazar' => $pedido->id]);
        $response->assertSessionHas(self::ALERT_STATUS, 'Pedido rechazado');
        $response->assertRedirect(self::URI_REVISAR_PEDIDOS);
        $response->assertStatus(302);  //redirect to /revisarPedidos
        $pedido->delete();
    }

}
