<?php

// namespace App\Http\Controllers\API;

// use App\Models\Country;
// use Illuminate\Http\Request;
// use App\Models\CrudOperations;
// use Exception;
// use Illuminate\Http\JsonResponse;
// use Illuminate\Routing\Controller;

// class ApiCrudOperations extends Controller
// {
//     public function index(): JsonResponse
//     {
//         try {

//             $users = CrudOperations::with('getCountry')->paginate('5'); //with('getCountry') country get through relation public function in model 
//             return response()->json(['status' => 200, 'message' => 'Data Retrieved Successfully.', 'data' => $users]);
//         } catch (\Exception $ex) {
//             return response()->json(['status' => 500, 'message' => $ex->getMessage(), 'data' => null]);
//         }
//     }
//     public function create(): JsonResponse
//     {
//         try {
//             $countries = Country::all();
//             return response()->json(['status' => 200, 'message' => 'Data Retrieved Successfully.', 'data' => $countries]);
//         } catch (\Exception $ex) {
//             return response()->json(['status' => 500, 'message' => $ex->getMessage(), 'data' => null]);
//         }
//     }
//     public function store(Request $request)
//     {
//         try{

//             // $this->validate($request, [
//             //     'first_name' => 'required|min:5|max:10|string',
//             //     'last_name' => 'required|min:5|max:10|string|different:first_name',
//             //     'email' => 'required|email|unique:crud_operations,email',
//             //     'contact' => 'numeric|nullable',
//             //     'address' => 'nullable|string|max:100', // Corrected the max length rule
//             //     'country' => 'required|exists:countries,id',
//             //     'gender' => 'required|in:Male,Female',
//             //     'hobbies' => 'required|array',
//             //     'hobbies.*' => 'string', // Ensuring each hobby is a string
//             //     'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             // ]);
    
//             $requestData = $request->all();
//                 if(!empty($requestData['profile'])){
                    
//                     // image upload code start
//                     $imgName = 'lV' . rand() . '.' . $request->profile->extension();
//                     $request->profile->move(public_path('profiles/'), $imgName);
//                     $requestData['profile'] = $imgName;
//                     // image upload code end
//                 }
    
//             $store = CrudOperations::create($requestData);
//             return response()->json(['status' => 200, 'message' => 'user data stored Successfully.', 'data' => $store]);
//         }catch(\Exception $ex){
//             return response()->json(['status' => 500, 'message' => $ex->getMessage(), 'data' => null]);

//         }

//     }
//     public function edit(CrudOperations $apiCrud)
//     {
//         try {

//             $countries = Country::all();
//             return response()->json(['status' => 200, 'message' => 'user data updated Successfully.', 'data' => ['user_data' => $apiCrud, 'countries'=>$countries]]);
//         }
//         catch(\Exception $ex){
//             return response()->json(['status' => 500, 'message' => $ex->getMessage(), 'data' => null]);

//         }
//     }
//     public function update(Request $request, CrudOperations $apiCrud)
//     {
//         try{

//             $apiCrud->first_name = $request->first_name ?? $apiCrud->first_name;
//             $apiCrud->last_name = $request->last_name ?? $apiCrud->last_name;
//             $apiCrud->email = $request->email ?? $apiCrud->email;
//             $apiCrud->contact = $request->contact ?? $apiCrud->contact;
//             $apiCrud->address = $request->address ?? $apiCrud->address;
//             $apiCrud->country = $request->country ?? $apiCrud->country;
//             $apiCrud->gender = $request->gender ?? $apiCrud->gender;
//             $apiCrud->hobbies = $request->hobbies ?? $apiCrud->hobbies_arr;
//             $apiCrud->save();
//             return response()->json(['status' => 200, 'message' => 'user data updated Successfully.', 'data' => $apiCrud]);

//         }catch(\Exception $ex){
//             return response()->json(['status' => 500, 'message' => $ex->getMessage(), 'data' => null]);

//         }
//     }
//     public function destroy(CrudOperations $apiCrud)
//     {
//         try{
//             $apiCrud->delete();
//             return response()->json(['status' => 200, 'message' => 'User Deleted successfully.', 'data' => $apiCrud]);
//         } catch(\Exception $ex){
//             return response()->json(['status' => 500, 'message' => $ex->getMessage(), 'data' => null ]);
//         }
//     }
// }

