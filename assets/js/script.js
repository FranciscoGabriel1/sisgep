
function fn_excluir(){
    $('.form_excluir').submit(function (){
        return confirm ("Você tem certeza disso?");
    });
}

function load_modal_publicacao(numeroprocesso,descricao,id){
    $('#text_numeroprocesso').val(numeroprocesso);
    $('#text_descricao').val(descricao);
    $('#id_publicacao').val(id);
}