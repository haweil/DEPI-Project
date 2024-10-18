<div>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800 animate-fade-in">
            Quizzes
        </h2>
    </x-slot>

    <x-slot name="title">
        Quizzes
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('quiz.create') }}"
                            class="inline-flex items-center rounded-md border border-transparent bg-gradient-to-r from-blue-500 to-blue-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white shadow hover:bg-gradient-to-l transition duration-300 ease-in-out">
                            Create Quiz
                        </a>
                    </div>

                    <div class="mb-4 min-w-full overflow-hidden overflow-x-auto align-middle sm:rounded-md">
                        <table class="min-w-full border divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="w-16 bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">ID</span>
                                    </th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Title</span>
                                    </th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Slug</span>
                                    </th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Description</span>
                                    </th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Questions count</span>
                                    </th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Published</span>
                                    </th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Public</span>
                                    </th>
                                    <th class="w-40 bg-gray-50 px-6 py-3 text-left">
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @forelse($quizzes as $quiz)
                                    <tr class="bg-white hover:bg-gray-100 transition duration-300 ease-in-out">
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $quiz->id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $quiz->title }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $quiz->slug }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $quiz->description }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $quiz->questions_count }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled @checked($quiz->published)>
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled @checked($quiz->public)>
                                        </td>
                                        <td class="flex items-center space-x-2">
                                            <a href="{{ route('quiz.edit', $quiz) }}"
                                                class="inline-flex items-center rounded-md border border-transparent bg-gradient-to-r from-green-500 to-green-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gradient-to-l transition duration-300 ease-in-out">
                                                Edit
                                            </a>
                                            <button wire:click="delete({{ $quiz->id }})"
                                                class="rounded-md border border-transparent bg-red-200 px-4 py-2 text-xs uppercase text-red-500 hover:bg-red-300 hover:text-red-700 transition duration-300 ease-in-out">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8"
                                            class="px-6 py-4 text-center leading-5 text-gray-900 whitespace-no-wrap">
                                            No quizzes were found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $quizzes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
