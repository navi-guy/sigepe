<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\Insumo;

class GetUnidadMedidaInsumodTest extends TestCase
{
    /**
     * A basic unit test example.
     * @group insumo
     * @return void
     */
    public function testGetUnidadMedidaInsumoIsUnidad()
    {
        $insumo = new Insumo;
        $insumo->unidad_medida = 0;
        $this->assertEquals('Unidad (u)', $insumo->getUnidadMedida());
    }

    /**
     * A basic unit test example.
     * @group insumo
     * @return void
     */
    public function testGetUnidadMedidaInsumoIsToneladas()
    {
        $insumo = new Insumo;
        $insumo->unidad_medida = 1;
        $this->assertEquals('Toneladas (Tn)', $insumo->getUnidadMedida());
    }

    /**
     * A basic unit test example.
     * @group insumo
     * @return void
     */
    public function testGetUnidadMedidaInsumoIsPulgadas()
    {
        $insumo = new Insumo;
        $insumo->unidad_medida = 2;
        $this->assertEquals('Pulgadas (µm)', $insumo->getUnidadMedida());
    }

    /**
     * A basic unit test example.
     * @group insumo
     * @return void
     */
    public function testGetUnidadMedidaInsumoIsMetros()
    {
        $insumo = new Insumo;
        $insumo->unidad_medida = 3;
        $this->assertEquals('Metros cúbicos (m3)', $insumo->getUnidadMedida());
    }
}
