<?php

namespace Tests\Unit\producto;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\Producto;

class GetUnidadMedidaProductoTest extends TestCase
{
    const PULGADAS = ['unidad_medida' => 2];
    const METROS   = ['unidad_medida' => 3];
    const PRODUCTO = ['nombre' => 'pruebita', 'precio_unitario' => '5.90', 'material' => '1', 'categoria_id' => '1', 'descripcion' => 'prueba', 'insumo' => ['1'], 'qty' => ['2']];

    /**
     * A basic unit test example.
     * @group failing4
     * @return void
     */
    public function testGetUnidadMedidaProductoIsPulgadas()
    {
        
        $producto = Producto::create(array_merge(self::PULGADAS, self::PRODUCTO));
        $this->assertEquals('Pulgadas (µm)', $producto->getUnidadMedida());
        $producto->delete();
    }

    /**
     * A basic unit test example.
     * @group failing4
     * @return void
     */
    public function testGetUnidadMedidaProductoIsMetros()
    {
        $producto = Producto::create(array_merge(self::METROS, self::PRODUCTO));
        $this->assertEquals('Metros cúbicos (m3)', $producto->getUnidadMedida());
        $producto->delete();
    }
}
