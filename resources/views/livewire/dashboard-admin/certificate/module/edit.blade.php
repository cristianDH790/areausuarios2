<div>
    <div>
        @if ($modules !== null)

            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                        Modules
                    </p>
                    <div class="navbar-item ">

                    </div>
                    <div class="navbar-item">
                        <div class="buttons">
                            <x-button color="green" secondary="800" primary="500" class="px-2.5 py-2 --jb-modal"
                                data-target="sample-modal-create" title="create"><i class="mdi mdi-plus-circle"></i>
                            </x-button>
                        </div>
                    </div>
                </header>

                <div class="card has-table">
                    <div class="card-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($modules->isEmpty())
                                    <div class="card empty">
                                        <div class="card-content">
                                            <div>
                                                <span class="icon large"><i
                                                        class="mdi mdi-emoticon-sad mdi-48px"></i></span>
                                            </div>
                                            <p>Nothing's here…</p>
                                        </div>
                                    </div>
                                @else
                                    <tr>
                                        <th>1</th>
                                        <td>Module 1</td>
                                        <td>Module 1</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @else
            <div>
                <div class="flex justify-around">
                    <span class="text-green-500">no existe ningun modulo para , agrega
                        un nuevo modulo -></span>
                    <x-button color="green" secondary="800" primary="500" class="px-2.5 py-2 --jb-modal"
                        data-target="sample-modal-create" title="create"><i class="mdi mdi-plus-circle"></i></x-button>
                </div>
            </div>
        @endif
    </div>
</div>
