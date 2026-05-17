<?php

require_once 'models/Question.php';
require_once 'models/option.php';
require_once 'models/Quiz.php';

class QuestionController {

    public function create() {

        require 'middleware/instructor.php';

        $quiz_id = $_GET['quiz_id'];

        $quizModel = new Quiz();

        $quiz = $quizModel->getById($quiz_id);

        $questionModel = new Question();

        $questions = $questionModel->getByQuiz($quiz_id);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $question_text =
                trim($_POST['question_text']);

            $marks =
                trim($_POST['marks']);

            $correct_answer =
                $_POST['correct_answer'];

            $options =
                $_POST['options'];

            $order_index =
                count($questions) + 1;

            $question_id =
                $questionModel->create(
                    $quiz_id,
                    $question_text,
                    $marks,
                    $order_index
                );

            $optionModel = new Option();

            foreach($options as $index => $option_text) {

                $is_correct =
                    ($index == $correct_answer)
                    ? 1 : 0;

                $optionModel->create(
                    $question_id,
                    $option_text,
                    $is_correct
                );
            }

            header(
                'Location: index.php?url=add-question&quiz_id='
                .$quiz_id
            );

            exit();
        }

        require 'Views/question/builder.php';
    }
}
?>
