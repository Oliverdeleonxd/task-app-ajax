
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editar Tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-task-form">
          <div class="form-group">
            <label for="edit-name">Nombre de la tarea</label>
            <input type="text" class="form-control" id="edit-name" placeholder="Nombre">
          </div>
          <div class="form-group">
            <label for="edit-description">Descripción</label>
            <textarea class="form-control" id="edit-description" rows="3" placeholder="Descripción"></textarea>
          </div>
          <input type="hidden" id="edit-task-id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="saveEdit" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>
