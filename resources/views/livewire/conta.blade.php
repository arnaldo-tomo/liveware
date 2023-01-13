<div class="container">
    <h2>Livewore</h2>
    <div class="col-12">
        <div class="row">
            <form wire:submit.prevent="save">



                <div class="col-4">
                    <label for="">Nome</label>
                    <input type="text" wire:model='nome'class="form-control" placeholder="" aria-describedby="helpId">
                    @error('nome')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="">Idade</label>
                    <input type="number" wire:model='idade' class="form-control" placeholder=""
                        aria-describedby="helpId">
                    @error('idade')
                        <small id="helpId" class="text-muted text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="">Idade</label>
                    <br>
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
        <hr>
        <div class="table-responsive mb-2">
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
                                <a class="btn btn-primary "><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger "><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
