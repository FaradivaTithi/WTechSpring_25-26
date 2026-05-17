<!DOCTYPE html>
<html>
<head>
    <title>Question Builder</title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>

<h1>
Question Builder
</h1>

<h3>
Quiz:
<?php echo $quiz['title']; ?>
</h3>

<form method="POST">

    <textarea
        name="question_text"
        placeholder="Question Text"
        required>
    </textarea>

    <br><br>

    <input type="number"
           name="marks"
           placeholder="Marks"
           required>

    <br><br>

    <h3>Options</h3>

    <?php for($i=0; $i<4; $i++): ?>

        <input type="text"
               name="options[]"
               placeholder="Option <?php echo $i+1; ?>"
               required>

        <input type="radio"
               name="correct_answer"
               value="<?php echo $i; ?>"
               required>

        Correct

        <br><br>

    <?php endfor; ?>

    <button type="submit">
        Add Question
    </button>

</form>

<hr>

<h2>Question List</h2>

<?php foreach($questions as $question): ?>

<div id="question-<?php echo $question['id']; ?>">

    <input type="text"
           id="text-<?php echo $question['id']; ?>"
           value="<?php echo $question['question_text']; ?>">

    <br><br>

    <input type="number"
           id="marks-<?php echo $question['id']; ?>"
           value="<?php echo $question['marks']; ?>">

    <br><br>

    <button onclick="
        updateQuestion(
            <?php echo $question['id']; ?>
        )
    ">
        Update
    </button>

    <button onclick="
        deleteQuestion(
            <?php echo $question['id']; ?>
        )
    ">
        Delete
    </button>

</div>

<hr>

<?php endforeach; ?>

<a href="index.php?url=quiz-list">
    Back to Quiz List
</a>

<script src="assets/js/question-builder.js"></script>

</body>
</html>
