@extends('site/empreendimento/premium/layout_interno')

@push('meta')
<title>INICIO</title>
@endpush

@section('content')

    <div class="conteudo">

        @if($garagens->count() < 1)
        <script type="text/javascript">
        $(window).load(function() {
            Swal.fire({
            title: 'Não existe vaga definida para esta unidade.',
            text: 'Por favor, selecione sua vaga antes de continuar',
            imageUrl: '{{ asset("assets/premium/img/img-vaga.png") }}',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',
            })
        });
        </script>
        @endif

        <div class="garagens">
            @if($garagens->count() > 0)
            <div class="titulo-vagas-proposta"><i class="fas fa-car" aria-hidden="true"></i> Vagas selecionadas</div>
            @foreach ($garagens as $garagem)
            <div class="garagem">
                <div class="icone"><i class="fas fa-car" aria-hidden="true"></i></div>
                <div class="nome">Vaga Nº{{ $garagem->vaga->nome }}<br/><span class="pavimento">{{ $garagem->vaga->pavimento->nome ?? 'Nome do pavimento' }}</span></div>
                @if($garagens->count() > ($unidade->caracteristicas->where('nome', 'vagas_garagem')->first()->pivot->valor ?? ''))
                <div class="valor">{{ converte_valor_real_semdecimal($tabela->valor_vaga_extra ?? '') }}</div>
                @else
                <div class="valor">-</div>
                @endif
                <div class="excluirVaga" data-id-vaga="{{ $garagem->vaga->id }}" data-nome-vaga="{{ $garagem->vaga->nome }}" ><i class="far fa-times-circle" aria-hidden="true"></i></div>
            </div>
            @endforeach
            @endif
        </div>

        <div class="mapa">
            <div class="btn-mapa-vagas" data-toggle="modal" data-target="#ModalGaragem">
                <img src="{{ asset('assets/premium/img/btn-mapa-vagas.png') }}" class="img-responsive" alt="Botão Mapa de Vagas">
            </div>
        </div>

        <div class="vagas">

            @foreach ($vagas as $vaga)
                <div class="vaga" data-idvaga="{{ $vaga->id }}" data-nomevaga="{{ $vaga->nome }}">
                    <span class="icone-vaga">
                    @if($vaga->tipo_vaga == 'Gaveta Coberta' || $vaga->tipo_vaga == 'Gaveta Descoberta')
                        <i class="fas fa-car" aria-hidden="true"></i>
                        <i class="fas fa-car" aria-hidden="true"></i><br/>
                    @else
                        <i class="fas fa-car" aria-hidden="true"></i><br/>
                    @endif
                    </span>
                    <span class="nome-vaga">
                    {{ $vaga->nome }}
                    </span>
                </div>
            @endforeach

        </div>

    </div>

    @include('site.empreendimento.premium.mobile.proposta.modal_unidade')
    @include('site.empreendimento.premium.mobile.proposta.modal_garagem')

    <!-- Modal -->
    <div class="modal fade" id="ModalVaga" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="/proposta/gravar-vaga" method="POST" name="FormGravarVaga" id="FormGravarVaga">
            @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
            <button type="button" class="close fechar-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" id="detalhe-vaga-modal">
                <input type="hidden" name="id" value="{{ $proposta->id }}">
                <div class="titulo-modal-vaga">Deseja incluir esta vaga na sua proposta?</div>
                <input type="hidden" name="idVaga">
                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
            <button type="submit" class="btn btn-primary">Sim</button>
            </div>
        </div>
        </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalRemoverVaga" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="/proposta/remover-vaga" method="POST" name="FormRemoverVaga" id="FormRemoverVaga">
            @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
            <button type="button" class="close fechar-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" id="detalhe-vaga-modal">
                <input type="hidden" name="proposta_id" value="{{ $proposta->id }}">
                <input type="hidden" name="vaga_id" value="">
                <div class="titulo-modal-vaga">Deseja REMOVER esta vaga na sua proposta?</div>                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
            <button type="submit" class="btn btn-primary">Sim</button>
            </div>
        </div>
        </div>
        </form>
    </div>

@endsection

@push('rodape')
<div class="rodape">
    <a href="/proposta/{{ $proposta->id }}/editar-proposta"><div class="btn-voltar"><i class="fa fa-reply-all" aria-hidden="true"></i></div></a>
    @if($garagens->count() < 1)
    <div class="btn-gravar-dados marcarVaga"><i class="fa fa-send" aria-hidden="true"></i> Próxima etapa</div>
    @else
    <a href="/proposta/{{ $proposta->id }}/conferir-proposta"><div class="btn-gravar-dados"><i class="fa fa-send" aria-hidden="true"></i> Próxima etapa</div></a>
    @endif
</div>
@endpush