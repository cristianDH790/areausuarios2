<div>
    <div>
        <table>
            <thead>
                <div class="bg-gray-800 w-full text-white p-3 flex justify-between items-center">
                    <div>
                        <p class="font-bold text-base uppercase">Servicio: {{ $certificate->service->name }}</p>
                    </div>
                    <div>
                        <x-button color="green" secondary="800" primary="500" class="px-2.5 py-2 --jb-modal"
                            data-target="sample-modal-create" title="create"><i class="mdi mdi-view-module"> module</i>
                        </x-button>
                    </div>
                </div>

                <x-modal-table val="-create">
                    <x-slot name="title">
                        Create new module
                    </x-slot>
                    <div class="space-y-4">
                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                            <div class="w-full">
                                <x-label>Order:</x-label>
                                <x-input type="number" class="border-gray-50 w-full" required placeholder="Order"
                                    wire:model="order" />
                                @error('order')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                            <div class="w-full">
                                <x-label>Title:</x-label>
                                <x-input type="text" class="border-gray-50 w-full" required placeholder="Title"
                                    wire:model="title" />
                                @error('title')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <x-slot name="buttons">
                        <div class="space-x-2">
                            <x-button color="gray" secondary="800" primary="600"
                                class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                            <x-button color="green" wire:click="save_module" secondary="800" primary="500"
                                class="px-4 py-2">save</x-button>

                        </div>
                    </x-slot>
                </x-modal-table>
            </thead>
            <tbody>
                @if ($certificate->modules->isEmpty())
                    <div class="card empty">
                        <div class="card-content">
                            <div>
                                <span class="icon large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span>
                            </div>
                            <p>Nothing's here…</p>
                        </div>
                    </div>
                @else
                    @if ($certificate->modules)
                        @foreach ($modules->sortBy('order') as $module)
                            <!-- Módulo -->
                            <div
                                class="bg-gray-700
                                        text-white p-2 px-6 flex w-full items-center justify-between border">
                                <div class="flex space-x-10">
                                    <p class="text-base font-semibold">Nº {{ $module->order }}</p>
                                    <p class="text-base font-semibold uppercase">{{ $module->title }}</p>
                                </div>
                                <div>


                                    <x-button color="yellow" secondary="800" primary="500" class="px-2.5 py-2"
                                        href="{{ route('certificate.module.edit', ['id' => $certificate->id, 'module' => $module->id]) }}"
                                        title="Agregar video">
                                        <i class="mdi mdi-book-outline"></i>
                                    </x-button>
                                    <x-button color="green" secondary="800" primary="500"
                                        class="px-2.5 py-2 --jb-modal"
                                        data-target="sample-modal-create-topic-{{ $module->id }}" title="create tema">
                                        <i class="mdi mdi-book-outline"></i>
                                    </x-button>
                                    <x-button color="red" secondary="800" primary="500"
                                        class="px-2.5 py-2 --jb-modal"
                                        data-target="sample-modal-eliminar-module-{{ $module->id }}"
                                        title="Eliminar modulo"> <i class="mdi mdi-trash-can"></i>
                                    </x-button>
                                </div>
                            </div>
                            <x-modal-table val="-eliminar-module-{{ $module->id }}">
                                <x-slot name="title">
                                    Delete module {{ $module->id }}
                                </x-slot>
                                <div class="space-y-4">
                                    <p>estas seguro de borrar el modulo</p>
                                </div>

                                <x-slot name="buttons">
                                    <div class="space-x-2">
                                        <x-button color="gray" secondary="800" primary="600"
                                            class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                        <x-button color="red" wire:click="delete_module({{ $module->id }})"
                                            secondary="800" primary="500" class="px-4 py-2">delete</x-button>

                                    </div>
                                </x-slot>
                            </x-modal-table>

                            <x-modal-table val="-create-topic-{{ $module->id }}">
                                <x-slot name="title">
                                    Create new topic {{ $module->id }}
                                </x-slot>
                                <div class="space-y-4">
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Order:</x-label>
                                            <x-input type="number" class="border-gray-50 w-full" required
                                                placeholder="Order" wire:model="order_topic" />
                                            @error('order_topic')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Title:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Title" wire:model="title_topic" />
                                            @error('title_topic')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <x-slot name="buttons">
                                    <div class="space-x-2">
                                        <x-button color="gray" secondary="800" primary="600"
                                            class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                        <x-button color="green" wire:click="save_topic({{ $module->id }})"
                                            secondary="800" primary="500" class="px-4 py-2">save</x-button>

                                    </div>
                                </x-slot>
                            </x-modal-table>
                            <!-- Temas del módulo -->
                            @foreach ($module->topics->sortBy('order') as $topic)
                                <div
                                    class="bg-gray-700 text-white p-2 px-6 flex w-full items-center justify-between border">
                                    <div class="flex space-x-10">
                                        <p></p>
                                        <i class="mdi mdi-arrow-down-bold"></i>
                                        <p class="text-base font-semibold">{{ $topic->title }}</p>
                                    </div>
                                    <div>

                                        <x-button color="yellow" secondary="800" primary="500"
                                            class="px-2.5 py-2 --jb-modal"
                                            data-target="sample-modal-edit-topic-{{ $topic->id }}"
                                            title="editar tema">
                                            <i class="mdi mdi-file-outline"></i>
                                        </x-button>
                                        <x-button color="green" secondary="800" primary="500"
                                            class="px-2.5 py-2 --jb-modal"
                                            data-target="sample-modal-create-subtopic-{{ $topic->id }}"
                                            title="crear tema">
                                            <i class="mdi mdi-file-outline"></i>
                                        </x-button>
                                        <x-button color="red" secondary="800" primary="500"
                                            class="px-2.5 py-2 --jb-modal"
                                            data-target="sample-modal-eliminar-topic-{{ $topic->id }}"
                                            title="Eliminar modulo"> <i class="mdi mdi-trash-can"></i>
                                        </x-button>
                                    </div>
                                </div>
                                <x-modal-table val="-eliminar-topic-{{ $topic->id }}">
                                    <x-slot name="title">
                                        Delete topic {{ $topic->id }}
                                    </x-slot>
                                    <div class="space-y-4">
                                        <p>estas seguro de borrar el tema</p>
                                    </div>

                                    <x-slot name="buttons">
                                        <div class="space-x-2">
                                            <x-button color="gray" secondary="800" primary="600"
                                                class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                            <x-button color="red" wire:click="delete_topic({{ $topic->id }})"
                                                secondary="800" primary="500" class="px-4 py-2">delete</x-button>

                                        </div>
                                    </x-slot>
                                </x-modal-table>
                                <x-modal-table val="-edit-topic-{{ $topic->id }}">
                                    <x-slot name="title">
                                        Edit new topic {{ $topic->id }}
                                    </x-slot>
                                    <div class="space-y-4">
                                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                            <div class="w-full">
                                                <x-label>Order:</x-label>
                                                <x-input type="number" class="border-gray-50 w-full" required
                                                    placeholder="{{ $topic->order }}" wire:model="order_topic" />
                                                @error('order_topic')
                                                    <span class="text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                            <div class="w-full">
                                                <x-label>Title:</x-label>
                                                <x-input type="text" class="border-gray-50 w-full" required
                                                    placeholder="{{ $topic->title }}" wire:model="title_topic" />
                                                @error('title_topic')
                                                    <span class="text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <x-slot name="buttons">
                                        <div class="space-x-2">
                                            <x-button color="gray" secondary="800" primary="600"
                                                class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                            <x-button color="green" wire:click="edit_topic({{ $topic->id }})"
                                                secondary="800" primary="500" class="px-4 py-2">save</x-button>
                                        </div>
                                    </x-slot>
                                </x-modal-table>
                                <x-modal-table val="-create-subtopic-{{ $topic->id }}">
                                    <x-slot name="title">
                                        Create new subtopic {{ $topic->id }}
                                    </x-slot>
                                    <div class="space-y-4">
                                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                            <div class="w-full">
                                                <x-label>Order:</x-label>
                                                <x-input type="number" class="border-gray-50 w-full" required
                                                    placeholder="Order" wire:model="order_subtopic" />
                                                @error('order_subtopic')
                                                    <span class="text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                            <div class="w-full">
                                                <x-label>Title:</x-label>
                                                <x-input type="text" class="border-gray-50 w-full" required
                                                    placeholder="Title" wire:model="title_subtopic" />
                                                @error('title_subtopic')
                                                    <span class="text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <x-slot name="buttons">
                                        <div class="space-x-2">
                                            <x-button color="gray" secondary="800" primary="600"
                                                class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                            <x-button color="green" wire:click="save_subtopic({{ $topic->id }})"
                                                secondary="800" primary="500" class="px-4 py-2">save</x-button>
                                        </div>
                                    </x-slot>
                                </x-modal-table>


                                <!-- Subtemas del tema -->
                                @if ($topic->sub_topics->isNotEmpty())
                                    @foreach ($topic->sub_topics->sortBy('order') as $subtopic)
                                        <div
                                            class="bg-gray-700 text-white p-2 px-6 flex w-full items-center justify-between border">
                                            <div class="flex space-x-10">
                                                <p></p>
                                                <p></p>
                                                <i class="mdi mdi-arrow-right-bold"></i>
                                                <p class="text-base font-semibold">{{ $subtopic->title }}</p>
                                            </div>
                                            <div>
                                                <x-button color="yellow" secondary="800" primary="500"
                                                    class="px-2.5 py-2 --jb-modal"
                                                    data-target="sample-modal-edit-subtopic-{{ $subtopic->id }}"
                                                    title="Editar sub tema"> <i class="mdi mdi-file-outline"></i>
                                                </x-button>
                                                <x-button color="red" secondary="800" primary="500"
                                                    class="px-2.5 py-2 --jb-modal"
                                                    data-target="sample-modal-eliminar-subtopic-{{ $subtopic->id }}"
                                                    title="Eliminar modulo"> <i class="mdi mdi-trash-can"></i>
                                                </x-button>
                                            </div>
                                        </div>
                                        <x-modal-table val="-eliminar-subtopic-{{ $subtopic->id }}">
                                            <x-slot name="title">
                                                Delete topic {{ $subtopic->id }}
                                            </x-slot>
                                            <div class="space-y-4">
                                                <p>estas seguro de borrar el tema</p>
                                            </div>

                                            <x-slot name="buttons">
                                                <div class="space-x-2">
                                                    <x-button color="gray" secondary="800" primary="600"
                                                        class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                                    <x-button color="red"
                                                        wire:click="delete_subtopic({{ $subtopic->id }})"
                                                        secondary="800" primary="500"
                                                        class="px-4 py-2">delete</x-button>

                                                </div>
                                            </x-slot>
                                        </x-modal-table>
                                        <x-modal-table val="-edit-subtopic-{{ $subtopic->id }}">
                                            <x-slot name="title">
                                                Edit subtopic {{ $subtopic->id }}
                                            </x-slot>
                                            <div class="space-y-4">
                                                <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                    <div class="w-full">
                                                        <x-label>Order:</x-label>
                                                        <x-input type="number" class="border-gray-50 w-full" required
                                                            placeholder="{{ $subtopic->order }}"
                                                            wire:model="order_subtopic" />
                                                        @error('order_subtopic')
                                                            <span class="text-red-600">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                    <div class="w-full">
                                                        <x-label>Title:</x-label>
                                                        <x-input type="text" class="border-gray-50 w-full" required
                                                            placeholder="{{ $subtopic->title }}"
                                                            wire:model="title_subtopic" />
                                                        @error('title_subtopic')
                                                            <span class="text-red-600">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <x-slot name="buttons">
                                                <div class="space-x-2">
                                                    <x-button color="gray" secondary="800" primary="600"
                                                        class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                                    <x-button color="green"
                                                        wire:click="edit_subtopic({{ $subtopic->id }})"
                                                        secondary="800" primary="500"
                                                        class="px-4 py-2">save</x-button>
                                                </div>
                                            </x-slot>
                                        </x-modal-table>
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach

                    @endif
                @endif
            </tbody>
        </table>
    </div>
</div>
