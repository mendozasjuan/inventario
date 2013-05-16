$(document).ready(function(){
    
    $('.formulario').submit(function(){
        if($('#login').val()== ""){
            alert("Debe Introducir un Usuario");
            $('#login').focus();
            return false
        }
        if($('#password').val() == ""){
            alert("Debe Introducir un Password");
            $('#password').focus();
            return false
        }
    });
});

