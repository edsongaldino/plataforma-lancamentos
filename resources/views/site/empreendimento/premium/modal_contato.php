<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{ $empreendimento->nome }}</h5>
    <button type="button" class="close fechar-modal" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body detalhe-planta">

        
    </div>
    <div class="modal-footer">
    <a href="/unidade/{{ $unidade->id }}/formular-proposta"><button type="button" class="btn btn-primary formular-proposta"><i class="far fa-edit" aria-hidden="true"></i> Formular Proposta</button></a>
    </div>
</div>
</div>