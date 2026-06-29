<?php
/*
========================================
File: NotificationController.php

Description:
Controller responsible for managing user notifications
within the system (viewing, marking as read, and deleting).

Purpose:
- Handles retrieval of authenticated user notifications
- Manages notification state (read/unread)
- Allows deletion of single or all notifications
- Provides notification management UI support

Main Functions:

- index():
  Retrieves paginated notifications for the authenticated user
  and displays them in the notifications page

- markAsRead($id):
  Marks a specific notification as read
  for the authenticated user

- deleteAll():
  Deletes all notifications for the authenticated user

- destroy($id):
  Deletes a specific notification for the authenticated user

Access Control:
- All operations are restricted to the authenticated user only
- Users can only manage their own notifications

Data Source:
- Uses Laravel built-in notifications system

Author:
Christin Mokbel

Notes:
- Supports pagination for better UI performance
- Ensures secure access using Auth::user()
- Each notification is scoped per user (not global)
========================================
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

use App\Models\MaterialsSchedule;
use App\Models\course;
use App\Models\User;

class NotificationController extends Controller
{
    use Notifiable;
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $notifications = $user->notifications()->paginate(15);
        return view('pages-notifications', compact('notifications'));
    }

    public function markAsRead($id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $notification = $user->notifications()
            ->where('id', $id)
            ->first();
        if ($notification) {
            $notification->markAsRead();
        }
        return back();
    }

    public function deleteAll()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->notifications()->delete();
        return back()->with('success', 'تم حذف جميع الإشعارات');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $notification = $user->notifications
            ->where('id', $id)
            ->first();
        if ($notification) {
            $notification->delete();
        }
        return back()->with('success', 'تم حذف الإشعار');
    }
}
