<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Construtora;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ConstrutoraApiTest extends TestCase
{
    use WithoutMiddleware;
    
    public function setUp() : void {
        parent::setUp();
        $this->construtora = Construtora::find(1);
    }
    
    public function testEndpointConstrutora()
    {
        $response = $this->json('GET', '/api/construtora/1');
        $response->assertOk();
        $response->assertSee(json_encode($this->construtora->toArray()));
    }

    public function testEndpointConstrutoraUsuarios()
    {
        $response = $this->json('GET', '/api/construtora/1/usuarios');
        $response->assertOk();
        $response->assertSee(json_encode($this->construtora->usuarios->toArray()));
    }
}
