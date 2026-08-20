<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>HelpDesk - Xavier Fdez - @yield('title', 'Solicitudes')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 py-4"
      {{-- style="background: linear-gradient(135deg, #1a1a2e, #16213e);"> --}}
      style="background: linear-gradient(135deg, #0f2027, #2c5364, #4facfe);">

    <div class="container" style="max-width: 960px;">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4 p-md-5">

                <h4 class="mb-4">HelpDesk - ISW-811</h4>

                @if (session('success'))
                    {{-- Mensaje de confirmación al crear, editar o eliminar --}}
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @yield('content')

            </div>
        </div>
    </div>
</body>
</html>