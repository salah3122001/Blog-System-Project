<x-guest-layout>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --secondary: #8b5cf6;
            --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
            --light-bg: #f8fafc;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.08);
            --shadow-lg: 0 10px 30px rgba(0,0,0,0.12);
        }

        body {
            background: linear-gradient(135deg, #f6f7fb 0%, #f1f5f9 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .login-container {
            max-width: 440px;
            margin: 0 auto;
            padding: 20px;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .login-card:hover {
            box-shadow: 0 20px 40px rgba(79, 70, 229, 0.15);
        }

        /* Header */
        .login-header {
            background: var(--gradient);
            padding: 40px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-header::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 150%;
            height: 200%;
            background: linear-gradient(transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(30deg);
            animation: shimmer 3s infinite linear;
        }

        @keyframes shimmer {
            0% { transform: rotate(30deg) translateX(-100%); }
            100% { transform: rotate(30deg) translateX(100%); }
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .login-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 32px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .login-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .login-subtitle {
            opacity: 0.95;
            font-size: 1rem;
        }

        /* Form Body */
        .login-body {
            padding: 40px;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .form-label-icon {
            width: 24px;
            height: 24px;
            background: var(--gradient);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f8fafc;
            color: #334155;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            background: white;
            outline: none;
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        /* Remember Me */
        .remember-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 25px 0;
        }

        .remember-checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .checkbox-custom {
            width: 20px;
            height: 20px;
            border: 2px solid #cbd5e1;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .checkbox-custom.checked {
            background: var(--gradient);
            border-color: var(--primary);
        }

        .checkbox-custom svg {
            width: 14px;
            height: 14px;
            color: white;
            opacity: 0;
            transition: opacity 0.2s;
        }

        .checkbox-custom.checked svg {
            opacity: 1;
        }

        .checkbox-input {
            display: none;
        }

        .checkbox-label {
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }

        /* Forgot Password */
        .forgot-password {
            color: var(--primary);
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .forgot-password:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 16px;
            background: var(--gradient);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
            margin-top: 10px;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s ease;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        /* Register Link */
        .register-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 14px;
        }

        .register-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            margin-left: 6px;
            transition: color 0.2s;
        }

        .register-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Error Messages */
        .error-message {
            background: linear-gradient(135deg, #fef2f2, #fff5f5);
            border: 2px solid #fecaca;
            border-radius: 10px;
            padding: 12px 16px;
            margin-top: 8px;
            color: #dc2626;
            font-size: 13px;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Loading State */
        .submit-btn.loading {
            opacity: 0.8;
            cursor: wait;
        }

        .submit-btn.loading .btn-icon {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 15px;
            }

            .login-header {
                padding: 30px 20px;
            }

            .login-body {
                padding: 30px 20px;
            }

            .login-icon {
                width: 60px;
                height: 60px;
                font-size: 28px;
            }

            .login-title {
                font-size: 1.7rem;
            }
        }

        /* Session Status */
        .session-status {
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            border: 2px solid #93c5fd;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 25px;
            color: #1e40af;
            font-weight: 500;
            text-align: center;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="header-content">
                    <div class="login-icon">
                        🔐
                    </div>
                    <h1 class="login-title">Welcome Back</h1>
                    <p class="login-subtitle">Sign in to your account to continue</p>
                </div>
            </div>

            <!-- Session Status -->
            @if(session('status'))
                <div class="session-status">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Form -->
            <div class="login-body">
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="form-label-icon">📧</span>
                            <span>Email Address</span>
                        </label>
                        <input type="email"
                               name="email"
                               id="email"
                               class="form-input"
                               value="{{ old('email') }}"
                               placeholder="Enter your email address"
                               required
                               autofocus
                               autocomplete="username">
                        @if($errors->has('email'))
                            <div class="error-message">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="form-label-icon">🔒</span>
                            <span>Password</span>
                        </label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-input"
                               placeholder="Enter your password"
                               required
                               autocomplete="current-password">
                        @if($errors->has('password'))
                            <div class="error-message">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="remember-container">
                        <label class="remember-checkbox" for="remember_me">
                            <div class="checkbox-custom" id="rememberCheckbox">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="remember_me"
                                   type="checkbox"
                                   class="checkbox-input"
                                   name="remember">
                            <span class="checkbox-label">Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password">
                                <span>🔓</span>
                                <span>Forgot password?</span>
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn" id="loginBtn">
                        <span class="btn-icon">🚀</span>
                        <span>Sign In</span>
                    </button>
                </form>

                <!-- Register Link -->
                @if (Route::has('register'))
                    <div class="register-link">
                        Don't have an account?
                        <a href="{{ route('register') }}">Create one now</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const loginBtn = document.getElementById('loginBtn');
            const rememberCheckbox = document.getElementById('rememberCheckbox');
            const rememberInput = document.getElementById('remember_me');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            // Custom checkbox functionality
            rememberCheckbox.addEventListener('click', function() {
                rememberInput.checked = !rememberInput.checked;
                rememberCheckbox.classList.toggle('checked', rememberInput.checked);
            });

            // Initialize checkbox state
            rememberCheckbox.classList.toggle('checked', rememberInput.checked);

            // Form validation and submission
            loginForm.addEventListener('submit', function(e) {
                // Basic validation
                if (!emailInput.value || !passwordInput.value) {
                    e.preventDefault();

                    // Add error styles to empty fields
                    if (!emailInput.value) {
                        emailInput.style.borderColor = '#ef4444';
                        emailInput.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.1)';
                    }

                    if (!passwordInput.value) {
                        passwordInput.style.borderColor = '#ef4444';
                        passwordInput.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.1)';
                    }

                    // Show error message
                    if (!emailInput.value && !passwordInput.value) {
                        alert('Please enter your email and password.');
                    } else if (!emailInput.value) {
                        alert('Please enter your email address.');
                    } else {
                        alert('Please enter your password.');
                    }
                } else {
                    // Add loading state
                    loginBtn.classList.add('loading');
                    loginBtn.innerHTML = '<span class="btn-icon">⏳</span><span>Signing in...</span>';
                    loginBtn.disabled = true;
                }
            });

            // Remove error styles on input
            emailInput.addEventListener('input', function() {
                this.style.borderColor = '';
                this.style.boxShadow = '';
            });

            passwordInput.addEventListener('input', function() {
                this.style.borderColor = '';
                this.style.boxShadow = '';
            });

            // Auto-focus email field
            emailInput.focus();

            // Add keyboard shortcut for submit (Ctrl+Enter)
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                    loginForm.submit();
                }
            });

            // Password visibility toggle (optional enhancement)
            const togglePassword = document.createElement('span');
            togglePassword.innerHTML = '👁️';
            togglePassword.style.position = 'absolute';
            togglePassword.style.right = '16px';
            togglePassword.style.top = '50%';
            togglePassword.style.transform = 'translateY(-50%)';
            togglePassword.style.cursor = 'pointer';
            togglePassword.style.opacity = '0.5';
            togglePassword.style.transition = 'opacity 0.2s';

            const passwordWrapper = passwordInput.parentElement;
            passwordWrapper.style.position = 'relative';
            passwordWrapper.appendChild(togglePassword);

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                togglePassword.innerHTML = type === 'password' ? '👁️' : '👁️‍🗨️';
                togglePassword.style.opacity = '1';
            });

            togglePassword.addEventListener('mouseenter', function() {
                togglePassword.style.opacity = '1';
            });

            togglePassword.addEventListener('mouseleave', function() {
                togglePassword.style.opacity = '0.5';
            });
        });
    </script>
</x-guest-layout>
