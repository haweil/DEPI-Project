<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Leaderboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg transition-transform transform hover:scale-105">
                <div class="p-6 text-gray-900">
                    <select class="p-3 w-full text-sm leading-5 rounded border-0 shadow-md text-slate-600 hover:shadow-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150"                        wire:model="quiz_id">
                        <option value="0">All quizzes</option>
                        @foreach ($quizzes as $quiz)
                            <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                        @endforeach
                    </select>
                    <table class="mt-4 w-full table-view">
                        <thead>
                            <tr>
                                <th class="bg-gray-50 px-6 py-3 text-left w-9"></th>
                                <th class="bg-gray-50 px-6 py-3 text-left w-1/2">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Username</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Quiz</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Correct Answers</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tests as $test)
                                <tr @class([
                                    'bg-gray-100' => auth()->check() && $test->user->name == auth()->user()->name,
                                    'transition-transform duration-200 hover:bg-gray-50'
                                ])>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $test->user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $test->quiz->title }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $test->result }} / {{ $test->quiz->questions_count }} (time: {{ sprintf('%.2f', $test->time_spent / 60) }} minutes)
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-gray-500">No results.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
