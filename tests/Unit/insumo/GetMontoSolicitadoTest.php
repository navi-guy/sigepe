<?php

namespace Tests\Unit\insumo;

use CorporacionPeru\Insumo;
use CorporacionPeru\ProveedorInsumo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetMontoSolicitadoTest extends TestCase
{
    /**
     * A basic unit test example.
     * @group insumo
     * @return void
     */
    public function testGetMontoSolicitado()
    {
        $proveedorInsumo = ProveedorInsumo::create([
            'insumo_id'=>'2',
            'proveedor_id' => '2',
            'precio_compra' => '100',
            'cantidad' => '25',
            'estado' => '1'
        ]);
        $insumo = Insumo::join('insumos_proveedor', 'insumos_proveedor.insumo_id', '=', 'insumos.id')
            ->where('insumos_proveedor.id','=',$proveedorInsumo->id)
            ->select('insumos_proveedor.cantidad as solicitado', 'insumos_proveedor.precio_compra')
            ->first();
        $this->assertEquals(2500, $insumo->getMontoSolicitud());
        $proveedorInsumo->delete();

    }
}
