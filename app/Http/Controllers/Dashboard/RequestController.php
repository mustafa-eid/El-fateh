<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactRequest;
use App\Models\RequestUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = RequestUser::query();

        if ($request->has('period')) {
            $period = $request->input('period');
            $now = Carbon::now();

            if ($period == 'daily') {
                $query->whereDate('created_at', $now->format('Y-m-d'));
            } elseif ($period == 'weekly') {
                $startOfWeek = $now->copy()->startOfWeek(Carbon::SATURDAY)->startOfDay();
                $endOfWeek = $now->copy()->endOfWeek(Carbon::FRIDAY)->endOfDay();
                $query->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
            } elseif ($period == 'monthly') {
                $query->whereMonth('created_at', $now->format('m'))->whereYear('created_at', $now->format('Y'));
            }
        }

        $requests = $query->with(['requestType','requestService'])->get();

        return view('dashboard.userRequests.index', compact('requests'));
    }


    public function destroy(RequestUser $contactRequest)
    {
        //        dd($contactRequest);
        $contactRequest->delete();
        return redirect()->back()->with('success', 'Successfully Deleted Contact Request');
    }
}
