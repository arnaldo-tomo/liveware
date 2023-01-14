
<div wire:ignore.self class="modal fade" id="modalId"  tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form wire:submit.prevent="update">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Update..</h5>
                    <button type="button" class="btn-close"  wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <label>id</label>
                        <input class="form-control" type="hidden" wire:model="selected_id">
                        <input class="form-control" type="text" class="form-control" wire:model.ignore="nome">
                    </div>
                    <div class="container-fluid">
                        <label>Idade</label>
                        <input type="text" class="form-control" wire:model.ignore="idade">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="exampleModalToggle" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Registar Produtos</h5>
                <button type="button" class="btn-close"  wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <form wire:submit.prevent="save">
                        <div class="col-12">
                            <label for="">Nome</label>
                            <input type="text" wire:model='nome'class="form-control " value="{{ old('nome') }}"
                                placeholder="Informe o nome" aria-describedby="helpId">
                            @error('nome')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="">Idade</label>
                            <input type="number" wire:model='idade' class="form-control" placeholder="informe a idade"
                                aria-describedby="helpId">
                            @error('idade')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary"  data-bs-dismiss="modal" wire:click="closeModal">Cancelar</button>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Regsiatar
                    Produto</button>
            </div>
        </div>
        </form>
    </div>
</div>



<!-- Modal Body-->
<div wire:ignore.self class="modal fade " id="delete{{ $item->id }}" tabindex="-2" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="modalTitleId">DELETDAE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {{ $item->nome }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="delete({{ $item->id }})">Save</button>
            </div>
        </div>
    </div>
</div>







@push('component-scripts')

<script>
      window.addEventListener('close-modal', event =>{
                $('#modalId').modal('hide');

            });
</script>
<script>
        (function($) { $(document).on('livewire:load', function() {

            Livewire.on('close-modal', (modalId) => {
        $(modalId).modal('hide')
})
})

        })(jQuery)
    </script>
@endpush
