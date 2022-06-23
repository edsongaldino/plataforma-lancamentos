@if($empreendimento->arquivos->where('tipo', 'Vídeo')->count() > 0)
<div class="row box-video-detalhes">
  <div class="container">
    <div class="row margin-top-30">
      <div class="col-xs-10">
        <h3 class="title-negative-margin">Vídeo do Empreendimento</h3>
        <div class="title-separator-primary"></div>
      </div>
    </div>
  </div>

  <div class="container gallery-filter-cont margin-top-60">
    <div class="row">
        <video src="{{ $empreendimento->arquivos->where('tipo', 'Vídeo')->first()->arquivo }}" controls></video>
    </div>
  </div>

</div>
@endif
