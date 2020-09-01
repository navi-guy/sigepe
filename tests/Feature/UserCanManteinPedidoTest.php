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
    const NAME_PEDIDO = 'FISI-PED-999999';
    const LIST_PEDIDO = ['cod_pedido' => self::NAME_PEDIDO, 'nombre_cli' => 'nombre', 'direccion_cli' => 'dir', 'telefono_cli' => '123123123', 'ruc_cli' => '12312312312', 'fecha' => '2020-08-31', 'product' => ['1'], 'qty' => ['1'], 'rate_value' => ['100.00'], 'amount_value' => ['100.00'], 'monto_bruto' => '100.00', 'descuento' => null, 'monto_neto' => '118.00'];

    /**
     * A basic feature test  for show categorias.
     * @test
     * @group feature
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
     * @group feature
     * @return void
     */
    public function UserCanCreateOrder()
    {
        $this->actingAs(User::findOrFail(1));
        $response = $this->json('POST', self::URI_PEDIDO, self::LIST_PEDIDO);
        $response->assertSessionHas(self::ALERT_STATUS, 'Pedido creado con exito');
        $response->assertRedirect(self::URI_PEDIDO);
        $response->assertStatus(302);  //redirect to /pedidos
    }

   /**
     * A basic feature test for edit.
     * @test
     * @group feature
     * @return void
     */
    function UserCanEditOrder()
    {
        $user = User::findOrFail(1); // find specific user
        $this->actingAs($user);
        $response = $this->get(self::URI_PEDIDO . '/1/edit');
        $response->assertSeeText('Editar');
        $response->assertViewHas('pedido');
        $response->assertStatus(200); //success
    }

    /**
     * A basic feature test for update category.
     * @test
     * @group feature
     * @return void
     */
    function UserCanUpdateOrder()
    {
        $this->actingAs(User::findOrFail(1));
        $pedido = Pedido::where('cod_pedido','=', self::NAME_PEDIDO)->first();
        $response = $this->json('PUT', self::URI_PEDIDO.'/'.$pedido->id , self::LIST_PEDIDO);
        $response->assertSessionHas(self::ALERT_STATUS, 'Pedido editado con exito');
        $response->assertRedirect(self::URI_PEDIDO);
        $response->assertStatus(302);  //redirect to /categorias
    }

    /**
     * A basic feature test for delete category.
     * @test
     * @group feature
     * @return void
     */
    function UserCantDeleteOrder()
    {
               
        $this->actingAs(User::findOrFail(1));
        $pedido = Pedido::where('cod_pedido','=', self::NAME_PEDIDO)->first();
        $response = $this->json('DELETE', self::URI_PEDIDO . '/' . $pedido->id);
        $response->assertSessionHas(self::ALERT_STATUS,'Pedido eliminado con exito');
        $response->assertRedirect(self::URI_PEDIDO);
        $response->assertStatus(302);
    }

}
