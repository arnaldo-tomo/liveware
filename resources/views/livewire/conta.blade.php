<div class="container">
 @include('livewire.modal')
    <h2>Livewore</h2>



    <div class="col-12">


        <div class="card">
            <div class="card-header">
                <div class="row">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="col-10">
                        LiveWire

                    </div>
                    <div class="col-2 end-100">
                        <button type="submit" style="float: right;" data-bs-toggle="modal" href="#exampleModalToggle"
                            class="btn btn-dark end"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#ID</th>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>acction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pessoa as $item)
                                <tr>
                                    <td scope="row">{{ $item->id }}</td>
                                    <td scope="row">{{ $item->nome }}</td>
                                    <td>{{ $item->idade }}</td>
                                    <td>

                                        <a class="btn btn-primary" wire:click="edit({{ $item->id }})"
                                            data-bs-toggle="modal" data-bs-target="#modalId"><i class="fa fa-eye"></i>
                                            Ver</a>

                                        <a class="btn btn-success" wire:click="edit({{ $item->id }})"
                                            data-bs-toggle="modal" data-bs-target="#modalId"><i class="fa fa-edit"></i>
                                            Editar</a>

                                        <a class="btn btn-danger" wire:click="delete({{ $item->id }})"><i
                                                class="fa fa-trash"></i> Deletar</a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted">
                <i class="fa fa-copyright" aria-hidden="true"></i> Arnaldo Tomo [] 13.janeiro .2023 <i
                    class="fa fa-calendar"></i>
            </div>

        </div>
    </div>

    <br>
    {{ $pessoa->links() }}








<script>
// Livewire.on('modalClose', (modalId) => {
    //     $(modalId).modal('hide')
})
// window.addEventListener('modalClose', event =>{
    //         $('#exampleModalToggle').modal('hide');

    //     });
</script>



</div>
