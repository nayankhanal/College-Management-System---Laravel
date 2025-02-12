<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-sm" style="width: 400px;">
        <h2 class="form-title" style="text-align: center; margin-bottom: 20px;"><b>Edu</b><small style="font-weight: 300;">Sphere</small></h2>
        <h5 class="text-center mb-3">Forgot Password</h5>
        <form id="forgotPasswordForm" action="{{ route('sendOtp') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Send OTP</button>
        </form>
        <div id="message" class="mt-3 text-center text-success"></div>
        @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
        @endif
    </div>

    <script>
        // document.getElementById("forgotPasswordForm").addEventListener("submit", function(event) {
        //     event.preventDefault();
        //     const email = document.getElementById("email").value;

        //     if (email) {
        //         document.getElementById("message").innerText = "OTP sent to " + email;
        //     }
        // });
    </script>

</body>
</html>
