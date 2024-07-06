<?php

namespace App\Http\Controllers;

use App\Actions\Notification\ReadNotification;
use Illuminate\View\View;
use App\Helpers\DateHelper;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class NotificationController extends Controller
{
    /**
     * Retrieves the user's notifications and groups them by the activity date label.
     *
     * @param Request $request The HTTP request object.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View The view for displaying the notifications.
     */
    public function index(Request $request): View
    {
        $userNotifications = $request->user()->notifications;
        $groupedNotifications = $userNotifications->groupBy(fn ($notif) => DateHelper::getActivityDateLabel($notif->created_at));

        return view('dashboard.notification.index', compact('groupedNotifications'));
    }


    /**
     * Read all or specified notification.
     *
     * @param Request $request The HTTP request object.
     * @param ReadNotification $action The action to handle the notification read.
     * @param string|null $id The ID of the notification to mark as read. Default is null.
     * @return RedirectResponse The redirect response to the notification index page.
     */
    public function read(Request $request, ReadNotification $action, ?string $id = null): RedirectResponse
    {
        $action->handle($request->user(), $id);

        return to_route('notification.index');
    }
}
