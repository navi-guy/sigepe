<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\User;
use CorporacionPeru\Pedido;

class UserCanManteinPedidoTest extends TestCase
{

    const URI_PEDIDO = '/pedidos';
    const ALERT_STATUS = 'status';
    const NAME_PEDIDO = 'FISI-PED-000038';
    const LIST_PEDIDO = ['cod_pedido' => self::NAME_PEDIDO, 'nombre_cli' => 'nombre', 'direccion_cli' => 'dir', 'telefono_cli' => '123123123', 'ruc_cli' => '12312312312', 'fecha' => '2020-08-31', 'product' => ['1'], 'qty' => ['1'], 'rate_value' => ['100.00'], 'amount_value' => ['100.00'], 'monto_bruto' => '100.00', 'descuento' => null, 'monto_neto' => '118.00'];
    const LIST_PEDIDO_ID = ['id' => 12,'cod_pedido' => self::NAME_PEDIDO, 'nombre_cli' => 'nombre', 'direccion_cli' => 'dir', 'telefono_cli' => '123123123', 'ruc_cli' => '12312312312', 'fecha' => '2020-08-31', 'product' => ['1'], 'qty' => ['1'], 'rate_value' => ['100.00'], 'amount_value' => ['100.00'], 'monto_bruto' => '100.00', 'descuento' => null, 'monto_neto' => '118.00'];

    /**
     * A basic feature test  for show categorias.
     * @test
     * @return void
     */
    public function UserLoadsOrderList()
    {
        $this->actingAs(User::find(1));
        $response = $this->get(self::URI_PEDIDO);
        $response->assertSeeText('Tabla de pedidos');
        $response->assertViewHas('pedidos');
        $response->assertStatus(200); //success
        
    }

    /**
     * A basic feature test store productos.
     * @test
     * @return void
     */
    public function UserCanCreateOrder()
    {
        $this->actingAs(User::findOrFail(1));
        $response = $this->json('POST', self::URI_PEDIDO, self::LIST_PEDIDO);
        $response->assertSessionHas(self::ALERT_STATUS, 'Pedido creado con exito');
        $response->assertRedirect(self::URI_PEDIDO);
        $response->assertStatus(302);  //redirect to /categorias
    }

   /**
     * A basic feature test for edit.
     * @test
     * @return void
     */
    function UserCanEditOrder()
    {
        $user = User::findOrFail(1); // find specific user
        $this->actingAs($user);
        $response = $this->get(self::URI_PEDIDO . '/12/edit');
        /*$response->assertJsonFragment([
                'cod_pedido' => self::NAME_PEDIDO
            ]);*/
        $response->assertStatus(200);
    }  

    /**
     * A basic feature test for update category.
     * @test
     * @return void
     */
    function UserCanUpdateOrder()
    {
        $this->actingAs(User::findOrFail(1));
        $response = $this->json('PUT', self::URI_PEDIDO . '/12', self::LIST_PEDIDO_ID);
        $response->assertSessionHas(self::ALERT_STATUS, 'Pedido editado con exito');
        $response->assertRedirect(self::URI_PEDIDO);
        $response->assertStatus(302);  //redirect to /categorias
    }  

    /**
     * A basic feature test for delete category.
     * @test
     * @return void
     * @group failing
     */
    function UserCantDeleteOrder()
    {
        $this->actingAs(User::findOrFail(1));
        $response = $this->json('DELETE', self::URI_PEDIDO . '/12');
        $response->assertSessionHas(self::ALERT_STATUS,'Pedido eliminado con exito');
        $response->assertRedirect(self::URI_PEDIDO);
        $response->assertStatus(302);
    }  

}
