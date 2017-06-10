(function(){
    ('$id_estado').change(function(){
        if( $(this).val() ){
            $('#id_cidade').hide();
            $.getJSON('inc/sub_categoria_cidade.php?search=',{idcidade: $(this).val(), ajax: 'true'}, function(j){
                var options = '<option value="">escolha a cidade</option>';
                for(var i=0 ; i<j.length ; i++){
                    options += '<option value="' + j[i].id + '">' + j[i].nomecidade + '</option>';
                }
                $('#id_cidade').html(options).show();
            });
        }
        else{
            $('id_cidade').html('option value="">- Escolha a cidade -</option>');            
        }
    });
});



