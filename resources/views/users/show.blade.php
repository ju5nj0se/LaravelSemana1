<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mt-4">
                        <label for="">Nombre</label>
                        <input type="text" value="{{ $user->name }}" class="form-control" disable>
                    </div>
                    <div class="mt-4">
                        <label for="">Email</label>
                        <input type="text" value="{{ $user->email }}" class="form-control" disable>
                    </div>
                    <div class="mt-4">
                        <label for="">Fecha de creación</label>
                        <input type="text" value="{{ $user->created_at }}" class="form-control" disable>
                    </div>
                </div>

                <a href="{{ route('users.index') }}" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>