<?php

require_once 'models/Quiz.php';

class QuizController {

    public function index() {

        require 'middleware/instructor.php';

        $quizModel = new Quiz();

        $quizzes = $quizModel->getInstructorQuizzes(
            $_SESSION['user_id']
        );

        require 'Views/quiz/list.php';
    }

    public function create() {

        require 'middleware/instructor.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $title = trim($_POST['title']);

            $description = trim($_POST['description']);

            $time_limit_minutes =
                trim($_POST['time_limit_minutes']);

            $status = trim($_POST['status']);

            $quizModel = new Quiz();

            $quizModel->create(
                $_SESSION['user_id'],
                $title,
                $description,
                $time_limit_minutes,
                $status
            );

            header('Location: index.php?url=quiz-list');

            exit();
        }

        require 'Views/quiz/create.php';
    }
}
?>
