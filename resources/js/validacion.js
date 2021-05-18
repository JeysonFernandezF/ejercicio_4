let erroresTotales = 0;
    function validar(input,textoError,required,maximo){

        let errores = 0
        

        if(required){
            if(input.value.length < 1){
                input.classList.add("input-invalido");
                textoValidar(textoError,"El campo es requerido",1)
                errores++;
            }
        }

        if(input.value.length > maximo){
            input.classList.add("input-invalido");
            textoValidar(textoError,"El campo sobrepasa el limite",1)
            errores++;
        }else{
            errores = errores == 0 ? errores : errores--;
        }

        if(errores == 0){
            clases = input.className.split(" ");
            if (clases.indexOf("input-invalido") != -1) {
                input.classList.remove("input-invalido");
                textoValidar(textoError,"",2);
                
            }

            erroresTotales = erroresTotales == 0 ? erroresTotales : erroresTotales--;

        }else{
            erroresTotales++;
        }
        
    }

    function textoValidar(texto, mensaje, accion){

        clases = texto.className.split(" ");
        texto.innerHTML = mensaje;
        switch (accion){
            case 1:
                if (clases.indexOf("d-block") == -1) {
                    texto.classList.remove("d-none");
                    texto.classList.add("d-block");
                }
                break;
            case 2:
                if (clases.indexOf("d-none") == -1) {
                    texto.classList.remove("d-block");
                    texto.classList.add("d-none");
                }
                break;
            default:
                break;
        }
    }

    function botonHabilitado(){
        botonFormulario = document.getElementById('boton-formulario');

        if(erroresTotales == 0){
            botonFormulario.disabled = true;
        }else{
            botonFormulario.disabled = false;
        }
    }   