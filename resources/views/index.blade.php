<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            height: 100vh;
        }
    </style>
</head>

<body class="antialiased">
    <nav class="navbar navbar-dark bg-dark mb-5">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Exception Handling with Laravel</span>
        </div>
    </nav>
    <main class="container h-100 mt-5">
        @if (session('status'))
            <div class="row justify-content-center">
                <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
                    <strong>Message:</strong> {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="card col-md-6">
                <div class="card-body">
                    <h2 class="text-center">Select a task</h2>
                    <form action="{{ route('store') }}" method="post">
                        @csrf
                        <div class="mb-4 mt-4">
                            <select class="form-select @error('task') is-invalid @enderror" name="task"
                                aria-label="Default select example">
                                <option value="" selected>Select a task</option>
                                <option value="Task 1">Task 1</option>
                                <option value="Task 2">Task 2</option>
                                <option value="Task 3">Task 3</option>
                            </select>
                            @error('task')
                                <span class="text-danger mb-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-grid col-6 col-md-3 mx-auto">
                            <button class="btn btn-secondary" type="submit" id="store">Button</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
