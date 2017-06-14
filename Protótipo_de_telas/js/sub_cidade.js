$(function(){
    $('#id_estado').change(function(){
    if( $(this).val() ) {
        $('#id_cidade').hide();
        $.getJSON('inc/sub_cidade.php?search=',{id_estado: $(this).val(), ajax: 'true'}, function(j){
            var options = '<option value="">Escolha a Cidade</option>';	
            for (var i = 0; i < j.length; i++) {
                options += '<option value="' + j[i].idcidade + '">' + j[i].nomecidade + '</option>';
            }	
            $('#id_cidade').html(options).show();
        });
    } 
    else {
        $('#id_cidade').html('<option value="">– Escolha a Cidade –</option>');
    }
    });
});


