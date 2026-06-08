<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#0d6efd,#00c6ff);
            font-family:sans-serif;
        }

        .login-box{
            width:400px;
            background:white;
            padding:40px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
        }

    </style>

</head>
<body>

<div class="login-box">

    <h2 class="text-center mb-4">
        Login Sistem
    </h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label>Username</label>

            <input type="text"
                   name="username"
                   class="form-control"
                   required>

        </div>

        <div class="mb-4">

            <label>Password</label>

            <input type="password"
                   name="password"
                   class="form-control"
                   required>

        </div>

        <button class="btn btn-primary w-100">
            Login
        </button>

    </form>

</div>

</body>
</html>