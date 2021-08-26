<div wire:ignore.self class="modal fade" data-backdrop="static" id="exampleModalCenter{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalCenterTitle">Elimnar Almacen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Esta seguro de limanar el almacen <strong> {{$row->descripcion}} </strong>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="cancel() type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger" wire:click="destroy({{$row->id}})" data-dismiss="modal"><i class="fa fa-trash"></i> Eliminar </a>
            </div>
        </div>
    </div>
</div>
