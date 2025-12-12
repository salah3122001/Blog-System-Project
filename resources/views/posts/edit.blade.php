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
            --warning: #f59e0b;
            --danger: #ef4444;
        }

        body {
            background: linear-gradient(135deg, #f6f7fb 0%, #f1f5f9 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .edit-container {
            max-width: 800px;
            margin: 0 auto;
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-card:hover {
            box-shadow: 0 15px 40px rgba(79, 70, 229, 0.15);
        }

        /* Header */
        .form-header {
            background: var(--gradient);
            padding: 35px 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .form-header::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 150%;
            height: 200%;
            background: linear-gradient(transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: rotate(30deg);
            animation: shimmer 3s infinite linear;
        }

        @keyframes shimmer {
            0% {
                transform: rotate(30deg) translateX(-100%);
            }

            100% {
                transform: rotate(30deg) translateX(100%);
            }
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .header-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 28px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .header-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .header-subtitle {
            opacity: 0.95;
            font-size: 1.1rem;
        }

        .original-post-info {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        /* Form Body */
        .form-body {
            padding: 40px;
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
            color: var(--danger);
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
            color: var(--danger);
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
            min-height: 250px;
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
            color: var(--warning);
        }

        .char-count.danger {
            color: var(--danger);
        }

        /* Action Buttons */
        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .action-buttons {
                grid-template-columns: 1fr;
            }
        }

        .btn-update {
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
            border-radius: 12px;
            padding: 16px 30px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
        }

        .btn-update::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s ease;
        }

        .btn-update:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        }

        .btn-update:hover::before {
            left: 100%;
        }

        .btn-cancel {
            background: linear-gradient(135deg, #64748b, #475569);
            border: none;
            border-radius: 12px;
            padding: 16px 30px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
        }

        .btn-cancel::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s ease;
        }

        .btn-cancel:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(100, 116, 139, 0.3);
            color: white;
            text-decoration: none;
        }

        .btn-cancel:hover::before {
            left: 100%;
        }

        /* Preview Button */
        .preview-toggle {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 500;
            color: white;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 15px;
        }

        .preview-toggle:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(139, 92, 246, 0.3);
        }

        /* Preview Section */
        .preview-section {
            background: #f8fafc;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 25px;
            margin-top: 20px;
            display: none;
        }

        .preview-section.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .preview-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e2e8f0;
        }

        .preview-content {
            color: #475569;
            line-height: 1.7;
            white-space: pre-line;
            max-height: 300px;
            overflow-y: auto;
            padding-right: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-header {
                padding: 25px 20px;
            }

            .header-title {
                font-size: 1.6rem;
            }

            .header-icon {
                width: 50px;
                height: 50px;
                font-size: 24px;
            }

            .form-body {
                padding: 25px;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }
        }

        /* Loading State */
        .btn-update.loading {
            opacity: 0.8;
            cursor: wait;
        }

        .btn-update.loading .btn-icon {
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

        /* Original Info Styling */
        .original-label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }
    </style>

    <div class="container edit-container py-5">

        <div class="card form-card">
            {{-- Header --}}
            <div class="form-header">
                <div class="header-content">
                    <div class="header-icon">
                        ✏️
                    </div>
                    <h1 class="header-title">Edit Your Post</h1>
                    <p class="header-subtitle">Refine and perfect your thoughts before sharing</p>

                    {{-- Original Post Info --}}
                    <div class="original-post-info">
                        <div class="info-item">
                            <span>📅</span>
                            <span>Created: {{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="info-item">
                            <span>🔄</span>
                            <span>Last updated: {{ $post->updated_at->diffForHumans() }}</span>
                        </div>
                        <div class="info-item">
                            <span>👁️</span>
                            <span><a href="{{ route('posts.show', $post->id) }}"
                                    style="color: white; text-decoration: underline;">View current version</a></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form Body --}}
            <div class="form-body">
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

                <form action="{{ route('posts.update', $post->id) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    {{-- Title Field --}}
                    <div class="form-group">
                        <label class="form-label">
                            <span class="form-label-icon">📝</span>
                            <span>Post Title</span>
                        </label>
                        <input type="text" name="title" id="titleInput" class="form-control-custom"
                            value="{{ old('title', $post->title) }}" placeholder="Update your post title..." maxlength="200"
                            required>
                        <div class="char-counter">
                            <span class="text-muted">Max 200 characters</span>
                            <span class="char-count" id="titleCount">{{ strlen(old('title', $post->title)) }}/200</span>
                        </div>
                    </div>

                    {{-- Content Field --}}
                    <div class="form-group">
                        <label class="form-label">
                            <span class="form-label-icon">📄</span>
                            <span>Content</span>
                        </label>
                        <textarea name="content" id="contentInput" class="form-control-custom" rows="10"
                            placeholder="Update your post content..." maxlength="5000" required>{{ old('content', $post->content) }}</textarea>
                        <div class="char-counter">
                            <span class="text-muted">Max 5000 characters</span>
                            <span class="char-count"
                                id="contentCount">{{ strlen(old('content', $post->content)) }}/5000</span>
                        </div>

                        {{-- Preview Toggle --}}
                        <button type="button" class="preview-toggle" id="previewToggle">
                            <span>👁️</span>
                            <span>Preview Changes</span>
                        </button>
                    </div>

                    {{-- Preview Section --}}
                    <div class="preview-section" id="previewSection">
                        <div class="preview-title" id="previewTitle">{{ old('title', $post->title) }}</div>
                        <div class="preview-content" id="previewContent">{{ old('content', $post->content) }}</div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="action-buttons">
                        <button type="submit" class="btn-update" id="updateBtn">
                            <span class="btn-icon">💾</span>
                            <span>Update Post</span>
                        </button>

                        <a href="{{ route('posts.show', $post->id) }}" class="btn-cancel">
                            <span>↩️</span>
                            <span>Cancel</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const titleInput = document.getElementById('titleInput');
            const contentInput = document.getElementById('contentInput');
            const titleCount = document.getElementById('titleCount');
            const contentCount = document.getElementById('contentCount');
            const previewToggle = document.getElementById('previewToggle');
            const previewSection = document.getElementById('previewSection');
            const previewTitle = document.getElementById('previewTitle');
            const previewContent = document.getElementById('previewContent');
            const updateBtn = document.getElementById('updateBtn');
            const form = document.getElementById('editForm');

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
            titleInput.addEventListener('input', () => {
                updateCharCount(titleInput, titleCount, 200);
                previewTitle.textContent = titleInput.value;
            });

            contentInput.addEventListener('input', () => {
                updateCharCount(contentInput, contentCount, 5000);
                previewContent.textContent = contentInput.value;
            });

            // Preview functionality
            previewToggle.addEventListener('click', function() {
                if (previewSection.classList.contains('show')) {
                    previewSection.classList.remove('show');
                    previewToggle.innerHTML = '<span>👁️</span><span>Preview Changes</span>';
                } else {
                    previewTitle.textContent = titleInput.value || 'No title yet...';
                    previewContent.textContent = contentInput.value || 'No content yet...';
                    previewSection.classList.add('show');
                    previewToggle.innerHTML = '<span>👁️</span><span>Hide Preview</span>';
                }
            });

            // Auto-resize textarea
            contentInput.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight + 2) + 'px';
            });

            // Trigger initial resize
            setTimeout(() => {
                contentInput.style.height = 'auto';
                contentInput.style.height = (contentInput.scrollHeight + 2) + 'px';
            }, 100);

            // Form submission handler
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    // Add visual feedback for invalid fields
                    const invalidFields = form.querySelectorAll(':invalid');
                    invalidFields.forEach(field => {
                        field.style.borderColor = 'var(--danger)';
                        field.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.1)';
                    });
                } else {
                    // Add loading state
                    updateBtn.classList.add('loading');
                    updateBtn.innerHTML = '<span class="btn-icon">⏳</span><span>Updating...</span>';
                    updateBtn.disabled = true;
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

            // Show preview initially if there's content
            if (titleInput.value || contentInput.value) {
                previewTitle.textContent = titleInput.value;
                previewContent.textContent = contentInput.value;
            }
        });
    </script>
@endsection
