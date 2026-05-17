<?php

require_once __DIR__ . '/../models/Question.php';
require_once __DIR__ . '/../models/option.php';

class ApiQuestionController {

    public function update() {

        header('Content-Type: application/json');

        $data = json_decode(
            file_get_contents("php://input"),
            true
        );

        if(
            !isset($_GET['id']) ||
            !isset($data['question_text']) ||
            !isset($data['marks'])
        ) {

            echo json_encode([
                'success' => false
            ]);

            return;
        }

        $questionModel = new Question();

        $success = $questionModel->update(
            $_GET['id'],
            $data['question_text'],
            $data['marks']
        );

        echo json_encode([
            'success' => $success
        ]);
    }

    public function delete() {

        header('Content-Type: application/json');

        if(!isset($_GET['id'])) {

            echo json_encode([
                'success' => false
            ]);

            return;
        }

        $optionModel = new Option();

        $optionModel->deleteByQuestion($_GET['id']);

        $questionModel = new Question();

        $success = $questionModel->delete($_GET['id']);

        echo json_encode([
            'success' => $success
        ]);
    }
}
?>
