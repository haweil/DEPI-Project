<x-app-layout>
    <!-- Public Quizzes Section -->
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h6 class="text-2xl font-bold text-blue-600 mb-6">
                    Public Quizzes for Not Registered Users
                </h6>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($public_quizzes as $quiz)
                        <div class="bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="p-6">
                                <a href="{{ route('quiz.show', $quiz->slug) }}" class="text-xl font-semibold text-blue-500 hover:text-blue-700 transition-colors duration-300">
                                    {{ $quiz->title }}
                                </a>
                                <p class="text-sm text-gray-600 mt-2">
                                    Questions: <span class="font-bold">{{ $quiz->questions_count }}</span>
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center col-span-full py-4 text-gray-500">
                            No public quizzes found.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Registered User Quizzes Section -->
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h6 class="text-2xl font-bold text-green-600 mb-6">
                    Quizzes for Registered Users
                </h6>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($registered_only_quizzes as $quiz)
                        <div class="bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="p-6">
                                <a href="{{ route('quiz.show', $quiz->slug) }}" class="text-xl font-semibold text-green-500 hover:text-green-700 transition-colors duration-300">
                                    {{ $quiz->title }}
                                </a>
                                <p class="text-sm text-gray-600 mt-2">
                                    Questions: <span class="font-bold">{{ $quiz->questions_count }}</span>
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center col-span-full py-4 text-gray-500">
                            No quizzes for registered users found.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
