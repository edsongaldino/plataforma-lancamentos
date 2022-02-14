$(function () {
  $("#salvar-dados-usuario").on('click', function () {

    var formData = new FormData($("#dados-usuario")[0]);

    ajaxRequestUpload({
      metodo: 'POST',
      url: '/admin/salvar-perfil-usuario',
      dados: formData,
      reload: true,
      feedback: true,
      mensagemSucesso: 'Dados atualizados com sucesso',
      mensagemErro: 'Erro ao atualizar dados, tente novamente mais tarde',
    });
  });
});