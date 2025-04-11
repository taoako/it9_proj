<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #77696b;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: #8a8a8a;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            width: 450px;
        }

        .btn-login {
            background: #2d7074;
            color: #fff;
            padding: 13px 35px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
        }

        h2 {
            font-size: 40px;
        }

        p {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>MOTOR & <br>VEHICLE PARTS</h2>
        <p>POINT OF SALE SYSTEM</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            @if ($errors->any())
            <p style="color: red;">{{ $errors->first() }}</p>
            @endif
            <button type="submit" class="btn btn-login mt-3">LOGIN</button>
        </form>
    </div>
</body>

</html>