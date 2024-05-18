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
                        <a class="px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700"
                            href="{{ route('customer.edit', ['code' => $user->code]) }}">cancel</a>
                        <x-button class="px-3 py-2" color="green" primary="600"
                            wire:click="update({{ $user->id }})">
                            Edit
                        </x-button>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <livewire:components.customer.services-customer :user="$user" />
        </div>
    </div>
    <div class="card">
        <livewire:components.customer.services-sales :user="$user" />
    </div>
</div>
