@extends('layouts.app')
@section('titel')
    Login
@endsection
@section('contente')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header i {
            font-size: 50px;
            color: #0d6efd;
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            font-weight: 600;
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }
    </style>
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <i class="fas fa-user-circle"></i>
                <h2>Login</h2>
                <p class="text-muted">Please enter your credentials</p>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">
                                *{{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password"
                            name="password">
                        <p>
                            @error('password')
                                <span class="text-danger">
                                    *{{ $message }}
                                </span>
                            @enderror
                        </p>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary btn-login mb-3">Login</button>

                <div class="forgot-password">
                    <a href="#" class="text-decoration-none">Forgot password?</a>
                </div>

                <div class="text-center mt-4">
                    <p class="text-muted">Don't have an account? <a href="#" class="text-decoration-none">Sign up</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
@endsection
