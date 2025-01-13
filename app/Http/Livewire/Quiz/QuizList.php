<?php

namespace App\Http\Livewire\Quiz;

use App\Models\Quiz;
use App\Models\Test;
use App\Models\Answer; // Import the Answer model
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class QuizList extends Component
{
    public function delete($quiz_id)
    {
        abort_if(!auth()->user()->is_admin, Response::HTTP_FORBIDDEN, 403);

        DB::beginTransaction();

        try {
            $quiz = Quiz::find($quiz_id);

            Answer::whereIn('test_id', function ($query) use ($quiz_id) {
                $query->select('id')
                    ->from('tests')
                    ->where('quiz_id', $quiz_id);
            })->forceDelete();

            Test::where('quiz_id', $quiz_id)->forceDelete();

            $quiz->forceDelete();

            DB::commit();

            $this->emit('quizDeleted', $quiz_id);
        } catch (\Exception $e) {
            DB::rollBack();

            $this->emit('deleteFailed', 'Failed to delete the quiz.');
        }
    }

    public function render(): View
    {
        $quizzes = Quiz::withCount('questions')->latest()->paginate();

        return view('livewire.quiz.quiz-list', compact('quizzes'));
    }
}