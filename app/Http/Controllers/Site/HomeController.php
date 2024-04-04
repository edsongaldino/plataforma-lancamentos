<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Construtora;
use App\Models\Empreendimento;
use App\Models\Newsletter;
use App\Models\Publicacao;
use App\Http\Requests\NewsletterRequest;
use App\Models\ContatoComercial;
use App\Models\Subtipo;

class HomeController extends Controller
{
    private $viewHome;
    private $viewConstrutora;

    public function __construct()
    {
        $this->viewHome = isMobile() ? 'site.home.mobile.index' : 'site.home.desktop.index';
        $this->viewConstrutora = isMobile() ? 'site.construtora.mobile.index' : 'site.construtora.desktop.index';
    }

    public function index()
    {
        $this->data['construtoras'] = Construtora::where('status', 'Liberada')->get()->all();
        $this->data['apartamentos'] = Empreendimento::where('subtipo_id', 1)->where('status', 'Liberada')->get()->count();
        $this->data['condominios'] = Empreendimento::where('subtipo_id', 3)->where('status', 'Liberada')->get()->count();
        $this->data['salas'] = Empreendimento::where('subtipo_id', 2)->where('status', 'Liberada')->get()->count();
        $this->data['lotes'] = Empreendimento::where('subtipo_id', 4)->where('status', 'Liberada')->get()->count();
        $this->data['noticias'] = Publicacao::where('status', 'Liberada')->orderBy('data', 'DESC')->take(4)->get();

        return view($this->viewHome, $this->data);
    }

    public function construtora(Request $request, $construtora, $id)
    {
        $request->request->set('construtora_id', $id);
        $this->data = (new BuscaController())->getDadosBusca($request, [
            'url' => "/construtora/{$construtora}-{$id}.html"
        ]);
        $this->data['construtora'] = Construtora::find($id);

        return view($this->viewConstrutora, $this->data);
    }

    public function termosUso()
    {
        return view('site.termos_uso/index');
    }

    public function politicaPrivacidade()
    {
        return view('site.politica_privacidade.index');
    }

    public function PaginaComercial(){
        return view('site.pagina-comercial.index');
    }

    public function BuscaMapa(){
        $subtipos = Subtipo::all();
        $empreendimentos = Empreendimento::latest()->where('status', 'Liberada')->paginate(10);
        return view('site-2023.busca-mapa', compact('empreendimentos', 'subtipos'));
    }

    public function newsletter(NewsletterRequest $request)
    {
        $resultado = (new Newsletter())->salvar($request);

        $sucesso = 'false';

        if ($resultado) {
            $sucesso = 'true';
        }

        return response()->json([
            'sucesso' => $sucesso,
            'retorno' => 'E-mail salvo com sucesso'
        ]);
    }

    public function SiteMap()
	{
       $empreendimentos = Empreendimento::latest()->where('status', 'Liberada')->get()->all();

	  return response()->view('site.sitemap.index', [
	      'empreendimentos' => $empreendimentos,
	  ])->header('Content-Type', 'text/xml');
	}

    public function ContatoComercial(Request $request){

        $contato = (new ContatoComercial())->salvar($request);

        if ($contato) {
            return response()->json([
                'sucesso' => 'true',
                'retorno' => 'Recebemos seu contato e você receberá uma resposta no prazo máximo de 24 horas'
            ]);
        }

        return response()->json([
            'sucesso' => 'erro',
            'retorno' => 'Ocorreu um erro, tente novamente mais tarde'
        ]);

    }
}
