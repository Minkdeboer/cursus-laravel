<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-4">User List</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if (!empty($users) && count($users) > 0)
                            <ul class="list-group">
                                @foreach ($users as $user)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $user->name }}</span>
                                        <span class="badge bg-primary rounded-pill">{{ $user->email }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-center text-muted">No users found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>