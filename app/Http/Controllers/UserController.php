<?php

namespace App\Http\Controllers;
use App\Models\PurchasedPlan;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:users,name', 
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required', 
            'phone_number' => 'max:12'
        ], [
            'name.required' => 'Name is required',
            'name.unique' => 'This name is already taken.',
            'name.max' => 'Name cannot be longer than 255 characters.',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Passwords do not match.',
            'password_confirmation.required' => 'Please confirm your password.',
            'phone_number.max' => 'Phone Number must be 12 digit' 
    
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'), 
            'phone_number' => $request->input('phone_number')
        ]);

        PurchasedPlan::create([
            'plan_id' => 1,
            'user_id' => $user->id,
            'allowed_ads' => 5
        ]);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    public function login(Request $request){
        
        $data = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            
        ])->validate();
    
       
        if(Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ])){
            return redirect()->route('home');  
        }
        else {
            return redirect()->route('login')  
                   ->withErrors(['login' => 'Invalid Email or Password!']);
        }
    }
    public function logout(Request $request){
        Auth::logout();
       return redirect()->route('home');
    }

 
    public function update(Request $request)
    {
        $rules = [
            'upload_img' => 'sometimes|image|mimes:jpeg,jpg,webp,png',
            'name' => [
                    'required',
                    'string',
                    'max:100',
                    Rule::unique('users', 'name')->ignore(auth()->id()),
                ],
             'email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore(auth()->id()),
                ],
            'password' => 'nullable|min:8',
        ];

        $customMessages = [
            'upload_img.image' => 'File should be an image',
            'upload_img.mimes' => 'Only JPEG, JPG, WEBP, PNG images are allowed',
            'name.unique' => 'Username must be unique',
            'email.unique' => 'Email is already taken',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();



        if ($request->hasFile('upload_profile')) {
            $file = $request->file('upload_profile');
            $filename = $user->name . '.' . $file->getClientOriginalExtension();
            if(Storage::disk('public')->exists($user->profile_img)){
                
                $isDel = Storage::disk('public')->delete($user->profile_img);
                if(!$isDel){
                    return abort(503,"File Deletion failed");
                }
                $path = Storage::disk('public')->putFileAs('uploads/profiles', $file, $filename);
                $user->profile_img = $path;
                
            }
            else{
                $path = Storage::disk('public')->putFileAs('uploads/profiles', $file,  $filename);
                $user->profile_img = $path; 
            }
        }



        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if (!$user->save()) {
            return abort(503, 'User update failed.');
        }

        return redirect()->back()->with('success', 'Information updated successfully.');
    }

    
}
