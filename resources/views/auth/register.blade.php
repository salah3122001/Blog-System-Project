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
            --success: #10b981;
        }

        body {
            background: linear-gradient(135deg, #f6f7fb 0%, #f1f5f9 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .register-container {
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

        .register-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .register-card:hover {
            box-shadow: 0 20px 40px rgba(79, 70, 229, 0.15);
        }

        /* Header */
        .register-header {
            background: var(--gradient);
            padding: 40px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .register-header::after {
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

        .register-icon {
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

        .register-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .register-subtitle {
            opacity: 0.95;
            font-size: 1rem;
        }

        /* Form Body */
        .register-body {
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

        /* Password Strength Indicator */
        .password-strength {
            margin-top: 8px;
            height: 4px;
            border-radius: 2px;
            background: #e2e8f0;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .strength-bar.weak {
            width: 30%;
            background: #ef4444;
        }

        .strength-bar.medium {
            width: 60%;
            background: #f59e0b;
        }

        .strength-bar.strong {
            width: 90%;
            background: var(--success);
        }

        .strength-text {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
            text-align: right;
        }

        /* Password Requirements */
        .requirements-list {
            background: #f8fafc;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 15px;
            margin-top: 10px;
            font-size: 13px;
            color: #64748b;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
        }

        .requirement-item.valid {
            color: var(--success);
        }

        .requirement-item.valid::before {
            content: '✓';
            color: var(--success);
            font-weight: bold;
        }

        .requirement-item::before {
            content: '○';
            color: #94a3b8;
        }

        /* Password Match Indicator */
        .password-match {
            font-size: 13px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 6px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .password-match.visible {
            opacity: 1;
        }

        .password-match.matching {
            color: var(--success);
        }

        .password-match.not-matching {
            color: #ef4444;
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

        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        /* Login Link */
        .login-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 14px;
        }

        .login-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            margin-left: 6px;
            transition: color 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .login-link a:hover {
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
            .register-container {
                padding: 15px;
            }

            .register-header {
                padding: 30px 20px;
            }

            .register-body {
                padding: 30px 20px;
            }

            .register-icon {
                width: 60px;
                height: 60px;
                font-size: 28px;
            }

            .register-title {
                font-size: 1.7rem;
            }
        }

        /* Progress Steps (Optional) */
        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }

        .progress-steps::before {
            content: '';
            position: absolute;
            top: 12px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e2e8f0;
            z-index: 1;
        }

        .step {
            position: relative;
            z-index: 2;
            width: 24px;
            height: 24px;
            background: #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #64748b;
            transition: all 0.3s;
        }

        .step.active {
            background: var(--gradient);
            color: white;
            transform: scale(1.1);
        }

        .step.completed {
            background: var(--success);
            color: white;
        }

        .step-label {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 11px;
            color: #94a3b8;
            white-space: nowrap;
        }
    </style>

    <div class="register-container">
        <div class="register-card">
            <!-- Header -->
            <div class="register-header">
                <div class="header-content">
                    <div class="register-icon">
                        🎉
                    </div>
                    <h1 class="register-title">Join Our Community</h1>
                    <p class="register-subtitle">Create your account in less than a minute</p>
                </div>
            </div>

            <!-- Progress Steps (Optional) -->
            <div class="px-10 pt-6">
                <div class="progress-steps">
                    <div class="step active">
                        <span>1</span>
                        <div class="step-label">Account</div>
                    </div>
                    <div class="step">
                        <span>2</span>
                        <div class="step-label">Details</div>
                    </div>
                    <div class="step">
                        <span>3</span>
                        <div class="step-label">Complete</div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="register-body">
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="form-label-icon">👤</span>
                            <span>Full Name</span>
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               class="form-input"
                               value="{{ old('name') }}"
                               placeholder="Enter your full name"
                               required
                               autofocus
                               autocomplete="name">
                        @if($errors->has('name'))
                            <div class="error-message">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

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
                               placeholder="Create a strong password"
                               required
                               autocomplete="new-password">

                        <!-- Password Strength Indicator -->
                        <div class="password-strength">
                            <div class="strength-bar" id="strengthBar"></div>
                        </div>
                        <div class="strength-text" id="strengthText">Password strength</div>

                        <!-- Password Requirements -->
                        <div class="requirements-list" id="requirementsList">
                            <div class="requirement-item" id="reqLength">At least 8 characters</div>
                            <div class="requirement-item" id="reqUppercase">One uppercase letter</div>
                            <div class="requirement-item" id="reqLowercase">One lowercase letter</div>
                            <div class="requirement-item" id="reqNumber">One number</div>
                            <div class="requirement-item" id="reqSpecial">One special character</div>
                        </div>

                        @if($errors->has('password'))
                            <div class="error-message">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="form-label-icon">✅</span>
                            <span>Confirm Password</span>
                        </label>
                        <input type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               class="form-input"
                               placeholder="Confirm your password"
                               required
                               autocomplete="new-password">

                        <!-- Password Match Indicator -->
                        <div class="password-match" id="passwordMatch">
                            <span>🔒</span>
                            <span>Passwords match</span>
                        </div>

                        @if($errors->has('password_confirmation'))
                            <div class="error-message">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>

                    <!-- Terms Agreement -->
                    <div class="form-group">
                        <label class="remember-checkbox" for="terms_agreement" style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
                            <div class="checkbox-custom" id="termsCheckbox" style="margin-top: 2px;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="terms_agreement"
                                   type="checkbox"
                                   class="checkbox-input"
                                   name="terms"
                                   required>
                            <span class="checkbox-label">
                                I agree to the <a href="#" style="color: var(--primary); text-decoration: underline;">Terms of Service</a> and <a href="#" style="color: var(--primary); text-decoration: underline;">Privacy Policy</a>
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn" id="registerBtn" disabled>
                        <span class="btn-icon">🚀</span>
                        <span>Create Account</span>
                    </button>
                </form>

                <!-- Login Link -->
                <div class="login-link">
                    Already have an account?
                    <a href="{{ route('login') }}">
                        <span>↩️</span>
                        <span>Sign In</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registerForm = document.getElementById('registerForm');
            const registerBtn = document.getElementById('registerBtn');
            const termsCheckbox = document.getElementById('termsCheckbox');
            const termsInput = document.getElementById('terms_agreement');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const passwordMatch = document.getElementById('passwordMatch');
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');

            // Requirement elements
            const reqLength = document.getElementById('reqLength');
            const reqUppercase = document.getElementById('reqUppercase');
            const reqLowercase = document.getElementById('reqLowercase');
            const reqNumber = document.getElementById('reqNumber');
            const reqSpecial = document.getElementById('reqSpecial');

            // Custom checkbox functionality
            termsCheckbox.addEventListener('click', function() {
                termsInput.checked = !termsInput.checked;
                termsCheckbox.classList.toggle('checked', termsInput.checked);
                validateForm();
            });

            // Initialize checkbox state
            termsCheckbox.classList.toggle('checked', termsInput.checked);

            // Password strength checker
            function checkPasswordStrength(password) {
                let strength = 0;
                const requirements = {
                    length: password.length >= 8,
                    uppercase: /[A-Z]/.test(password),
                    lowercase: /[a-z]/.test(password),
                    number: /[0-9]/.test(password),
                    special: /[^A-Za-z0-9]/.test(password)
                };

                // Update requirement indicators
                reqLength.classList.toggle('valid', requirements.length);
                reqUppercase.classList.toggle('valid', requirements.uppercase);
                reqLowercase.classList.toggle('valid', requirements.lowercase);
                reqNumber.classList.toggle('valid', requirements.number);
                reqSpecial.classList.toggle('valid', requirements.special);

                // Calculate strength
                if (requirements.length) strength += 20;
                if (requirements.uppercase) strength += 20;
                if (requirements.lowercase) strength += 20;
                if (requirements.number) strength += 20;
                if (requirements.special) strength += 20;

                // Update strength bar and text
                strengthBar.className = 'strength-bar';

                if (strength <= 20) {
                    strengthBar.classList.add('weak');
                    strengthText.textContent = 'Weak password';
                    strengthText.style.color = '#ef4444';
                } else if (strength <= 60) {
                    strengthBar.classList.add('medium');
                    strengthText.textContent = 'Medium password';
                    strengthText.style.color = '#f59e0b';
                } else {
                    strengthBar.classList.add('strong');
                    strengthText.textContent = 'Strong password';
                    strengthText.style.color = '#10b981';
                }

                return requirements;
            }

            // Password match checker
            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                if (!password || !confirmPassword) {
                    passwordMatch.classList.remove('visible');
                    return false;
                }

                passwordMatch.classList.add('visible');

                if (password === confirmPassword) {
                    passwordMatch.classList.remove('not-matching');
                    passwordMatch.classList.add('matching');
                    passwordMatch.innerHTML = '<span>✅</span><span>Passwords match</span>';
                    return true;
                } else {
                    passwordMatch.classList.remove('matching');
                    passwordMatch.classList.add('not-matching');
                    passwordMatch.innerHTML = '<span>❌</span><span>Passwords do not match</span>';
                    return false;
                }
            }

            // Form validation
            function validateForm() {
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const password = passwordInput.value;
                const passwordValid = checkPasswordStrength(password);
                const passwordsMatch = checkPasswordMatch();
                const termsAgreed = termsInput.checked;

                // Check if all requirements are met
                const allRequirementsMet = Object.values(passwordValid).every(req => req);

                // Enable/disable submit button
                if (name && email && password && passwordsMatch && termsAgreed && allRequirementsMet) {
                    registerBtn.disabled = false;
                } else {
                    registerBtn.disabled = true;
                }
            }

            // Event listeners for real-time validation
            passwordInput.addEventListener('input', function() {
                checkPasswordStrength(this.value);
                checkPasswordMatch();
                validateForm();
            });

            confirmPasswordInput.addEventListener('input', function() {
                checkPasswordMatch();
                validateForm();
            });

            ['name', 'email'].forEach(id => {
                document.getElementById(id).addEventListener('input', validateForm);
            });

            // Form submission
            registerForm.addEventListener('submit', function(e) {
                // Final validation
                if (registerBtn.disabled) {
                    e.preventDefault();
                    alert('Please fill all required fields correctly.');
                } else {
                    // Add loading state
                    registerBtn.classList.add('loading');
                    registerBtn.innerHTML = '<span class="btn-icon">⏳</span><span>Creating Account...</span>';
                    registerBtn.disabled = true;
                }
            });

            // Auto-focus name field
            document.getElementById('name').focus();

            // Add keyboard shortcut for submit (Ctrl+Enter)
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                    if (!registerBtn.disabled) {
                        registerForm.submit();
                    }
                }
            });

            // Password visibility toggle
            function createPasswordToggle(inputId) {
                const input = document.getElementById(inputId);
                const toggle = document.createElement('span');
                toggle.innerHTML = '👁️';
                toggle.style.position = 'absolute';
                toggle.style.right = '16px';
                toggle.style.top = '50%';
                toggle.style.transform = 'translateY(-50%)';
                toggle.style.cursor = 'pointer';
                toggle.style.opacity = '0.5';
                toggle.style.transition = 'opacity 0.2s';
                toggle.style.zIndex = '2';

                const wrapper = input.parentElement;
                wrapper.style.position = 'relative';
                wrapper.appendChild(toggle);

                toggle.addEventListener('click', function() {
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    toggle.innerHTML = type === 'password' ? '👁️' : '👁️‍🗨️';
                    toggle.style.opacity = '1';
                });

                toggle.addEventListener('mouseenter', function() {
                    toggle.style.opacity = '1';
                });

                toggle.addEventListener('mouseleave', function() {
                    toggle.style.opacity = '0.5';
                });
            }

            // Create toggles for both password fields
            createPasswordToggle('password');
            createPasswordToggle('password_confirmation');

            // Initialize validation
            validateForm();
        });
    </script>
</x-guest-layout>
