@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div
            class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl shadow-sm animate-fade-in">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-green-600">✓</span>
                </div>
                <div class="flex-1">
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-green-400 hover:text-green-600">
                    ✕
                </button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div
            class="mb-6 p-4 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-xl shadow-sm animate-fade-in">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-red-600">!</span>
                </div>
                <div class="flex-1">
                    <p class="text-red-800 font-medium">{{ session('error') }}</p>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600">
                    ✕
                </button>
            </div>
        </div>
    @endif



    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }

        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --secondary: #8b5cf6;
            --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
            --light-bg: #f8fafc;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.12);
            --error: #ef4444;
            --success: #10b981;
        }

        body {
            background: linear-gradient(135deg, #f6f7fb 0%, #f1f5f9 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .create-container {
            max-width: 800px;
            margin: 0 auto;
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header Section */
        .create-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px;
        }

        .create-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .create-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient);
            border-radius: 2px;
        }

        .create-subtitle {
            color: #64748b;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .form-card:hover {
            box-shadow: 0 15px 40px rgba(79, 70, 229, 0.15);
        }

        /* Error Alert */
        .error-alert {
            background: linear-gradient(135deg, #fef2f2, #fff5f5);
            border: 2px solid #fecaca;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        .error-title {
            color: var(--error);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .error-list {
            margin: 0;
            padding-left: 20px;
            color: #7f1d1d;
        }

        .error-list li {
            margin-bottom: 8px;
            position: relative;
            padding-left: 5px;
        }

        .error-list li::before {
            content: '•';
            color: var(--error);
            font-weight: bold;
            position: absolute;
            left: -15px;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 30px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 12px;
            font-size: 1.05rem;
        }

        .form-label-icon {
            width: 32px;
            height: 32px;
            background: var(--gradient);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
        }

        .form-control-custom {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 16px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f8fafc;
            width: 100%;
        }

        .form-control-custom:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            background: white;
            outline: none;
        }

        .form-control-custom::placeholder {
            color: #94a3b8;
        }

        #titleInput {
            font-size: 1.1rem;
            font-weight: 500;
        }

        #contentInput {
            min-height: 200px;
            resize: vertical;
            line-height: 1.7;
        }

        /* Character Counter */
        .char-counter {
            text-align: right;
            font-size: 13px;
            color: #64748b;
            margin-top: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .char-count {
            font-weight: 600;
            transition: color 0.3s;
        }

        .char-count.warning {
            color: #f59e0b;
        }

        .char-count.danger {
            color: var(--error);
        }

        /* Submit Button */
        .btn-submit-container {
            margin-top: 40px;
            text-align: center;
        }

        .btn-submit {
            background: var(--gradient);
            border: none;
            border-radius: 12px;
            padding: 16px 40px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s ease;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        .btn-submit-icon {
            font-size: 18px;
        }

        /* Tips Section */
        .tips-section {
            background: #f0f9ff;
            border: 2px solid #bae6fd;
            border-radius: 12px;
            padding: 20px;
            margin-top: 30px;
        }

        .tips-title {
            color: #0369a1;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .tips-list {
            color: #0c4a6e;
            padding-left: 20px;
            margin: 0;
        }

        .tips-list li {
            margin-bottom: 8px;
            line-height: 1.5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .create-container {
                padding: 15px;
            }

            .form-card {
                padding: 25px;
            }

            .create-title {
                font-size: 2rem;
            }

            .btn-submit {
                width: 100%;
                justify-content: center;
            }
        }

        /* Loading State */
        .btn-submit.loading {
            opacity: 0.8;
            cursor: wait;
        }

        .btn-submit.loading .btn-submit-icon {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <div class="container create-container py-5">

        <div class="create-header">
            <h1 class="create-title">Create New Post</h1>
            <p class="create-subtitle">Share your thoughts, ideas, and stories with the community</p>
        </div>

        <div class="form-card">
            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="error-alert">
                    <div class="error-title">
                        <span>⚠️</span>
                        <span>Please check the following errors:</span>
                    </div>
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('posts.store') }}" method="POST" id="postForm">
                @csrf

                {{-- Title Field --}}
                <div class="form-group">
                    <label class="form-label">
                        <span class="form-label-icon">📝</span>
                        <span>Post Title</span>
                    </label>
                    <input type="text" name="title" id="titleInput" class="form-control-custom"
                        value="{{ old('title') }}" placeholder="Write a captivating title that grabs attention..."
                        maxlength="200" required>
                    <div class="char-counter">
                        <span class="text-muted">Max 200 characters</span>
                        <span class="char-count" id="titleCount">0/200</span>
                    </div>
                </div>

                {{-- Content Field --}}
                <div class="form-group">
                    <label class="form-label">
                        <span class="form-label-icon">📄</span>
                        <span>Content</span>
                    </label>
                    <textarea name="content" id="contentInput" class="form-control-custom" rows="8"
                        placeholder="Share your story, ideas, or thoughts... Be creative!" maxlength="5000" required>{{ old('content') }}</textarea>
                    <div class="char-counter">
                        <span class="text-muted">Max 5000 characters</span>
                        <span class="char-count" id="contentCount">0/5000</span>
                    </div>
                </div>

                {{-- Tips Section --}}
                <div class="tips-section">
                    <div class="tips-title">
                        <span>💡</span>
                        <span>Writing Tips</span>
                    </div>
                    <ul class="tips-list">
                        <li>Start with a compelling introduction</li>
                        <li>Use clear and concise language</li>
                        <li>Break up long paragraphs for better readability</li>
                        <li>Add relevant examples or stories</li>
                        <li>Proofread before publishing</li>
                    </ul>
                </div>

                {{-- Submit Button --}}
                <div class="btn-submit-container">
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <span class="btn-submit-icon">🚀</span>
                        <span>Publish Post</span>
                    </button>
                </div>
            </form>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const titleInput = document.getElementById('titleInput');
            const contentInput = document.getElementById('contentInput');
            const titleCount = document.getElementById('titleCount');
            const contentCount = document.getElementById('contentCount');
            const submitBtn = document.getElementById('submitBtn');
            const form = document.getElementById('postForm');

            // Update character count
            function updateCharCount(input, countElement, maxLength) {
                const length = input.value.length;
                countElement.textContent = `${length}/${maxLength}`;

                // Update color based on length
                if (length > maxLength * 0.9) {
                    countElement.className = 'char-count danger';
                } else if (length > maxLength * 0.75) {
                    countElement.className = 'char-count warning';
                } else {
                    countElement.className = 'char-count';
                }
            }

            // Initialize counts
            updateCharCount(titleInput, titleCount, 200);
            updateCharCount(contentInput, contentCount, 5000);

            // Event listeners for real-time updates
            titleInput.addEventListener('input', () => updateCharCount(titleInput, titleCount, 200));
            contentInput.addEventListener('input', () => updateCharCount(contentInput, contentCount, 5000));

            // Auto-resize textarea
            contentInput.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight + 2) + 'px';
            });

            // Form submission handler
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    // Add visual feedback for invalid fields
                    const invalidFields = form.querySelectorAll(':invalid');
                    invalidFields.forEach(field => {
                        field.style.borderColor = 'var(--error)';
                        field.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.1)';
                    });
                } else {
                    // Add loading state
                    submitBtn.classList.add('loading');
                    submitBtn.innerHTML =
                    '<span class="btn-submit-icon">⏳</span><span>Publishing...</span>';
                    submitBtn.disabled = true;
                }
            });

            // Remove error styles on input
            const inputs = form.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.style.borderColor = '';
                    this.style.boxShadow = '';
                });
            });
        });
    </script>
@endsection
