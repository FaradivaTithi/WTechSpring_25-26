async function updateQuestion(id) {

    const question_text =
        document.getElementById(
            'text-' + id
        ).value;

    const marks =
        document.getElementById(
            'marks-' + id
        ).value;

    const response = await fetch(

        'api/questions/update.php?id=' + id,

        {
            method: 'PATCH',

            headers: {
                'Content-Type': 'application/json'
            },

            body: JSON.stringify({
                question_text,
                marks
            })
        }
    );

    const data = await response.json();

    if(data.success) {

        alert('Question Updated');
    }
}

async function deleteQuestion(id) {

    if(!confirm('Delete this question?')) {

        return;
    }

    const response = await fetch(

        'api/questions/delete.php?id=' + id

    );

    const data = await response.json();

    if(data.success) {

        document
        .getElementById('question-' + id)
        .remove();
    }
}
