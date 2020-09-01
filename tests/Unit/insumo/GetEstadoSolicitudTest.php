<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\Insumo;
use CorporacionPeru\ProveedorInsumo;

class GetEstadoSolicitudTest extends TestCase
{
    /**
     * A basic unit test example.
     * @group insumo
     * @return void
     */
    public function testGetEstadoSolicitudInsumoIsAprobado()
    {
        $proveedorInsumo = ProveedorInsumo::create([
                            'insumo_id'=>'2',
                            'proveedor_id' => '2',
                            'precio_compra' => '100',
                            'cantidad' => '20',
                            'estado' => '3'
                        ]);
        $insumo = Insumo::join('insumos_proveedor', 'insumos_proveedor.insumo_id',
                            '=', 'insumos.id')
                            ->where('insumos_proveedor.id','=',$proveedorInsumo->id)
                            ->first();
        $this->assertEquals('Aprobado', $insumo->getEstadoSolicitud());
        $proveedorInsumo->delete();

    }

      /**
     * A basic unit test example.
     * @group insumo
     * @return void
     */
    public function testGetEstadoSolicitudInsumoSinSolicitud()
    {
        $proveedorInsumo = ProveedorInsumo::create([
                            'insumo_id'=>'2',
                            'proveedor_id' => '2',
                            'precio_compra' => '100',
                            'estado' => '1'
                        ]);
        $insumo = Insumo::join('insumos_proveedor', 'insumos_proveedor.insumo_id',
                            '=', 'insumos.id')
                            ->where('insumos_proveedor.id','=',$proveedorInsumo->id)
                            ->first();
        $this->assertEquals('Sin Solicitud', $insumo->getEstadoSolicitud());
        $proveedorInsumo->delete();
    }
}
