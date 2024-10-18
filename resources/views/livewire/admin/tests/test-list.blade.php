<div>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Test List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg transition duration-300 ease-in-out transform hover:shadow-2xl">
                <div class="p-6 text-gray-900">
                    <select class="p-3 w-full text-sm leading-5 rounded-md border border-gray-300 shadow-sm text-slate-600 focus:outline-none focus:ring focus:ring-indigo-300 focus:border-indigo-300 transition duration-150 ease-in-out"
                        wire:model="quiz_id">
                        <option value="0">All quizzes</option>
                        @foreach ($quizzes as $quiz)
                            <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                        @endforeach
                    </select>

                    <table class="mt-4 w-full table-view border border-gray-200 rounded-md overflow-hidden">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="w-16 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">ID</span>
                                </th>
                                <th class="px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">User</span>
                                </th>
                                <th class="px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Quiz</span>
                                </th>
                                <th class="px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Result</span>
                                </th>
                                <th class="px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">IP Address</span>
                                </th>
                                <th class="px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Time Spent</span>
                                </th>
                                <th class="w-40 px-6 py-3 text-left"></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($tests as $test)
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $test->id }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $test->user->name ?? 'Guest' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $test->quiz->title }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $test->result . '/' . $test->questions_count }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $test->ip_address }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ intval($test->time_spent / 60) }}:{{ gmdate('s', $test->time_spent) }} minutes
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        <a href="{{ route('results.show', $test) }}"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8"
                                        class="px-6 py-4 text-center leading-5 text-gray-900 whitespace-no-wrap">
                                        No tests were found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $tests->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
