<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactRequest;
use App\Models\RequestService;
use App\Models\RequestType;
use App\Models\RequestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requestTypes =RequestType::all();
       $requestServices =RequestService::all();
        return view('website.requests.create',compact('requestTypes','requestServices'));
    }

    // public function create()
    // {
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactRequest $request, RequestUser $requestUser)
    {
        
         $data = $request->all();
        try {
            DB::beginTransaction();
            $requestUser->create($data);
            DB::commit();
            return redirect()->back()->with('success', 'Successfully Send Contact Request');

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error On Send Contact Request');

        }
    }


    // /**
    //  * Display the specified resource.
    //  */
    // public function show(RequestUser $requestUser)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(RequestUser $requestUser)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, RequestUser $requestUser)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(RequestUser $requestUser)
    // {
    //     //
    // }
}
