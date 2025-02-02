<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $reports = Report::with('user')->get();

        // Собираем полное имя для каждого пользователя
        foreach ($reports as $report) {
            $report->user->full_name = $report->user->name . ' ' . $report->user->middlename . ' ' . $report->user->lastname;
        }

        return view('admin-panel', compact('reports'));
    }

    public function confirm($id)
    {
        $report = Report::findOrFail($id);
        $report->status = Report::STATUS_COMPLETED;
        $report->save();
    }

    public function cancel(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:255',
        ]);

        $report = Report::findOrFail($id);
        $report->status = Report::STATUS_CANCELLED;
        $report->rejection_reason = $request->rejection_reason;
        $report->save();

        return redirect()->back()->with('success', 'Заявка отклонена.');
    }
}
