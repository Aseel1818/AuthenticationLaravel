<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Sign Up</div>
                    <div class="card-body">
                        <form action="{{ route('signup')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" class="form-control" name="name" required>
                                <span class="text-danger" id="nameError"></span>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required>
                                <span class="text-danger" id="emailError"></span>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="text-danger" id="passwordError"></span>
                            </div>

                            <div class="mb-3">
                                <label for="password-confirmation" class="form-label">Password</label>
                                <input id="password-confirmation" type="password" class="form-control" name="password-confirmation" required>
                                <span class="text-danger" id="confirmPasswordError"></span>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('signupForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Clear previous errors
            document.getElementById('nameError').innerText = '';
            document.getElementById('emailError').innerText = '';
            document.getElementById('passwordError').innerText = '';
            document.getElementById('confirmPasswordError').innerText = '';

            // Get input values
            let name = document.getElementById('name').value.trim();
            let email = document.getElementById('email').value.trim();
            let password = document.getElementById('password').value();
            let passwordConfirmation = document.getElementById('password-confirmation').value();

            let isValid = true;

            if (name === '') {
                document.getElementById('nameError').innerText = "Name is required.";
                isValid = false;
            }

            let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!emial.match(emailPattern)) {
                document.getElementById('emailError').innerText = "Enter a valid email.";
                isValid = false;
            }

            if (password.length < 8) {
                document.getElementById('passwordError').innerText = "Password must be at least 8 characters.";
                isValid = false;
            }

            if (password !== passwordConfirmation) {
                document.getElementById('confirmPasswordError').innerText = "Passwords do not match.";
                isValid = false;
            }

            // if everything is valid, redirect to the dashboard
            if (isValid) {
                window.location.href = "{{ route('dashboard') }}";
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>