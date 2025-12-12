@extends('layouts.app')

@section('content')
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

    .posts-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    /* Hero Header */
    .hero-header {
        background: var(--gradient);
        border-radius: 20px;
        padding: 40px;
        color: white;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }

    .hero-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 200%;
        background: linear-gradient(transparent, rgba(255,255,255,0.1), transparent);
        transform: rotate(30deg);
        animation: shimmer 3s infinite linear;
    }

    @keyframes shimmer {
        0% { transform: rotate(30deg) translateX(-100%); }
        100% { transform: rotate(30deg) translateX(100%); }
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 10px;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 1.1rem;
        opacity: 0.95;
        max-width: 600px;
        margin-bottom: 25px;
    }

    .post-count {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        padding: 8px 16px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Create Post Button */
    .btn-create-container {
        text-align: right;
        margin-bottom: 30px;
    }

    .btn-create {
        background: var(--gradient);
        border: none;
        border-radius: 12px;
        padding: 14px 28px;
        font-weight: 600;
        font-size: 15px;
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-md);
        position: relative;
        overflow: hidden;
    }

    .btn-create::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.7s ease;
    }

    .btn-create:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(79, 70, 229, 0.3);
        color: white;
        text-decoration: none;
    }

    .btn-create:hover::before {
        left: 100%;
    }

    /* Posts Grid */
    .posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    /* Post Card */
    .post-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .post-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(79, 70, 229, 0.15);
        z-index: 2;
    }

    .post-header {
        padding: 25px 25px 0;
    }

    .post-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 15px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .post-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
        font-size: 13px;
        color: #64748b;
    }

    .author-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f1f5f9;
        padding: 4px 10px;
        border-radius: 50px;
        font-weight: 500;
    }

    .post-content {
        padding: 0 25px 20px;
        flex-grow: 1;
    }

    .post-excerpt {
        color: #475569;
        line-height: 1.6;
        font-size: 14.5px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .post-footer {
        padding: 0 25px 25px;
        border-top: 1px solid #f1f5f9;
        padding-top: 20px;
    }

    .post-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    /* Buttons */
    .btn-view {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
        flex: 1;
        justify-content: center;
    }

    .btn-view:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        color: white;
        text-decoration: none;
    }

    .btn-edit {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
        flex: 1;
        justify-content: center;
    }

    .btn-edit:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        color: white;
        text-decoration: none;
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.2s ease;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        cursor: pointer;
    }

    .btn-delete:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        margin: 40px 0;
    }

    .empty-icon {
        font-size: 64px;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-title {
        font-size: 1.5rem;
        color: #475569;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .empty-subtitle {
        color: #94a3b8;
        max-width: 400px;
        margin: 0 auto 25px;
        line-height: 1.6;
    }

    /* Badges */
    .category-badge {
        display: inline-block;
        background: var(--gradient);
        color: white;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 600;
        margin-left: 8px;
        vertical-align: middle;
    }

    /* Pagination (if using) */
    .pagination-container {
        text-align: center;
        margin-top: 40px;
    }

    .pagination .page-item.active .page-link {
        background: var(--gradient);
        border-color: var(--primary);
    }

    .pagination .page-link {
        border: 1px solid #e2e8f0;
        color: var(--primary);
        padding: 8px 16px;
        margin: 0 4px;
        border-radius: 8px;
        transition: all 0.2s;
    }

    .pagination .page-link:hover {
        background: #f1f5f9;
        border-color: var(--primary);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .posts-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .hero-header {
            padding: 30px 20px;
            margin-bottom: 30px;
        }

        .hero-title {
            font-size: 2.2rem;
        }

        .btn-create {
            width: 100%;
            justify-content: center;
            padding: 12px 20px;
        }

        .post-actions {
            flex-direction: column;
        }

        .post-actions a, .post-actions button {
            width: 100%;
        }
    }

    /* Loading Animation */
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    .loading {
        animation: pulse 1.5s ease-in-out infinite;
    }
</style>

<div class="container posts-container py-5">

    {{-- Hero Header --}}
    <div class="hero-header">
        <div class="hero-content">
            <h1 class="hero-title">📚 Discover Amazing Posts</h1>
            <p class="hero-subtitle">
                Explore stories, ideas, and knowledge shared by our creative community.
                Join the conversation and share your thoughts!
            </p>
            <div class="post-count">
                <span>📊</span>
                <span>{{ $posts->count() }} Posts Published</span>
            </div>
        </div>
    </div>

    {{-- Create Post Button --}}
    <div class="btn-create-container">
        <a href="{{ route('posts.create') }}" class="btn-create">
            <span>✨</span>
            <span>Create New Post</span>
        </a>
    </div>

    {{-- Posts Grid --}}
    @if($posts->count() > 0)
        <div class="posts-grid">
            @foreach($posts as $post)
                <div class="post-card">
                    <div class="post-header">
                        <h3 class="post-title">
                            {{ $post->title }}
                            @if($post->user_id === auth()->id())
                                <span class="category-badge">Yours</span>
                            @endif
                        </h3>

                        <div class="post-meta">
                            <span class="author-badge">
                                <span>👤</span>
                                <span>{{ $post->user->name }}</span>
                            </span>
                            <span class="text-muted">•</span>
                            <span>📅 {{ $post->created_at->format('M d, Y') }}</span>
                            <span class="text-muted">•</span>
                            <span>🕒 {{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <div class="post-content">
                        <p class="post-excerpt">
                            {{ Str::limit($post->content, 150) }}
                        </p>
                    </div>

                    <div class="post-footer">
                        <div class="post-actions">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn-view">
                                <span>👁️</span>
                                <span>View Post</span>
                            </a>

                            @if($post->user_id === auth()->id())
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn-edit">
                                    <span>✏️</span>
                                    <span>Edit</span>
                                </a>

                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                      style="display: contents;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn-delete"
                                            onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                                        <span>🗑️</span>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        {{-- Empty State --}}
        <div class="empty-state">
            <div class="empty-icon">📝</div>
            <h3 class="empty-title">No Posts Yet</h3>
            <p class="empty-subtitle">
                The blog is waiting for your first post!
                Share your knowledge, stories, or ideas with the community.
            </p>
            <a href="{{ route('posts.create') }}" class="btn-create">
                <span>✨</span>
                <span>Create Your First Post</span>
            </a>
        </div>
    @endif

    {{-- Pagination (if you're using it) --}}
    @if(method_exists($posts, 'links'))
        <div class="pagination-container">
            {{ $posts->links() }}
        </div>
    @endif

</div>

<script>
    // Add subtle hover effects
    document.addEventListener('DOMContentLoaded', function() {
        const postCards = document.querySelectorAll('.post-card');

        postCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.zIndex = '10';
            });

            card.addEventListener('mouseleave', () => {
                card.style.zIndex = '1';
            });
        });

        // Add loading state to delete buttons
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                if (confirm('Are you sure you want to delete this post?')) {
                    this.innerHTML = '<span>⏳</span><span>Deleting...</span>';
                    this.classList.add('loading');
                } else {
                    e.preventDefault();
                }
            });
        });
    });
</script>
@endsection
