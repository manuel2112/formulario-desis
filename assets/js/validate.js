
$( document ).ready(function() {
    
    /************************************
    SELECCIONAR COMUNAS SEGÚN REGIÓN
    *************************************/
    $( "#regionSelect" ).change(function() {
        
        const id = $('#regionSelect').val();

        $.ajax({
            type: "POST",
            url: "sp/sp_comunas.php",
            data: { id },
            success:function(res){
                const response = JSON.parse(res);
                if( response.success ){
                    $("#cmbComuna").html(response.data)
                }else{
                    console.log(response.data);
                }
            }
        });

    });
    
    /************************************
    RECIBIR DATOS DESDE EL FORMULARIO PARA VALIDACIÓN
    *************************************/
    $( "#send" ).click(function() {
        
        const nombre    = $('#nombreInput').val();
        const alias     = $('#aliasInput').val();
        const rut       = $('#rutInput').val();
        const email     = $('#emailInput').val();
        const comuna    = $('#cmbComuna').val();
        const candidato = $('#candidatoSelect').val();
        
        if(validateForm(nombre, alias, rut, email, comuna, candidato)) return;
        const como = validateComo();
        validateRutExiste(nombre, alias, rut, email, comuna, candidato, como);

    });
    
    /************************************
    ENVIAR DATA VALIDADA A BBDD
    *************************************/
    function sendData(nombre, alias, rut, email, comuna, candidato, como){

        $.ajax({
            type: "POST",
            url: "sp/sp_voto.php",
            data: { nombre, alias, rut, email, comuna, candidato, como },
            success:function(res){
                const response = JSON.parse(res);
                if( response.success ){
                    Swal.fire({
                        title: 'VOTO',
                        text: response.msn,
                        icon: 'success',
                        confirmButtonColor: '#0275d8',
                        allowOutsideClick: false
                    });
                    $("#formulario").trigger('reset');
                }else{
                    console.log(response.data);
                }
            }
        });
    }
    
    /************************************
    VALIDACIÓN FORMULARIO
    *************************************/
    function validateForm(nombre, alias, rut, email, comuna, candidato){

        const boolNombre    = validateNombre(nombre);
        const boolAlias     = validateAlias(alias);
        const boolRut       = validateRut(rut);
        const boolEmail     = validateEmail(email);
        const boolComuna    = validateComuna(comuna);
        const boolCandidato = validateCandidato(candidato);
        const boolComo      = !validateComo();

        if( boolNombre || boolAlias || boolRut || boolEmail || boolComuna || boolCandidato || boolComo ){
            return true
        }else{
            return false
        }
    }
    
    /************************************
    COMPROBAR SO RUT EXISTE SINO ENVÍA DATA A BBDD
    *************************************/
    function validateRutExiste(nombre, alias, rut, email, comuna, candidato, como){

        $.ajax({
            type: "POST",
            url: "sp/sp_rut.php",
            data: { rut },
            success:function(res){
                const response = JSON.parse(res);
                if( response.success ){
                    if( response.existe ){
                        $("#rutInput").addClass("is-invalid");
                        $("#rutHelp").text('* RUT EXISTENTE');
                        return true;
                    }else{
                        $("#rutInput").removeClass("is-invalid");
                        $("#rutHelp").text('');
                        sendData(nombre, alias, rut, email, comuna, candidato, como);
                    }
                }else{
                    console.log(response.data);
                }
            }
        });
    }
    
    /************************************
    VALIDAR NOMBRE
    *************************************/
    function validateNombre(value){
        if( !value ){
            $("#nombreInput").addClass("is-invalid");
            $("#nombrelHelp").text('* NOMBRE Y APELLIDO OBLIGATORIO');
            return true;
        }else{
            $("#nombreInput").removeClass("is-invalid");
            $("#nombrelHelp").text('');
            return false;
        }
    }
    
    /************************************
    VALIDAR ALIAS
    *************************************/
    function validateAlias(value){
        if( !value ){
            $("#aliasInput").addClass("is-invalid");
            $("#aliasHelp").text('* ALIAS OBLIGATORIO');
            return true;
        }else{
            if(value.length < 6){
                $("#aliasInput").addClass("is-invalid");
                $("#aliasHelp").text('* ALIAS DEBE TENER MAYOR A 5 CARÁCTERES');
                return true;
            }else if( !(/\d/.test(value) && /[a-zA-Z]/.test(value)) ){
                $("#aliasInput").addClass("is-invalid");
                $("#aliasHelp").text('* ALIAS DEBE CONTAR CON LETRAS Y NÚMEROS');
                return true;
            }else{
                $("#aliasInput").removeClass("is-invalid");
                $("#aliasHelp").text('');
                return false;
            }
        }
    }
    
    /************************************
    VALIDAR RUT Y DAR FORMATO
    *************************************/
    function validateRut(value){
        if( !value ){
            $("#rutInput").addClass("is-invalid");
            $("#rutHelp").text('* RUT OBLIGATORIO');
            return true;
        }else if( !(Valida_Rut(value) )){
            $("#rutInput").addClass("is-invalid");
            $("#rutHelp").text('* RUT NO VÁLIDO');
            return true;
        }else{
            $("#rutInput").val(formateaRut(value));
            $("#rutInput").removeClass("is-invalid");
            $("#rutHelp").text('');
            return false;
        }
    }
    
    /************************************
    VALIDAR EMAIL
    *************************************/
    function validateEmail(value){
        
        if( !value ){
            $("#emailInput").addClass("is-invalid");
            $("#emailHelp").text('* EMAIL OBLIGATORIO');
            return true;
        }else if( !(validaEmail(value) )){
            $("#emailInput").addClass("is-invalid");
            $("#emailHelp").text('* EMAIL NO VÁLIDO');
            return true;
        }else{
            $("#emailInput").removeClass("is-invalid");
            $("#emailHelp").text('');
            return false;
        }
    }
    
    /************************************
    VALIDAR COMUNA SELECCIONADA
    *************************************/
    function validateComuna(value){
        if( !value ){
            $("#cmbComuna").addClass("is-invalid");
            $("#comunaHelp").text('* COMUNA OBLIGATORIO');
            return true;
        }else{
            $("#cmbComuna").removeClass("is-invalid");
            $("#comunaHelp").text('');
            return false;
        }
    }
    
    /************************************
    VALIDAR CANDIDATO SELECCIONADO
    *************************************/
    function validateCandidato(value){
        if( !value ){
            $("#candidatoSelect").addClass("is-invalid");
            $("#candidatoHelp").text('* CANDIDATO OBLIGATORIO');
            return true;
        }else{
            $("#candidatoSelect").removeClass("is-invalid");
            $("#candidatoHelp").text('');
            return false;
        }
    }
    
    /************************************
    VALIDAR COMO SE ENTERARON 
    *************************************/
    function validateComo(){

        let selected = new Array();

        $("input[type=checkbox]:checked").each(function () {
            selected.push(this.value);
        });

        if ( selected.length > 1 ) {
            $("#comoHelp").text('');
            return selected;
        }else{
            $("#comoHelp").text('* SELECCIONAR AL MENOS 2 OPCIONES');
            return false;
        }
    }

});