<div class="modal fade" id="modalAutorizacion" tabindex="-1" role="dialog" aria-labelledby="modalAutorizacionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAutorizacionLabel">Autorización de Tono</h5>
                
            </div>
            <div class="modal-body">
                <form id="formAutorizacion">
                    <input type="hidden" name="codigoLapdik" value="<?php echo $codigoLapdik; ?>">
                    <div class="form-group">
                        <label for="letra_Autorizada">Letra Autorizada:</label>
                        <input type="text" class="form-control" id="letraAutorizada" name="letraAutorizada" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_Autorizacion">Fecha Autorización:</label>
                        <input type="date" class="form-control" id="fechaAutorizacion" name="fechaAutorizacion" required>
                    </div>
                    <div class="form-group">
                        <label for="autorizo">Autorizo:</label>
                        <input type="text" class="form-control" id="autorizo" name="autorizo" required>
                    </div>
                    <div class="form-group">
                        <label for="comentarios">Comentarios:</label>
                        <textarea class="form-control" id="comentarios" name="comentarios"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="estatus">Estatus:</label>
                        <select class="form-control" id="estatus" name="estatus" required>
                            <option value="">Seleccione un estatus</option>
                            <option value="NO AUTORIZADO">NO AUTORIZADO</option>
                            <option value="AUTORIZADO">AUTORIZADO</option>
                            <option value="IGUALADO">IGUALADO</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="guardarAutorizacion">Guardar</button>
            </div>
        </div>
    </div>
</div>
