<div x-data="{ secondsLeft: {{ config('quiz.secondsPerQuestion') }} }" x-init="setInterval(() => {
    if (secondsLeft > 1) { secondsLeft--; } else {
        secondsLeft = {{ config('quiz.secondsPerQuestion') }};
        $wire.nextQuestion();
    }
}, 1000);" class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg transition transform hover:scale-105">

    <div class="mb-4 text-lg text-gray-700">
        Time left for this question: <span x-text="secondsLeft" class="font-bold text-indigo-600"></span> sec.
    </div>

    <span class="text-lg font-semibold">Question {{ $currentQuestionIndex + 1 }} of {{ $this->questionsCount }}:</span>
    <h2 class="mb-6 text-3xl font-bold text-gray-900">{{ $currentQuestion->text }}</h2>

    @if ($currentQuestion->code_snippet)
        <pre class="mb-4 border-2 border-gray-300 rounded-lg bg-gray-50 p-4">
            <code class="text-gray-800">{{ $currentQuestion->code_snippet }}</code>
        </pre>
    @endif

    <div class="space-y-4">
        @foreach ($currentQuestion->options as $option)
            <div class="flex items-center p-4 bg-gray-100 rounded-lg shadow hover:bg-gray-200 transition">
                <label for="option.{{ $option->id }}" class="flex items-center w-full cursor-pointer">
                    <input type="radio" id="option.{{ $option->id }}"
                        wire:model.defer="answersOfQuestions.{{ $currentQuestionIndex }}"
                        name="answersOfQuestions.{{ $currentQuestionIndex }}" value="{{ $option->id }}"
                        class="mr-2 w-5 h-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <span class="text-gray-800">{{ $option->text }}</span>
                </label>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        @if ($currentQuestionIndex < $this->questionsCount - 1)
            <x-secondary-button
                x-on:click="secondsLeft = {{ config('quiz.secondsPerQuestion') }}; $wire.nextQuestion();"
                class="transition transform hover:scale-105 duration-150">
                Next Question
            </x-secondary-button>
        @else
            <x-primary-button x-on:click="$wire.submit();" class="transition transform hover:scale-105 duration-150">
                Submit
            </x-primary-button>
        @endif
    </div>
</div>
