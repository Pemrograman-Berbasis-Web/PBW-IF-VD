<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Link ke Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card">
                        <div class="card-body p-5">

                            <!-- Form untuk menambahkan tugas -->
                            <form class="d-flex justify-content-center align-items-center mb-4" method="POST" action="?action=add">
                                <div data-mdb-input-init class="form-outline flex-fill">
                                    <input type="text" name="task" class="form-control" placeholder="New task...">
                                    <label class="form-label" for="form2">Website ini dibuat oleh Fadhil Ahmad Fathoni</label>
                                </div>
                                <button type="submit" class="btn btn-info ms-2">Add</button>
                            </form>

                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs mb-4 pb-2" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="active-tab" data-toggle="tab" href="#active" role="tab" aria-controls="active" aria-selected="false">Active</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
                                </li>
                            </ul>
                            <!-- Tabs navs -->

                            <!-- Tabs content -->
                            <div class="tab-content" id="myTabContent">
                                <!-- All Tasks Tab -->
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <ul class="list-group mb-0">
                                        <?php foreach ($todos as $todo): ?>
                                        <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded" style="background-color: #f4f6f7;">
                                            <input class="form-check-input me-2" type="checkbox" <?= $todo['is_completed'] ? 'checked' : '' ?> disabled />
                                            <span <?= $todo['is_completed'] ? 'style="text-decoration: line-through;"' : '' ?>><?= $todo['task'] ?></span>
                                            <div class="ml-2">
                                                <?php if (!$todo['is_completed']): ?>
                                                    <a href="?action=complete&id=<?= $todo['id'] ?>" class="btn btn-success btn-sm">Mark as Completed</a>
                                                <?php endif; ?>
                                                <a href="?action=delete&id=<?= $todo['id'] ?>" class="btn btn-danger btn-sm ml-2">Delete</a>
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!-- Active Tasks Tab -->
                                <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="active-tab">
                                    <ul class="list-group mb-0">
                                        <?php foreach ($todos as $todo): ?>
                                            <?php if (!$todo['is_completed']): ?>
                                                <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded" style="background-color: #f4f6f7;">
                                                    <input class="form-check-input me-2" type="checkbox" <?= $todo['is_completed'] ? 'checked' : '' ?> disabled />
                                                    <span><?= $todo['task'] ?></span>
                                                    <div class="ml-2">
                                                        <a href="?action=complete&id=<?= $todo['id'] ?>" class="btn btn-success btn-sm">Mark as Completed</a>
                                                        <a href="?action=delete&id=<?= $todo['id'] ?>" class="btn btn-danger btn-sm ml-2">Delete</a>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!-- Completed Tasks Tab -->
                                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                    <ul class="list-group mb-0">
                                        <?php foreach ($todos as $todo): ?>
                                            <?php if ($todo['is_completed']): ?>
                                                <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded" style="background-color: #f4f6f7;">
                                                    <input class="form-check-input me-2" type="checkbox" <?= $todo['is_completed'] ? 'checked' : '' ?> disabled />
                                                    <span style="text-decoration: line-through;"><?= $todo['task'] ?></span>
                                                    <div class="ml-2">
                                                        <a href="?action=delete&id=<?= $todo['id'] ?>" class="btn btn-danger btn-sm ml-2">Delete</a>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- Tabs content -->

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
