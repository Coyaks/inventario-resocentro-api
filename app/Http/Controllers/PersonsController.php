<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\PersonsDto;
use App\Models\person;
use App\Http\Requests\personsRequest;
use App\Services\PersonsService;

class PersonsController extends Controller
{

    public function __construct(
        protected PersonsService $service
    )
    {

    }

    public function index()
    {
        return 'test index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(personsRequest $request)
    {
        return $request;
        $data = $this->service->store(
            PersonsDto::fromApiRequest($request)
        );
        //return $this->sendResponse($data, "succesfull");
    }

    /**
     * Display the specified resource.
     */
    public function show(person $persons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(person $persons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepersonsRequest $request, person $persons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(person $persons)
    {
        //
    }
}
