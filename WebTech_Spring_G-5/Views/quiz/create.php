<!DOCTYPE html>
<html>
<head>
    <title>Create Quiz</title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>

<h1>Create Quiz</h1>

<form method="POST">

    <input type="text"
           name="title"
           placeholder="Quiz Title"
           required>

    <br><br>

    <textarea name="description"
              placeholder="Quiz Description"></textarea>

    <br><br>

    <input type="number"
           name="time_limit_minutes"
           placeholder="Time Limit"
           required>

    <br><br>

    <select name="status">

        <option value="draft">
            Draft
        </option>

        <option value="published">
            Published
        </option>

    </select>

    <br><br>

    <button type="submit">
        Create Quiz
    </button>

</form>

<br>

<a href="index.php?url=quiz-list">
    Back to Quiz List
</a>

</body>
</html>
