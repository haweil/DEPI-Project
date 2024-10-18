<div>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800">
            My Results
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg transition duration-300 ease-in-out transform hover:shadow-2xl">
                <div class="p-6 text-gray-900">
                    <div class="mb-4 min-w-full overflow-hidden overflow-x-auto align-middle sm:rounded-md">
                        <table class="min-w-full table-auto border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="w-16 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">#</span>
                                    </th>
                                    <th class="px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Quiz Title</span>
                                    </th>
                                    <th class="px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Description</span>
                                    </th>
                                    <th class="px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Result</span>
                                    </th>
                                    <th class="px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Time Spent</span>
                                    </th>
                                    <th class="px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Date Taken</span>
                                    </th>
                                    <th class="w-40 px-6 py-3 text-left"></th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($tests as $test)
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $test->quiz->title }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $test->quiz->description }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $test->result . '/' . $test->quiz->questions_count }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ sprintf('%.2f', $test->time_spent / 60) }} minutes
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $test->created_at->format('d/m/Y h:i A') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('results.show', $test) }}"
                                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            View
                                        </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7"
                                            class="px-6 py-4 text-center leading-5 text-gray-900 whitespace-no-wrap">
                                            No results were found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $tests->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
