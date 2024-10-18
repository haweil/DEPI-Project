<div>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800 animate-fade-in">
            {{ 'Create Admin' }}
        </h2>
    </x-slot>

    <x-slot name="title">
        {{ 'Create Admin' }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                <div class="p-6 text-gray-900">
                    <form wire:submit.prevent="save" class="space-y-4">
                        <div>
                            <x-input-label for="name" value="Name" />
                            <x-text-input wire:model.defer="name" id="name" class="block mt-1 w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-500 transition duration-150 ease-in-out" type="text" name="name" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="email" value="Email Address" />
                            <x-text-input wire:model.defer="email" id="email" class="block mt-1 w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-500 transition duration-150 ease-in-out" type="email" name="email" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password" value="Password" />
                            <x-text-input wire:model.defer="password" id="password" class="block mt-1 w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-500 transition duration-150 ease-in-out" type="password" name="password" required />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-primary-button class="transition duration-300 ease-in-out hover:bg-blue-600 bg-blue-500">
                                Save
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
