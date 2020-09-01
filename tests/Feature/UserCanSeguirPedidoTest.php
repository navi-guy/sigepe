<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\User;
use CorporacionPeru\Pedido;

class UserCanSeguirPedidoTest extends TestCase
{
    const URI_SEGUIR_PEDIDOS = '/seguirPedidos';
    const ALERT_STATUS = 'status';
    const NAME_PEDIDO = 'FISI-PED-999999';
    const PEDIDO = ['cod_pedido' => self::NAME_PEDIDO, 'nombre_cli' => 'nombre', 'direccion_cli' => 'dir', 'telefono_cli' => '123123123', 'ruc_cli' => '12312312312', 'fecha' => '2020-08-31', 'product' => ['1'], 'qty' => ['1'], 'rate_value' => ['100.00'], 'amount_value' => ['100.00'], 'monto_bruto' => '100.00', 'descuento' => null, 'monto_neto' => '118.00'];

    /**
     * A basic feature test example.
     * @group feature2
     * @return void
     */
    public function testUserCanSeeEvaluarPedidos(){
        $this->actingAs(User::findOrFail(1));
        $response = $this->get(self::URI_SEGUIR_PEDIDOS);
        $response->assertSeeText('Tabla de pedidos en seguimiento');
        $response->assertViewHas('pedidos');
        $response->assertStatus(200); //success
    }

    /**
     * A basic feature test example.
     * @group feature2
     * @return void
     */
    public function testUserCanApprovePedido(){
        $this->actingAs(User::findOrFail(1));
        $pedido = Pedido::create(self::PEDIDO);
        $response = $this->json('POST', '/aprobar_pedido', ['id_pedido_por_aprobar' => $pedido->id]);
        $response->assertSessionHas(self::ALERT_STATUS, 'Pedido aprobado');
        $response->assertRedirect(self::URI_SEGUIR_PEDIDOS);
        $response->assertStatus(302);  //redirect to /revisarPedidos
        $pedido->delete();
    }

    /**
     * A basic feature test example.
     * @group feature2
     * @return void
     */
    public function testUserCanExecutePedido(){
        $this->actingAs(User::findOrFail(1));
        $pedido = Pedido::create(self::PEDIDO);
        $response = $this->json('POST','/ejecutar_pedido',['id_pedido_ejecutar' => $pedido->id]);
        $response->assertSessionHas(self::ALERT_STATUS, 'Pedido ejecutado');
        $response->assertRedirect(self::URI_SEGUIR_PEDIDOS);
        $response->assertStatus(302);  //redirect to /revisarPedidos
        $pedido->delete();
    }

    /**
     * A basic feature test example.
     * @group feature2
     * @return void
     */
    public function testUserCanFinishPedido(){
        $this->actingAs(User::findOrFail(1));
        $pedido = Pedido::create(self::PEDIDO);
        $response = $this->json('POST','/terminar_pedido',['id_pedido' => $pedido->id]);
        $response->assertSessionHas(self::ALERT_STATUS, 'Pedido terminado');
        $response->assertRedirect(self::URI_SEGUIR_PEDIDOS);
        $response->assertStatus(302);  //redirect to /revisarPedidos
        $pedido->delete();
    }
}
