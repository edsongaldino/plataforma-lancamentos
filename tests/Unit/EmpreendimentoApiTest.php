<?php

namespace Tests\Unit;

use Mockery as m;
use Tests\TestCase;
use App\Models\BackpackUser;
use App\Models\Empreendimento;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class EmpreendimentoApiTest extends TestCase
{
    use WithoutMiddleware;
    
    public function setUp() : void {
        parent::setUp();
        $this->empreendimento = Empreendimento::find(1);
    }

    public function testEndpointEmpreendimento()
    {
        $response = $this->json('GET', '/api/empreendimento/1');
        $response->assertStatus(200);
        $response->assertSee(json_encode($this->empreendimento->toArray()));
    }
    
    public function testEndpointEmpreendimentoTorres()
    {
        $response = $this->json('GET', '/api/empreendimento/1/torres');
        $response->assertOk();
        $response->assertSee(json_encode($this->empreendimento->torres->toArray()));
    }

    public function testEndpointEmpreendimentoQuadras()
    {
        $response = $this->json('GET', '/api/empreendimento/1/quadras');
        $response->assertOk();
        $response->assertSee(json_encode($this->empreendimento->quadras->toArray()));
    }

    public function testEndpointEmpreendimentoUnidades()
    {
        $response = $this->json('GET', '/api/empreendimento/1/unidades');
        $response->assertOk();
        $response->assertSee(json_encode($this->empreendimento->unidades->toArray()));
    }

    public function testEndpointEmpreendimentoFotos()
    {
        $response = $this->json('GET', '/api/empreendimento/1/fotos');
        $response->assertOk();
        $response->assertSee(json_encode($this->empreendimento->fotos->toArray()));
    }

    public function testEndpointEmpreendimentoItensLazer()
    {
        $response = $this->json('GET', '/api/empreendimento/1/itens-lazer');
        $response->assertOk();
        $response->assertSee(json_encode($this->empreendimento->itensLazer->toArray()));
    }

    public function testEndpointEmpreendimentoCaracteristicas()
    {
        $response = $this->json('GET', '/api/empreendimento/1/caracteristicas');
        $response->assertOk();
        $response->assertSee(json_encode($this->empreendimento->caracteristicas->toArray()));
    }

    public function testEndpointEmpreendimentoLeads()
    {
        $response = $this->json('GET', '/api/empreendimento/1/leads');
        $response->assertOk();
        $response->assertSee(json_encode($this->empreendimento->leads->toArray()));
    }    
}
