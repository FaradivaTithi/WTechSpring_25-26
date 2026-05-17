<!DOCTYPE html>
<html>
<head>
    <title>Quiz List</title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>

<h1>My Quizzes</h1>

<a href="index.php?url=create-quiz">
    Create New Quiz
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Time</th>
        <th>Status</th>
        <th>Publish</th>
        <th>Actions</th>
    </tr>

    <?php foreach($quizzes as $quiz): ?>

    <tr>

        <td>
            <?php echo $quiz['id']; ?>
        </td>

        <td>
            <?php echo $quiz['title']; ?>
        </td>

        <td>
            <?php echo $quiz['description']; ?>
        </td>

        <td>
            <?php echo $quiz['time_limit_minutes']; ?>
            mins
        </td>

        <td>
            <?php echo $quiz['status']; ?>
        </td>

        <td>

            <button onclick="
                toggleQuiz(
                    <?php echo $quiz['id']; ?>
                )
            ">

            <?php echo $quiz['status']; ?>

            </button>

        </td>

        <td>
            <a href="index.php?url=add-question&quiz_id=<?php echo $quiz['id']; ?>">
                Add Questions
            </a>
        </td>

    </tr>

    <?php endforeach; ?>

</table>

<br>

<a href="index.php?url=instructor-dashboard">
    Dashboard
</a>

<script src="assets/js/quiz-list.js"></script>

</body>
</html>
