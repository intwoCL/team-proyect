<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Data interna para creación de contenido interactivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Código internos
          <li><strong>[:name]</strong>: Nombre del usuario.  (ejemplo: {{ current_user()->present()->getFullName() }})</li>
          <li><strong>[:email]</strong>: Correo electronico.</li>
          <li><strong>[:child]</strong>: Nombre del hijo.</li>
          <li><strong>[:today]</strong>: Fecha de hoy dd/mm/yyyy.</li>
          <li><strong>[:time]</strong>: La hora de hoy hora:min.</li>

        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
        {{-- <button type="submit" class="btn btn-primary btn-sm">Guardar</button> --}}
      </div>
    </div>
  </div>
</div>
