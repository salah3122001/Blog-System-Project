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
        }

        body {
            background: linear-gradient(135deg, #f6f7fb 0%, #f1f5f9 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .container-custom {
            max-width: 900px;
            margin: 0 auto;
        }

        /* Post Card */
        .post-card {
            border-radius: 20px;
            border: none;
            overflow: hidden;
            background: white;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 25px;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(79, 70, 229, 0.15);
        }

        .post-header {
            background: var(--gradient);
            padding: 35px 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .post-header::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30%, -30%);
        }

        .post-header h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .post-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
            opacity: 0.95;
        }

        .author-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            padding: 6px 12px;
            border-radius: 50px;
            backdrop-filter: blur(10px);
        }

        .post-content {
            padding: 40px;
            line-height: 1.8;
            color: #334155;
            font-size: 16px;
        }

        .post-content p {
            margin-bottom: 1.5rem;
            white-space: pre-line;
        }

        /* Actions */
        .actions-container {
            padding: 0 40px 30px;
        }

        .btn-action {
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
            border: 2px solid transparent;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-edit {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #d97706, #b45309);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(245, 158, 11, 0.3);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(239, 68, 68, 0.3);
        }

        /* Comments Section */
        .comments-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 40px 0 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e2e8f0;
        }

        .comments-header h4 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .comment-count {
            background: var(--gradient);
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
        }

        /* Comment Card */
        .comment-card {
            background: white;
            border-radius: 16px;
            border: none;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: var(--shadow-sm);
            transition: all 0.2s ease;
            border-left: 4px solid var(--primary);
        }

        .comment-card:hover {
            transform: translateX(5px);
            box-shadow: var(--shadow-md);
            border-left-color: var(--secondary);
        }

        .comment-content {
            color: #475569;
            line-height: 1.6;
            margin-bottom: 15px;
            white-space: pre-line;
        }

        .comment-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 13px;
        }

        .comment-author {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #64748b;
        }

        .author-avatar {
            width: 32px;
            height: 32px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 14px;
        }

        .comment-time {
            color: #94a3b8;
            font-size: 12px;
        }

        .btn-comment-delete {
            background: transparent;
            border: 1px solid #fecaca;
            color: #ef4444;
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-comment-delete:hover {
            background: #fee2e2;
            border-color: #fca5a5;
        }

        /* No Comments */
        .no-comments {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
        }

        .no-comments-icon {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
        }

        /* Add Comment Form */
        .add-comment-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: var(--shadow-md);
            margin-top: 30px;
            border-top: 3px solid var(--primary);
        }

        .form-label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-control-custom {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px;
            font-size: 15px;
            transition: all 0.2s;
            background: #f8fafc;
            min-height: 120px;
            resize: vertical;
        }

        .form-control-custom:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            background: white;
            outline: none;
        }

        .form-control-custom::placeholder {
            color: #94a3b8;
        }

        .btn-submit {
            background: var(--gradient);
            border: none;
            border-radius: 12px;
            padding: 14px 30px;
            font-weight: 600;
            font-size: 15px;
            color: white;
            width: 100%;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.25);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .post-header {
                padding: 25px 20px;
            }

            .post-header h1 {
                font-size: 1.8rem;
            }

            .post-content {
                padding: 25px 20px;
            }

            .actions-container {
                padding: 0 20px 25px;
            }

            .comment-card {
                padding: 20px;
            }

            .add-comment-card {
                padding: 20px;
            }

            .comment-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }

        /* Divider */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 30px 0;
        }

        /* Loading States */
        .btn-action:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none !important;
        }
    </style>

    <div class="container container-custom py-5">

        {{-- Post Card --}}
        <div class="card post-card">
            <div class="post-header">
                <h1>{{ $post->title }}</h1>
                <div class="post-meta">
                    <span class="author-badge">
                        👤 {{ $post->user->name }}
                    </span>
                    <span class="text-white-50">•</span>
                    <span>📅 {{ $post->created_at->format('F d, Y') }}</span>
                    <span class="text-white-50">•</span>
                    <span>🕒 {{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>

            <div class="post-content">
                <p>{{ $post->content }}</p>
            </div>

            {{-- Actions for post owner --}}
            @if ($post->user_id === auth()->id())
                <div class="actions-container">
                    <div class="d-flex gap-3">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-edit btn-action">
                            <span>✏️</span>
                            <span>Edit Post</span>
                        </a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete btn-action"
                                onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                                <span>🗑️</span>
                                <span>Delete Post</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>

        {{-- Comments Section --}}
        <div class="comments-header">
            <div class="comment-count">{{ $post->comments->count() }}</div>
            <h4>💬 Comments</h4>
        </div>

        @forelse($post->comments as $comment)
            <div class="card comment-card">
                <div class="comment-content">
                    {{ $comment->content }}
                </div>

                <div class="comment-meta">
                    <div class="comment-author">
                        <div class="author-avatar">
                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                        </div>
                        <span>{{ $comment->user->name }}</span>
                        <span class="text-muted">•</span>
                        <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>

                    @if ($comment->user_id === auth()->id())
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-comment-delete"
                                onclick="return confirm('Delete this comment?')">
                                Delete
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="no-comments">
                <div class="no-comments-icon">💭</div>
                <h5 class="text-muted mb-2">No comments yet</h5>
                <p class="text-muted">Be the first to share your thoughts!</p>
            </div>
        @endforelse

        {{-- Add Comment Form --}}
        <div class="add-comment-card">
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        <span>💬</span>
                        <span>Add a Comment</span>
                    </label>
                    <textarea name="content" class="form-control form-control-custom" rows="4" placeholder="Share your thoughts..."
                        required></textarea>
                </div>

                <button type="submit" class="btn btn-submit">
                    <span>📤</span>
                    <span>Post Comment</span>
                </button>
            </form>
        </div>

    </div>
@endsection
