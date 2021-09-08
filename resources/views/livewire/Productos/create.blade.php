
<div wire:ignore.self class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content text-dark">
            <div class="modal-header bg-success">
              <h5 class="modal-title">Crear Producto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span wire:click.prevent="cancel()" aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <!-- form start -->
                <form>
                    <div class="row">
                        <div class="col-3 form-group">
                            <label class="label">Código de barras</label>
                            <input required autocomplete="off" wire:model="codigo_barras" class="form-control form-control-border border-width-2"
                                   type="text" placeholder="Código de barras">
                            @error('codigo_barras') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-6 form-group">
                            <label class="label">Descripción</label>
                            <input required autocomplete="off" wire:model="descripcion" class="form-control form-control-border border-width-2"
                                   type="text" placeholder="Descripción">
                            @error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-3 form-group">
                            <label class="label">Familia</label>
                            <select class="form-control form-control-border border-width-2" wire:model="familia">
                                <option>....</option>
                                @foreach($familias as $familia)
                                <option value="{{$familia->id}}">{{$familia->descripcion}}</option>
                                @endforeach
                            </select>
                            @error('familia') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group">
                            <label class="label">Precio de compra</label>
                            <input required autocomplete="off" wire:model="precio_compra" class="form-control form-control-border border-width-2"
                                   type="decimal(9,2)" placeholder="Precio de compra">
                        </div>
                        <div class="col-4 form-group">
                            <label class="label">Precio de venta</label>
                            <input required autocomplete="off" wire:model="precio_venta" class="form-control form-control-border border-width-2"
                                   type="decimal(9,2)" placeholder="Precio de venta">
                        </div>

                        <div class="col-4 form-group">
                            <label class="label">Itbis</label>
                            <select class="form-control form-control-border border-width-2" wire:model="itbis">
                                <option>...</option>
                                @foreach($impuestos as $impuesto)
                                <option value="{{$impuesto->id}}">{{$impuesto->descripcion}}</option>
                                @endforeach
                            </select>
                            @error('itbis') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="label">Almacen</label>
                            <select class="form-control form-control-border border-width-2" wire:model="almacen.1">
                                <option>...</option>
                                @foreach($almacenes as $almacen)
                                <option value="{{$almacen->id}}">{{$almacen->nombre}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col form-group">
                            <label class="label">Existencia</label>
                            <input required autocomplete="off" wire:model="existencia.1" class="form-control form-control-border border-width-2"
                                   type="decimal(9,2)" placeholder="Existencia">
                        </div>

                        <div class="col form-group">
                            <label class="label">Existencia Minima</label>
                            <input required autocomplete="off" wire:model="existencia_minima.1" class="form-control form-control-border border-width-2"
                                   type="decimal(9,2)" placeholder="Existencia Minima">
                        </div>
                        <div class="col-2 form-group">
                            <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                        </div>


                    </div>
                    @foreach($inputs as $key => $value)
                    <div class="row">
                        <div class="form-group">
                            <label class="label">Almacen</label>
                            <select class="form-control form-control-border border-width-2" wire:model="almacen.{{ $value }}">
                                <option>...</option>
                                @foreach($almacenes as $almacen)
                                <option value="{{$almacen->id}}">{{$almacen->nombre}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col form-group">
                            <label class="label">Existencia</label>
                            <input required autocomplete="off" wire:model="existencia.{{ $value }}" class="form-control form-control-border border-width-2"
                                   type="decimal(9,2)" placeholder="Existencia">
                        </div>

                        <div class="col form-group">
                            <label class="label">Existencia Minima</label>
                            <input required autocomplete="off" wire:model="existencia_minima.{{ $value }}" class="form-control form-control-border border-width-2"
                                   type="decimal(9,2)" placeholder="Existencia Minima">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                        </div>


                    </div>

                    @endforeach

                    <div class="col-3">
                        <div class="row border">
                            @if ($imagen1)
                            <img class="rounded mx-auto d-block" id="blah" src="{{ $imagen1->temporaryUrl() }}" alt="Imagen"  width="100" height="100"/>
                            @else
                            <img class="rounded mx-auto d-block" id="blah" src="/public/no-img.png" alt="Imagen"  width="100" height="100"/>
                            @endif
                            </div>
                            <div class="row">
                            <label class="btn btn-default form-control form-control-border border-width-2">
                                Buscar imagen <i class="fas fa-images"></i> <input wire:model="imagen1" class="" type="file"  accept="image/*" hidden>
                            </label>
                            @error('imagen1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                    </div>


                </form>




        </div>


    <div class="modal-footer">
        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary close-btn" data-dismiss="modal">Cancelar</button>
        <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
    </div>


    </div>
    </div>
    </div>


