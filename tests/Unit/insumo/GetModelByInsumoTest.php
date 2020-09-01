<?php

namespace Tests\Unit\insumo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\Insumo;

class GetModelByInsumoTest extends TestCase
{
    const ATTRIBUTE_PIVOT = 'pivot.insumo_id';
    /**
     * A basic unit test example.
     * @group insumo
     * @return void
     */
    public function testGetProductsByInsumo()
    {
        $insumo = Insumo::findOrFail(1); //get insumo 1
        $productos = $insumo->productos()->get();
        if ($productos->count()>0) {
            $this->assertTrue($productos->contains( self::ATTRIBUTE_PIVOT, 1));
        }
       
    }

    /**
     * A basic unit test example.
     * @group insumo
     * @return void
     */
    public function testGetProveedoresByInsumo()
    {
        $insumo = Insumo::findOrFail(2); //get insumo 2
        $proveedores = $insumo->proveedores()->get();
        if ($proveedores->count()>0) {
            $this->assertTrue($proveedores->contains(self::ATTRIBUTE_PIVOT, 2));
        }
       
    }

    /**
     * A basic unit test example.
     * @group insumo
     * @return void
     */
    public function testGetPivotByInsumo()
    {
        $insumo = Insumo::findOrFail(2); //get insumo 1
        $productos = $insumo->proveedorInsumo()->get();
        if ($productos->count()>0) {
            $this->assertTrue($productos->contains('insumo_id',2));
        }
       
    }
}
