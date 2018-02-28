@if($cajaAbierta==0)
    <div class="alertaMensajeError">
        Debe abrir caja para este usuario antes de proseguir con las operaciones de entrada y salida monetaria.
    </div>
@endif
@if($cajaAbierta==2)
    <div class="alertaMensajeError">
        La caja del día de hoy para este usuario ya fue cerrado.
    </div>
@endif
@if($cajaAbierta==1)
    <form id="frmInsertarReciboCompraPago" action="/APPSIVAK/public/recibocomprapago/insertar" method="post" class="formulario labelMediano textAlignCenter">
        <div class="contenidoTop textAlignLeft">
            <input type="text" style="display: none;">
            <input type="hidden" id="txtCodigoReciboCompra" name="txtCodigoReciboCompra" value="{{{$tReciboCompra->codigoReciboCompra}}}">
            <label for="txtMonto">Monto a pagar</label>
            <br>
            <input type="text" id="txtMonto" name="txtMonto" placeholder="Obligatorio">
            <br>
            <label for="txtDescripcion">Descripción</label>
            <br>
            <textarea name="txtDescripcion" id="txtDescripcion" cols="38" rows="5"></textarea>
        </div>
        <div class="seccionBotones bordeArriba">
            <input type="button" value="Pagar letra" onclick="enviarFrmInsertarReciboCompraPago();">
        </div>
    </form>
    <script>
        function enviarFrmInsertarReciboCompraPago()
        {
            var mensajeGlobal='';

            mensajeGlobal+=(!valDosDecimales($('#txtMonto').val())?'El monto a pagar debe ser en soles<br>':'');

            if($('#txtMonto').val()<=0)
            {
                mensajeGlobal+='El monto a pagar debe ser mayor a 0.00<br>';
            }

            if(mensajeGlobal!='')
            {
                animacionAlertaMensajeGeneral(mensajeGlobal, 'red');
                return;
            }

            if(confirm('Realmente desea realizar el pago'))
            {       
                $('#frmInsertarReciboCompraPago').submit();
                return;
            }
            alert('Operación Cancelada');
        }
    </script>
@endif