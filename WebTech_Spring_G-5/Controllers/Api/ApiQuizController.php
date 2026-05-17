<?php

require_once __DIR__ . '/../models/Quiz.php';

class ApiQuizController {

    public function toggle() {

        header('Content-Type: application/json');

        if(!isset($_GET['id'])) {

            echo json_encode([
                'success' => false
            ]);

            return;
        }

        $quizModel = new Quiz();

        $success = $quizModel->toggleStatus($_GET['id']);

        echo json_encode([
            'success' => $success
        ]);
    }
}
?>
