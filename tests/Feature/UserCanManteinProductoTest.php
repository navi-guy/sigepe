<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\User;
use CorporacionPeru\Producto;

class UserCanManteinProductoTest extends TestCase
{

    const URI_PRODUCTO = '/productos';
    const ALERT_STATUS = 'status';
    const NAME_PRODUCTO = 'nombre';
    const LIST_PRODUCTO = ['nombre' => 'pruebita', 'precio_unitario' => '5.90', 'material' => '1', 'categoria_id' => '1', 'unidad_medida' => '1', 'descripcion' => 'prueba', 'insumo' => ['1'], 'qty' => ['2']];

    /**
     * A basic feature test  for show productos.
     * @test
     * @group feature
     * @return void
     */
    public function UserLoadsProducList()
    {
        $this->actingAs(User::find(1));
        $response = $this->get(self::URI_PRODUCTO);
        $response->assertSeeText('Tabla de productos');
        $response->assertViewHas('productos');
        $response->assertStatus(200); //success
        
    }

    /**
     * A basic feature test store productos.
     * @test
     * @group feature
     * @return void
     */
    public function UserCanCreateProduct()
    {
        $this->actingAs(User::findOrFail(1));
        $response = $this->json('POST', self::URI_PRODUCTO, self::LIST_PRODUCTO);
        $response->assertSessionHas(self::ALERT_STATUS, 'Producto creado con exito');
        $response->assertRedirect(self::URI_PRODUCTO);
        $response->assertStatus(302);  //redirect to /productos
    }


   /**
     * A basic feature test for edit.
     * @test
     * @group feature
     * @return void
     */
    function UserCanEditProduct()
    {
        $user = User::findOrFail(1); // find specific user
        $this->actingAs($user);
        $response = $this->get(self::URI_PRODUCTO . '/1/edit');
        $response->assertSeeText('Vista previa');
        $response->assertViewHas(['insumos','producto','categorias','unidades_medida']);
        $response->assertStatus(200);
    }  

    /**
     * A basic feature test for update product.
     * @test
     * @group feature
     * @return void
     */
    function UserCanUpdateProduct()
    {
        $this->actingAs(User::findOrFail(1));
        $producto = Producto::latest()->first();
        $response = $this->json('PUT', self::URI_PRODUCTO.'/'.$producto->id,self::LIST_PRODUCTO);
        $response->assertSessionHas(self::ALERT_STATUS, 'Producto editado con exito');
        $response->assertRedirect(self::URI_PRODUCTO);
        $response->assertStatus(302);  //redirect to /productos
    }  

    /**
     * A basic feature test for update product.
     * @test
     * @group feature
     * @return void
     */
    function UserCanDeleteProduct()
    {
        $this->actingAs(User::findOrFail(1));
        $producto = Producto::latest()->first();
        $response = $this->json('DELETE', self::URI_PRODUCTO . '/' . $producto->id);
        $response->assertSessionHas(self::ALERT_STATUS, 'Producto eliminado con exito');
        $response->assertRedirect(self::URI_PRODUCTO);
        $response->assertStatus(302);  //redirect to /productos
    }  

}
