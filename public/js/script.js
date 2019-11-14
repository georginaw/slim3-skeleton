$todoItems = document.querySelectorAll('ul li');

$todoItems.forEach(function($todo) {
    $todo.addEventListener('click', function() {
        $todo.value = 1
    })

    if ($todo.value === 1) {
        $todoComplete = $todo.name
        // reload page and send the name of the to-do to the backend to be added to the completed list
    }
})

