<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex justify-content-center align-element-center vh-100">
        <div class="card p-4 shadow" style="width: 350px;">
            <h2 class="text-center">Dashboard</h2>
            <p class="text-center"> Welcome, {{session('user')}}!</p>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100 "> Logout </button>
            </form>
        </div>
    </div>
</body>

</html>