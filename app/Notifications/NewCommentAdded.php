<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentAdded extends Notification
{
    use Queueable;
    protected $comment;
    protected $post;

    /**
     * Create a new notification instance.
     */
    public function __construct($post, $comment)
    {
        //
        $this->post = $post;
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Comment on Your Post') 
            ->greeting('Hello ' . $notifiable->name)
            ->line('A new comment was added to your post:')
            ->line('Post: ' . $this->post->title)
            ->line('Comment: ' . $this->comment->content)
            ->action('View Post', url('/posts/' . $this->post->id))
            ->line('Thank you for using our blog!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
