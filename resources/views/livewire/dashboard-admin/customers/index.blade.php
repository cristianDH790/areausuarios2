<div>
    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Administrative customers

            </p>
            <div class="navbar-item ">
                <div class="control flex items-center">
                    <x-input wire:model.live.debounce.500ms="search" type="text" class="border-gray-50"
                        placeholder="Search customers" />
                </div>
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
                            <th class="image-cell"></th>
                            <th>Full Name</th>
                            <th>Document</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($customers->isEmpty())
                            <div class="card empty">
                                <div class="card-content">
                                    <div>
                                        <span class="icon large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span>
                                    </div>
                                    <p>Nothing's here…</p>
                                </div>
                            </div>
                        @else
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td class="image-cell">
                                        <div class="image">
                                            <img src="{{ $customer->profile_photo_url }}" alt="User Image"
                                                class="rounded-full">
                                        </div>
                                    </td>
                                    <td data-label="Name">{{ $customer->name }} {{ $customer->last_name }}</td>
                                    <td data-label="Document">{{ $customer->document }}</td>
                                    <td data-label="Email">{{ $customer->email }}</td>
                                    <td data-label="Estatus">
                                        <div class="flex items-center ">
                                            <div
                                                class="h-4 w-4 rounded-full mr-2 bg-{{ $customer->status == 'active' ? 'green' : 'red' }}-500">
                                            </div>
                                            <p class="text-{{ $customer->status == 'active' ? 'green' : 'red' }}-500">

                                                {{ $customer->status }}</p>
                                        </div>
                                    </td>
                                    <td class="actions-cell">
                                        <div class="buttons right nowrap space-x-1">
                                            <x-button class=" --jb-modal px-1 py-1"
                                                data-target="sample-modal-view-{{ $customer->id }}" color="blue"
                                                secondary="800" primary="600" title="view">
                                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                                            </x-button>
                                            @if ($customer->status == 'active')
                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-status-{{ $customer->id }}"
                                                    color="yellow" secondary="800" primary="500" title="inactive">
                                                    <span class="icon"><i class="mdi mdi-cancel"></i></span>
                                                </x-button>
                                            @else
                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-status-{{ $customer->id }}"
                                                    color="yellow" secondary="800" primary="500" title="active">
                                                    <span class="icon"><i class="mdi mdi-check-circle"></i></span>
                                                </x-button>
                                            @endif

                                            <x-button class=" --jb-modal px-1 py-1"
                                                data-target="sample-modal-delete-{{ $customer->id }}" color="red"
                                                secondary="800" primary="600" title="delete">
                                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                            </x-button>
                                        </div>

                                    </td>
                                </tr>
                                <x-modal-table val="-status-{{ $customer->id }}">
                                    <x-slot name="title" class="space-x-2">
                                        <div
                                            class="h-4 w-4 rounded-full mr-2 bg-{{ $customer->status == 'active' ? 'green' : 'red' }}-500">
                                        </div>
                                        <p class="text-{{ $customer->status == 'active' ? 'green' : 'red' }}-500">

                                            {{ $customer->status }}</p>
                                    </x-slot>
                                    @if ($customer->status == 'active')
                                        Do you want to change from <span class="text-green-500">active </span> to <span
                                            class="text-red-500">inactive</span>?
                                    @else
                                        Do you want to change from <span class="text-red-500">inactive</span> to <span
                                            class="text-green-500">active </span>?
                                    @endif

                                    <x-slot name="buttons">
                                        <div class="space-x-2">
                                            <x-button color="gray" secondary="800" primary="600"
                                                class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                            <x-button color="blue" secondary="800" primary="500" class="px-4 py-2"
                                                wire:click="update_status({{ $customer->id }}, '{{ $customer->status }}')">Save</x-button>

                                        </div>
                                    </x-slot>
                                </x-modal-table>
                                <x-modal-table val="-delete-{{ $customer->id }}">
                                    <x-slot name="title">
                                        Delete Customer: {{ $customer->name }} {{ $customer->last_name }}
                                    </x-slot>
                                    Are you sure to delete this customer?
                                    <x-slot name="buttons">
                                        <div class="space-x-2">
                                            <x-button color="gray" secondary="800" primary="600"
                                                class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                            <x-button color="red" wire:click="delete    " secondary="800"
                                                primary="500" class="px-4 py-2">Delete</x-button>

                                        </div>
                                    </x-slot>
                                </x-modal-table>
                                <x-modal-table val="-create">
                                    <x-slot name="title">
                                        Create Customer
                                    </x-slot>
                                    <div class="space-y-4">
                                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                            <div class="w-full">
                                                <x-label>Name:</x-label>
                                                <x-input type="text" class="border-gray-50 w-full" required
                                                    placeholder="Name" wire:model="name" />
                                                @error('name')
                                                    <span class="text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="w-full">
                                                <x-label>Last Name:</x-label>
                                                <x-input type="text" class="border-gray-50 w-full" required
                                                    placeholder="Last Name" wire:model="last_name" />
                                                @error('last_name')
                                                    <span class="text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                            <div class="w-full">
                                                <x-label>Document:</x-label>
                                                <x-input type="text" class="border-gray-50 w-full" required
                                                    placeholder="Document" wire:model="document" />
                                                @error('document')
                                                    <span class="text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="w-full">
                                                <x-label>Phone:</x-label>
                                                <x-input type="number" class="border-gray-50 w-full"
                                                    placeholder="Phone" wire:model="phone" />
                                                @error('phone')
                                                    <span class="text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                            <div class="w-full">
                                                <x-label>Email:</x-label>
                                                <x-input type="email" class="border-gray-50 w-full" required
                                                    placeholder="Email" wire:model="email" />
                                                @error('email')
                                                    <span class="text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="w-full">
                                                <x-label>Password:</x-label>
                                                <x-input type="password"
                                                    class="{{ $errors->has('name') ? 'border-red-500' : 'border-gray-50' }} w-full"
                                                    required placeholder="password" wire:model="password" />
                                                @error('password')
                                                    <span class="text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <x-slot name="buttons">
                                        <div class="space-x-2">
                                            <x-button color="gray" secondary="800" primary="600"
                                                class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                            <x-button color="blue" wire:loading.attr="disabled" wire:click="save"
                                                secondary="800" primary="500" class="px-4 py-2">Save</x-button>
                                        </div>
                                    </x-slot>
                                </x-modal-table>
                                <x-modal-table val="-view-{{ $customer->id }}">
                                    <x-slot name="title">
                                        <div class="space-x-2 flex items-center justify-between  w-full">
                                            <div class="flex items-center">
                                                <div
                                                    class="h-4 w-4 rounded-full mr-2 bg-{{ $customer->status == 'active' ? 'green' : 'red' }}-500">
                                                </div>
                                                <p
                                                    class="text-{{ $customer->status == 'active' ? 'green' : 'red' }}-500">

                                                    {{ $customer->status }}</p>
                                            </div>
                                            <div>
                                                <span class="font-bold"> Code:</span>
                                                {{ $customer->code }}
                                            </div>
                                        </div>
                                    </x-slot>
                                    <div class="space-y-4">
                                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                            <div class="w-full">
                                                <x-label>Name:</x-label>
                                                <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                    disabled readonly value="{{ $customer->name }}" />



                                            </div>
                                            <div class="w-full">
                                                <x-label>Last Name:</x-label>

                                                <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                    disabled readonly value="{{ $customer->last_name }}" />

                                            </div>
                                        </div>
                                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                            <div class="w-full">
                                                <x-label>Document:</x-label>
                                                <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                    disabled readonly value="{{ $customer->document }}" />

                                            </div>
                                            <div class="w-full">
                                                <x-label>Phone:</x-label>
                                                <x-input type="text" class="border-gray-50  text-gray-500 w-full"
                                                    disabled readonly value="{{ $customer->phone }}" />

                                            </div>
                                        </div>
                                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                            <div class="w-full">
                                                <x-label>Email:</x-label>
                                                <x-input type="text" class="border-gray-50  text-gray-500 w-full"
                                                    disabled readonly value="{{ $customer->email }}" />

                                            </div>
                                            <div class="w-full">
                                                <x-label>Role:</x-label>
                                                <x-input type="text" class="border-gray-50  text-gray-500 w-full"
                                                    disabled readonly value="{{ $customer->roles->first()->name }}" />

                                            </div>
                                        </div>
                                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                            <div class="w-full">
                                                <x-label>F. Created:</x-label>
                                                <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                    disabled readonly value="{{ $customer->created_at }}" />

                                            </div>
                                            <div class="w-full">
                                                <x-label>F Updated:</x-label>
                                                <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                    disabled readonly value="{{ $customer->updated_at }}" />

                                            </div>
                                        </div>
                                    </div>
                                    <x-slot name="buttons">
                                        <div class="space-x-2 flex">
                                            <x-button color="gray" secondary="800" primary="600"
                                                class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                            <form action="{{ route('customer.edit', ['code' => $customer->code]) }}"
                                                method="GET">
                                                @csrf
                                                <x-button color="green" secondary="800" primary="600"
                                                    class="px-4 py-2">Ver Mas</x-button>
                                            </form>

                                        </div>
                                    </x-slot>
                                </x-modal-table>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="table-pagination">
                    @if ($customers->hasPages())
                        {{ $customers->links() }}
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
