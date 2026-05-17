async function toggleQuiz(id) {

    const response = await fetch(

        'api/quizzes/toggle.php?id=' + id

    );

    const data = await response.json();

    if(data.success) {

        location.reload();
    }
}
