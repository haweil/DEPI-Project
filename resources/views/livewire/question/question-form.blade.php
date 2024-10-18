<div>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight animate-fade-in">
            {{ $editing ? 'Edit Question' : 'Create Question' }}
        </h2>
    </x-slot>

    <x-slot name="title">
        {{ $editing ? 'Edit Question ' . $question->id : 'Create Question' }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg transition duration-500 ease-in-out transform hover:shadow-2xl hover:scale-105">
                <div class="p-6 text-gray-900 animate-slide-in">
                    <form wire:submit.prevent="save">
                        <div class="animate-fade-in-up">
                            <x-input-label for="text" value="Question text" />
                            <x-textarea wire:model.defer="question.text" id="text" class="block mt-1 w-full"
                                type="text" name="text" required />
                            <x-input-error :messages="$errors->get('question.text')" class="mt-2" />
                        </div>

                        <div class="mt-4 animate-fade-in-up delay-100">
                            <x-input-label for="options" value="Question options" />
                            @foreach ($options as $index => $option)
                                <div class="flex mt-2 space-x-4">
                                    <x-text-input type="text" wire:model.defer="options.{{ $index }}.text"
                                        class="w-full border-gray-300 focus:ring-2 focus:ring-blue-400 transition ease-in-out duration-300"
                                        name="options_{{ $index }}" id="options_{{ $index }}" autocomplete="off" />

                                    <div class="flex items-center space-x-4">
                                        <input type="checkbox" class="mr-1 ml-4 rounded-lg focus:ring focus:ring-blue-300 transition-transform duration-300"
                                            wire:model.defer="options.{{ $index }}.correct">
                                        <label for="options_{{ $index }}_correct">Correct</label>

                                        <button wire:click="removeOption({{ $index }})" type="button"
                                            class="ml-4 rounded-md bg-red-200 px-4 py-2 text-xs uppercase text-red-500 hover:bg-red-300 transition ease-in-out duration-300 transform hover:scale-105">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('options.' . $index . '.text')" class="mt-2" />
                            @endforeach

                            <x-input-error :messages="$errors->get('options')" class="mt-2" />

                            <x-primary-button wire:click="addOption" type="button" class="mt-2">
                                Add
                            </x-primary-button>
                        </div>

                        <div class="mt-4 animate-fade-in-up delay-200">
                            <x-input-label for="code_snippet" value="Code snippet" />
                            <x-textarea wire:model.defer="question.code_snippet" id="code_snippet"
                                class="block mt-1 w-full border-gray-300 focus:ring-2 focus:ring-blue-400 transition ease-in-out duration-300"
                                type="text" name="code_snippet" />
                            <x-input-error :messages="$errors->get('question.code_snippet')" class="mt-2" />
                        </div>

                        <div class="mt-4 animate-fade-in-up delay-300">
                            <x-input-label for="answer_explanation" value="Answer explanation" />
                            <x-textarea wire:model.defer="question.answer_explanation" id="answer_explanation"
                                class="block mt-1 w-full border-gray-300 focus:ring-2 focus:ring-blue-400 transition ease-in-out duration-300"
                                type="text" name="answer_explanation" />
                            <x-input-error :messages="$errors->get('question.answer_explanation')" class="mt-2" />
                        </div>

                        <div class="mt-4 animate-fade-in-up delay-400">
                            <x-input-label for="more_info_link" value="More info link" />
                            <x-text-input wire:model.defer="question.more_info_link" id="more_info_link"
                                class="block mt-1 w-full border-gray-300 focus:ring-2 focus:ring-blue-400 transition ease-in-out duration-300"
                                type="text" name="more_info_link" />
                            <x-input-error :messages="$errors->get('question.more_info_link')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-primary-button class="hover:bg-blue-600 focus:ring focus:ring-blue-400 transition-transform duration-300 ease-in-out transform hover:scale-105">
                                Save
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
