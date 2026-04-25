<?php
/*
========================================
File: MessageScheduleController.php

Description:
Controller responsible for managing course chat messages
within the system (sending, displaying, retrieving, and deleting messages).

Purpose:
- Handles real-time-like messaging per course
- Stores and retrieves student/doctor/admin messages
- Provides JSON API for chat interface
- Restricts deletion of all messages to admin users only

Main Functions:

- show($courseId):
  Retrieves course data and all related messages
  ordered by creation time (ascending)
  and returns course content page with chat data

- send(Request $request, $courseId):
  Validates and stores a new message
  linked to the authenticated user and course
  then redirects back with chat opened

- messages($courseId):
  Returns all messages for a course as JSON response
  including:
  - message id
  - user id
  - user name
  - message content
  - formatted timestamp

- deleteAll():
  Deletes all messages from the system
  only allowed for admin users

Validation Rules:
- message: required string, max 1000 characters

Access Control:
- Only admin users can delete all messages

Data Structure:
- Messages belong to:
  - Course (course_id)
  - User (user_id)

Author:
Dina Salah

Notes:
- Supports chat-like interface per course
- Uses Laravel authentication for message ownership
- Messages are ordered chronologically for conversation flow
========================================
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaterialsSchedule;
use App\Models\MessageSchedule;
use Illuminate\Support\Facades\Auth;
use App\Models\course;


class MessageScheduleController extends Controller
{
    public function show($courseId)
    {
        $course = Course::findOrFail($courseId);
        $messages = MessageSchedule::with('user')
            ->where('course_id', $courseId)
            ->orderBy('created_at', 'asc')
            ->get();
        $materialId = null;
        $studentsCount = $course->students()->count();
        $user = Auth::user();
        return view('subj-contant', compact('course', 'messages', 'studentsCount', 'materialId', 'user'));
    }

    public function send(Request $request, $courseId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);
        MessageSchedule::create([
            'course_id' => $courseId,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);
        return redirect()->route('subj-contant', $courseId)->with('openChat', true);
    }

    public function messages($courseId)
    {
        $messages = MessageSchedule::with('user')
            ->where('course_id', $courseId)
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($msg) {
                return [
                    'id' => $msg->id,
                    'user_id' => $msg->user_id,
                    'user_name' => $msg->user->name ?? 'User',
                    'message' => $msg->message,
                    'created_at' => $msg->created_at->format('h:i a'),
                ];
            });
        return response()->json($messages);
    }

    public function deleteAll()
    {
        $user = Auth::user();
        if (!$user->is_admin) {
            abort(403, 'ليس لديك صلاحية حذف الرسائل');
        }
        MessageSchedule::truncate();
        return back()->with('success', 'تم حذف جميع الرسائل');
    }
}
