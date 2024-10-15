<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelin - Travel Tour Booking HTML Templates</title>
    <link rel="stylesheet" href="{{ asset('2_AdminPanel/css/login.css') }}">
</head>

<body>
    <div class="container">
        <div class="card">
            <h2>Login</h2>
            <form action="{{ route('AdminLogin') }}" method="POST" id="LoginForm" enctype="multipart/form-data">
                @csrf
                <!-- Display validation errors, if any -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-1" role="alert">
                        <ul class="mb-0" style="list-style-type:none;">
                            @foreach ($errors->all() as $error)
                                <li><span>{{ $error }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Email input field -->
                <input type="email" id="email" name="email" placeholder="Enter Your Email" value="" required>
                <!-- Password input field -->
                <input type="password" id="password" name="password" placeholder="Enter Your Password" value="" required>
                <!-- Submit button -->
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>