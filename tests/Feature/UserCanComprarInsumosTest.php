<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\User;
use CorporacionPeru\ProveedorInsumo;

class UserCanComprarInsumosTest extends TestCase
{
    const URI_COMPRA_INSUMOS  = '/comprar_insumos';
    const ALERT_STATUS        = 'status';
    const ID_INSUMO_PROVEEDOR = 'id_insumo_proveedor';

    /**
     * A basic feature test example.
     * @group feature
     * @return void
     */
    public function testUseCanSeeSolicitudesCompraInsumos()
    {
        $this->actingAs(User::findOrFail(1));
        $response = $this->get(self::URI_COMPRA_INSUMOS);
        $response->assertSeeText('Tabla de insumos solicitados');
        $response->assertViewHas('insumos');
        $response->assertStatus(200); //success
    }

    /**
     * A basic feature test example.
     * @group feature
     * @return void
     */
    public function testUseCanRejectSolicitud()
    {
        $this->actingAs(User::findOrFail(1));
        $proveedorInsumo = ProveedorInsumo::where('proveedor_id',1)->where('insumo_id',1)->first();
        $proveedorInsumo->cantidad += 20;
        $proveedorInsumo->estado = 2;
        $proveedorInsumo->save();
        // create solicitud
        $response = $this->json('POST', '/reject_insumo' , [self::ID_INSUMO_PROVEEDOR => $proveedorInsumo->id]);
        $response->assertSessionHas(self::ALERT_STATUS, 'Solicitud rechazada');
        $response->assertRedirect(self::URI_COMPRA_INSUMOS);
        $response->assertStatus(302);  //redirect to /compra_insumos
    }

    /**
     * A basic feature test example.
     * @group feature
     * @return void
     */
    public function testUseCanApproveSolicitud()
    {
        $this->actingAs(User::findOrFail(1));
        $proveedorInsumo = ProveedorInsumo::where('proveedor_id',1)->where('insumo_id',1)->first();
        $proveedorInsumo->cantidad += 20;
        $proveedorInsumo->estado = 2;
        $proveedorInsumo->save();
        // create solicitud
        $response = $this->json('POST', '/approve_insumo' , [self::ID_INSUMO_PROVEEDOR => $proveedorInsumo->id]);
        $response->assertSessionHas(self::ALERT_STATUS, 'Solicitud aceptada');
        $response->assertRedirect(self::URI_COMPRA_INSUMOS);
        $response->assertStatus(302);  //redirect to /compra_insumos
    }

    /**
     * A basic feature test example.
     * @group feature
     * @return void
     */
    public function testUseCanRegisterCompra()
    {
        $this->actingAs(User::findOrFail(1));
        $proveedorInsumo = ProveedorInsumo::where('proveedor_id',1)->where('insumo_id',1)->first();
        // create solicitud
        $response = $this->json('POST', '/registrar_compra', [self::ID_INSUMO_PROVEEDOR => $proveedorInsumo->id]);
        $response->assertSessionHas(self::ALERT_STATUS, 'Compra de insumos registrada');
        $response->assertRedirect(self::URI_COMPRA_INSUMOS);
        $response->assertStatus(302);  //redirect to /compra_insumos
    }
}
