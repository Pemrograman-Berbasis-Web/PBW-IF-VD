<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Link ke Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        .gradient-custom {
            background: radial-gradient(50% 123.47% at 50% 50%, #00ff94 0%, #720059 100%),
                linear-gradient(121.28deg, #669600 0%, #ff0000 100%),
                linear-gradient(360deg, #0029ff 0%, #8fff00 100%),
                radial-gradient(100% 164.72% at 100% 100%, #6100ff 0%, #00ff57 100%),
                radial-gradient(100% 148.07% at 0% 0%, #fff500 0%, #51d500 100%);
            background-blend-mode: screen, color-dodge, overlay, difference, normal;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            function loadTodos() {
                $.get('api.php?action=list', function (data) {
                    var todoList = $('#todo-list');
                    todoList.empty();
                    data.forEach(function (todo) {
                        var li = $('<li class="list-group-item d-flex align-items-center border-0 mb-2 rounded" style="background-color: #f4f6f7;">').html(
                            '<span ' + (todo.is_completed ? 'style="text-decoration: line-through;"' : '') + '>' + todo.task + '</span>' +
                            (todo.is_completed ? '' : ' <a href="#" class="btn btn-success btn-sm complete" data-id="' + todo.id + '">Mark as Completed</a>') +
                            ' <a href="#" class="btn btn-danger btn-sm delete" data-id="' + todo.id + '">Delete</a>'
                        );
                        todoList.append(li);
                    });
                });
            }

            $('#add-form').submit(function (e) {
                e.preventDefault();
                var task = $('#task').val();
                $.post('api.php?action=add', JSON.stringify({ task: task }), function () {
                    $('#task').val('');
                    loadTodos();
                });
            });

            $(document).on('click', '.complete', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: 'api.php?action=complete',
                    type: 'PUT',
                    data: JSON.stringify({ id: id }),
                    success: loadTodos
                });
            });

            $(document).on('click', '.delete', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: 'api.php?action=delete',
                    type: 'DELETE',
                    data: JSON.stringify({ id: id }),
                    success: loadTodos
                });
            });

            loadTodos();
        });
    </script>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card">
                        <div class="card-body p-5">
                            <h1 class="text-center mb-4">Todo List</h1>
                            <!-- Form untuk menambahkan tugas -->
                            <form id="add-form" class="d-flex justify-content-center align-items-center mb-4">
                                <div data-mdb-input-init class="form-outline flex-fill">
                                    <input type="text" id="task" class="form-control" placeholder="New task...">
                                </div>
                                <button type="submit" class="btn btn-info ms-2">Add</button>
                            </form>

                            <!-- Daftar todo -->
                            <ul id="todo-list" class="list-group mb-0"></ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Link ke Bootstrap JS dan Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
