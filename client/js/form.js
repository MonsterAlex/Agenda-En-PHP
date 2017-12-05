$(function(){
    $('select').material_select();
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 50,
        format: 'yyyy-mm-dd'
    });


    $('#formulario').submit(function(event){
        event.preventDefault();
        //checkContrasena();
    })
})

/*function checkContrasena(){
    var contrasena = $('#Contrasena').val();
    var repContrasena = $('#contrasenaRepetida').val();

    if (contrasena===repContrasena) 
    {
        getDatos();

    }
    else 
    {
        alert('Las contraseñas no coinciden')
    }
}*/

function getDatos(){
    var form_data = new FormData();
    form_data.append('Nombre', $('#Nombre').val());
    form_data.append('Apellidos', $('#Apellidos').val());    
    form_data.append('Fecha_Nacimiento', $('#Fecha_Nacimiento').val());
    form_data.append('Correo', $('#Correo').val());
    form_data.append('Contrasena', $('#Contrasena').val());
    sendForm(form_data);
}

function sendForm(formData){
    $.ajax({
        url: '../server/create_user.php',
        dataType: "json",
        cache: false,
        processData: false,
        contentType: false,
        data: formData,
        type: 'POST',
        success: function(php_response){
            if (php_response.msg == "El registro a sido exitoso") 
            {
                window.location.href = 'index.html';
            }
            else 
            {
                alert(php_response.msg);
            }
        },
        error: function()
        {
            alert("error en la comunicación con el servidor");
        }
    })
}