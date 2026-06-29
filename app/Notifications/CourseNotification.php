<?php
/*
========================================
File: CourseNotification.php

Description:
Laravel notification class used to send
course-related notifications to users.

Features:
- Stores notification data in the database
- Contains title, message, and course ID
- Uses Laravel Notification system

Channels:
- database (stores notifications in DB only)

Constructor Parameters:
- $title: Notification title
- $message: Notification content
- $course_id: Related course ID

Author:
Christin Mokbel

Notes:
- Implements Queueable trait for future queue support
- Returns structured array data for database storage
========================================
*/
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CourseNotification extends Notification
{
    use Queueable;
    protected $title;
    protected $message;
    protected $course_id;
    /**
     * Create a new notification instance.
     */
    public function __construct($title,$message,$course_id)
    {
        $this->title = $title;
        $this->message = $message;
        $this->course_id = $course_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title'=>$this->title,
            'message'=>$this->message,
            'course_id'=>$this->course_id
        ];
    }
}
