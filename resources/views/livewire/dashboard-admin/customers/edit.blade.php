<div>
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    Edit Profile
                </p>
            </header>
            <div class="card-content">

                <div class="field  md:flex md:space-x-2">
                    <div class="w-full">
                        <x-label :value="__('Name')" />
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <x-input id="name" class="input" type="text" name="name"
                                        wire:model="name" />
                                </div>
                                @error('name')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <x-label :value="__('Last Name')" />
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <x-input id="name" class="input" type="text" name="name"
                                        wire:model="last_name" />
                                </div>
                                @error('last_name')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field  md:flex md:space-x-2">
                    <div class="w-full">
                        <x-label :value="__('Document')" />
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <x-input id="document" class="input border-gray-100" type="text" name="document"
                                        wire:model="document" />
                                </div>
                                @error('document')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <x-label :value="__('Email')" />
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <x-input id="email" class="input border-gray-100" type="email" name="email"
                                        wire:model="email" />
                                </div>
                                @error('email')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field  md:flex md:space-x-2">
                    <div class="w-full">
                        <x-label :value="__('Phone')" />
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <x-input id="phone" class="input border-gray-100" type="number" name="phone"
                                        wire:model="phone" />
                                    @error('phone')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <x-label :value="__('Password')" />
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <x-input id="password" class="input border-gray-100" type="password"
                                        name="password" wire:model="password" placeholder="password" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="field  md:flex md:space-x-2">
                    <div class="w-full">
                        <x-label :value="__('F. Created')" />
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <x-input type="text" class="border-gray-100 text-gray-500 w-full" disabled
                                        readonly value="{{ $user->created_at }}" />

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <x-label :value="__('F. Updated')" />
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <x-input type="text" class="border-gray-100 text-gray-500 w-full" disabled
                                        readonly value="{{ $user->updated_at }}" />

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="field">
                    <div class="control">
                        <x-button class="px-3 py-2" color="gray" wire:click="refresh">
                            Cancel
                        </x-button>
                        <x-button class="px-3 py-2" color="green" primary="600"
                            wire:click="update({{ $user->id }})">
                            Edit
                        </x-button>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-library-books"></i></span>
                    Services
                </p>
                <div class="navbar-item ">
                    <div class="control flex items-center">
                        <x-input wire:model.live.debounce.500ms="search" type="text" class="border-gray-50"
                            placeholder="Search customers" />
                    </div>
                </div>
            </header>
            <div class="card-content">
                <div class="card has-table">
                    <div class="card-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>course</td>
                                    <td>introduction to the world of python</td>
                                    <th class="flex justify-end">
                                        <x-button class="px-1    py-1" color="green" primary="600">
                                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                        </x-button>
                                    </th>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>diplomat</td>
                                    <td>knowing the large intestine</td>
                                    <th class="flex justify-end">
                                        <x-button class="px-1    py-1" color="green" primary="600">
                                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                        </x-button>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <div class="table-pagination">
                            @if ($customers->hasPages())
                                {{ $customers->links() }}
                            @endif
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-finance"></i></span>
                Sales
            </p>
            <div class="navbar-item ">
                <div class="control flex items-center">
                    <x-input wire:model.live.debounce.500ms="search" type="text" class="border-gray-50"
                        placeholder="Search customers" />
                </div>
            </div>
        </header>
        <div class="card-content">
            <div class="card has-table">
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>course</td>
                                <td>introduction to the world of python</td>
                                <th class="flex justify-end">
                                    <x-button class="px-1    py-1" color="green" primary="600">
                                        <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                    </x-button>
                                </th>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>diplomat</td>
                                <td>knowing the large intestine</td>
                                <th class="flex justify-end">
                                    <x-button class="px-1    py-1" color="green" primary="600">
                                        <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                    </x-button>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <div class="table-pagination">
                            @if ($customers->hasPages())
                                {{ $customers->links() }}
                            @endif
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
