<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CrudOperations;
use Illuminate\Http\Request;

class CrudOperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = CrudOperations::with('getCountry')->paginate('5'); //with('getCountry') country get through relation public function in model 
        return view('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('registration', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:5|max:10|string',
            'last_name' => 'required|min:5|max:10|string|different:first_name',
            'email' => 'required|email|unique:crud_operations,email',
            'contact' => 'numeric|nullable',
            'address' => 'nullable|string|max:100', // Corrected the max length rule
            'country' => 'required|exists:countries,id',
            'gender' => 'required|in:Male,Female',
            'hobbies' => 'required|array',
            'hobbies.*' => 'string', // Ensuring each hobby is a string
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $requestData = $request->except(['_token']);

        // image upload code start
        $imgName = 'lV' . rand() . '.' . $request->profile->extension();
        $request->profile->move(public_path('profiles/'), $imgName);
        $requestData['profile'] = $imgName;
        // image upload code end

        $store = CrudOperations::create($requestData);
        return redirect()->route('crud.index')->with('success', 'User Inserted successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrudOperations  $crudOperations
     * @return \Illuminate\Http\Response
     */
    public function show(CrudOperations $crud)
    {
        $countries = Country::all();
        return view('show', compact('countries', 'crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrudOperations  $crudOperations
     * @return \Illuminate\Http\Response
     */
    public function edit(CrudOperations $crud)
    {
        $countries = Country::all();
        return view('edit', compact('countries', 'crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrudOperations  $crudOperations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CrudOperations $crud)
    {
        $crud->first_name = $request->first_name ?? $crud->first_name;
        $crud->last_name = $request->last_name ?? $crud->last_name;
        $crud->email = $request->email ?? $crud->email;
        $crud->contact = $request->contact ?? $crud->contact;
        $crud->address = $request->address ?? $crud->address;
        $crud->country = $request->country ?? $crud->country;
        $crud->gender = $request->gender ?? $crud->gender;
        $crud->hobbies = $request->hobbies ?? $crud->hobbies_arr;
        if (isset($request->profile)) {
            // image upload code start
            $imgName = 'lV' . rand() . '.' . $request->profile->extension();
            $request->profile->move(public_path('profiles/'), $imgName);
            $crud->profile = $imgName;
            // image upload code end
        }
        $crud->save();
        return redirect()->route('crud.index')->with('success', 'User Edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrudOperations  $crudOperations
     * @return \Illuminate\Http\Response
     */
    public function destroy(CrudOperations $crud)
    {
        $crud->delete();
        return redirect()->route('crud.index')->with('danger', 'User Deleted successfully.');
    }
}
