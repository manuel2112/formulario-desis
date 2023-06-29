function Valida_Rut( Objeto )
{
	var tmpstr = "";
	var intlargo = Objeto

	if (intlargo.length> 0)
	{
		crut = Objeto
		largo = crut.length;

		if ( largo <2 )
		{
			return false;
		}

		for ( i=0; i <crut.length ; i++ )

		if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
		{
			tmpstr = tmpstr + crut.charAt(i);
		}

		rut = tmpstr;
		crut=tmpstr;
		largo = crut.length;
        

		if ( largo> 2 )
			rut = crut.substring(0, largo - 1);
		else
			rut = crut.charAt(0); 

		dv = crut.charAt(largo-1); 

		if ( rut == null || dv == null )
		return 0; 

		var dvr = '0';
		suma = 0;
		mul  = 2; 

		for (i= rut.length-1 ; i>= 0; i--)
		{
			suma = suma + rut.charAt(i) * mul;
			if (mul == 7)
				mul = 2;
			else
				mul++;
		}
        

		res = suma % 11;

		if (res==1)
			dvr = 'k';
		else if (res==0)
			dvr = '0';
		else
		{
			dvi = 11-res;
			dvr = dvi + "";
		}

		if ( dvr != dv.toLowerCase() )
		{
			return false;
		}

		return true;

	}

}



function formateaRut(rut) {

    var actual = rut.replace(/^0+/, "");
    if (actual != '' && actual.length > 1) {
        var sinPuntos = actual.replace(/\./g, "");
        var actualLimpio = sinPuntos.replace(/-/g, "");
        var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
        var rutPuntos = "";
        var i = 0;
        var j = 1;
        for (i = inicio.length - 1; i >= 0; i--) {
            var letra = inicio.charAt(i);
            rutPuntos = letra + rutPuntos;
            if (j % 3 == 0 && j <= inicio.length - 1) {
                rutPuntos = "." + rutPuntos;
            }
            j++;
        }
        var dv = actualLimpio.substring(actualLimpio.length - 1);
        rutPuntos = rutPuntos + "-" + dv;
    }
    return rutPuntos;
}

function validaEmail(valor)
{
	re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/
	if(!re.exec(valor)){
		return false;
	}
	else return true
}