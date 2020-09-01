<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\User;
use CorporacionPeru\Categoria;

class UserCanMainteinCategoryTest extends TestCase
{

    const URI_CATEGORIA = '/categorias';
    const ALERT_STATUS = 'status';
    const NAME_CATEGORIA = 'nombre';

    /**
     * A basic feature test  for show categorias.
     * @test 
     * @group feature
     * @return void
     */
    public function UserLoadsCategoryList()
    {
        $this->actingAs(User::find(1));
        $response = $this->get(self::URI_CATEGORIA);
        $response->assertSeeText('Categorías de productos con los que trabaja la empresa');
        $response->assertViewHas('categorias');
        $response->assertStatus(200); //success
        
    }

    /**
     * A basic feature test store categoria.
     * @test
     * @return void
     */
    function UserCanCreateCategory()
    {
        $this->actingAs(User::findOrFail(1));
        $response = $this->json('POST', self::URI_CATEGORIA, [self::NAME_CATEGORIA => 'pruebita']);
        $response->assertSessionHas(self::ALERT_STATUS, 'Categoria registrada con exito');
        $response->assertRedirect(self::URI_CATEGORIA);
        $response->assertStatus(302);  //redirect to /categorias
    }


   /**
     * A basic feature test for edit.
     * @test
     * @return void
     */
    function UserCanEditCategory()
    {
        $user = User::findOrFail(1); // find specific user
        $this->actingAs($user);
        $response = $this->get(self::URI_CATEGORIA . '/1/edit');
        $response->assertJsonFragment([
                'id' => 1
            ]);
        $response->assertStatus(200);
    }  

    /**
     * A basic feature test for update category.
     * @test
     * @return void
     */
    function UserCanUpdateCategory()
    {
        $this->actingAs(User::findOrFail(1));
        $categoria = Categoria::latest()->first();
        $response = $this->json('PUT', self::URI_CATEGORIA . '/0', ['id' => $categoria->id, self::NAME_CATEGORIA => 'name actualizado']);

        $response->assertSessionHas(self::ALERT_STATUS, 'Categoria editada con exito');
        $response->assertRedirect(self::URI_CATEGORIA);
        $response->assertStatus(302);  //redirect to /categorias
    }  


    /**
     * A basic feature test for delete category.
     * @test
     * @return void
     */
    function UserCantDeleteCategoryWithProducts()
    {
        $this->actingAs(User::findOrFail(1));
        $response = $this->json('DELETE', self::URI_CATEGORIA . '/1');
        $response->assertSessionHas(self::ALERT_STATUS,'Categoría tiene un producto asociado');
        $response->assertRedirect(self::URI_CATEGORIA);
        $response->assertStatus(302);
    }  


        /**
     * A basic feature test for delete category.
     * @test
     * @return void
     */
    function UserCanDeleteCategory()
    {
        $this->actingAs(User::findOrFail(1));
        $categoria = Categoria::latest()->first();
        $response = $this->json('DELETE', self::URI_CATEGORIA  . '/' . $categoria->id);
        $response->assertSessionHas(self::ALERT_STATUS,'Categoría eliminada con exito');
        $response->assertRedirect(self::URI_CATEGORIA);
        $response->assertStatus(302);
    }  
}
