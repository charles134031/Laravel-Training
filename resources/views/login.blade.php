<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/style.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4 p-sm-5">
                        
                        <h3 class="card-title text-center mb-4 fw-bold text-dark">Welcome Back</h3>
                        
                        <form action="{{route('login') }}" method="POST">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" 
                                       class="form-control @error('username') is-invalid @enderror" 
                                       id="username" 
                                       name="username" 
                                       placeholder="johndoe" 
                                       value="{{ old('username') }}" 
                                       required 
                                       autofocus>
                                <label for="username">Username</label>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Password" 
                                       required>
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-check mb-4 text-start">
                                <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                                <label class="form-check-input-label text-secondary small" for="rememberMe">
                                    Remember me
                                </label>
                            </div>

                            <button class="btn btn-primary w-100 py-2.5 fw-semibold text-uppercase" type="submit">
                                Sign In
                            </button>
                            
                        </form>
                        
                    </div>
                </div>
                
                <div class="text-center mt-3">
                    <a href="#" class="text-decoration-none small text-muted">Forgot password?</a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      

        const username = document.getElementById('username');
        const password = document.getElementById('password');

        axios.post('/login',{username: username,password: password}).then(response => {})
        .catch(error => {console.error('Login failed:', error.response.data);});

    </script>
</body>
</html>