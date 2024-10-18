<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg transition duration-300 ease-in-out transform hover:shadow-2xl">
                <div class="p-6 text-gray-900">
                    <h6 class="text-2xl font-bold text-blue-600">Test Results</h6>

                    <table class="mt-4 w-full table-auto">
                        <tbody class="bg-white">
                            @if (auth()->user()?->is_admin)
                                <tr>
                                    <th class="border border-gray-300 bg-gray-100 px-6 py-3 text-left text-sm font-semibold uppercase text-slate-600">User</th>
                                    <td class="border border-gray-300 px-6 py-3">{{ $test->user->name ?? '' }} ({{ $test->user->email ?? '' }})</td>
                                </tr>
                            @endif
                            <tr>
                                <th class="border border-gray-300 bg-gray-100 px-6 py-3 text-left text-sm font-semibold uppercase text-slate-600">Date</th>
                                <td class="border border-gray-300 px-6 py-3">{{ $test->created_at->format('D m/Y, h:i A') ?? '' }}</td>
                            </tr>
                            <tr>
                                <th class="border border-gray-300 bg-gray-100 px-6 py-3 text-left text-sm font-semibold uppercase text-slate-600">Result</th>
                                <td class="border border-gray-300 px-6 py-3">{{ $test->result }} / {{ $questions_count }} @if ($test->time_spent) (time: {{ sprintf('%.2f', $test->time_spent / 60) }} minutes) @endif</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @isset($leaderboard)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-12 mt-8">
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h6 class="text-2xl font-bold text-blue-600">Leaderboard</h6>

                        <table class="mt-4 w-full table-auto">
                            <thead>
                                <tr class="bg-blue-600 text-white">
                                    <th class="px-4 py-2 text-left">Rank</th>
                                    <th class="px-4 py-2 text-left">Username</th>
                                    <th class="px-4 py-2 text-left">Results</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($leaderboard as $test)
                                    <tr @class(['bg-gray-100' => auth()->user()->name == $test->user->name])>
                                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2">{{ $test->user->name }}</td>
                                        <td class="px-4 py-2">{{ $test->result }} / {{ $questions_count }} (time: {{ sprintf('%.2f', $test->time_spent / 60) }} minutes)</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endisset

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($results as $result)
                        <div class="my-4">
                            <table class="table-auto w-full">
                                <tbody class="bg-white">
                                    <tr class="bg-gray-100">
                                        <td class="w-1/2 py-3 font-semibold">Question #{{ $loop->iteration }}</td>
                                        <td class="py-3">{!! nl2br($result->question->text) !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 font-semibold">Options</td>
                                        <td class="py-3">
                                            <ul>
                                                @foreach ($result->question->options as $option)
                                                    <li @class(['underline' => $result->option_id == $option->id, 'font-bold text-green-600' => $option->correct == 1])>
                                                        {{ $option->text }}
                                                        @if ($option->correct == 1) <span class="italic">(correct answer)</span> @endif
                                                        @if ($result->option_id == $option->id) <span class="italic">(your answer)</span> @endif
                                                    </li>
                                                @endforeach
                                                @if (is_null($result->option_id))
                                                    <span class="font-bold italic text-red-600">Question unanswered.</span>
                                                @endif
                                            </ul>
                                        </td>
                                    </tr>
                                    @if ($result->question->answer_explanation || $result->question->more_info_link)
                                        <tr>
                                            <td class="py-3 font-semibold">Answer Explanation</td>
                                            <td class="py-3">{{ $result->question->answer_explanation }}</td>
                                        </tr>
                                        @if ($result->question->more_info_link)
                                            <tr>
                                                <td class="py-3 font-semibold">Read more:</td>
                                                <td class="py-3">
                                                    <a href="{{ $result->question->more_info_link }}" class="hover:underline text-blue-600" target="_blank">{{ $result->question->more_info_link }}</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @if (!$loop->last)
                            <hr class="my-4">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
