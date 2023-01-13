<div class="container">
    <h2>Livewore</h2>
    <div class="col-12">
        <div class="modal fade" wire:ignore.self id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Registar Produtos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form wire:submit.prevent="save">

                                <div class="col-12">
                                    <label for="">Nome</label>
                                    <input type="text" wire:model='nome'class="form-control" value="{{ old('nome') }}"
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
                            <button class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Regsiatar Produto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        LiveWire
                    </div>
                    <div class="col-2 end-100">
                        <button type="submit" data-bs-toggle="modal" href="#exampleModalToggle"
                            class="btn btn-dark end"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>acction</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($pessoa as $item)
                                <tr class="table-primary">
                                    <td scope="row">{{ $item->nome }}</td>
                                    <td>{{ $item->idade }}</td>
                                    <td>
                                        <a class="btn btn-primary "><i class="fa fa-edit"></i> Editar</a>
                                        <a class="btn btn-danger" wire:click="delete({{ $item->id }})"><i
                                                class="fa fa-trash"></i> Deletar</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                    {{-- {{ $pessoa->links() }} --}}
                </div>
            </div>
            <div class="card-footer text-muted">
               <i class="fa fa-copyright" aria-hidden="true"></i>  Arnaldo Tomo [] 13.janeiro .2023 <i class="fa fa-calendar"></i>
            </div>
        </div>

    </div>
