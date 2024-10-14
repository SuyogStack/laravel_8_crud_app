<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class AppController extends Controller
{
    //
    public function index(){

        $users = User::all();

        return view('index',compact('users'));
    }

    public function store(Request $request){    
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
    
        // Handle file upload if the file is present
        if ($request->hasFile('fileToUploadImage')) {
            // Store the uploaded file in a folder, e.g., 'public/user_profile'
         
            $file = $request->file('fileToUploadImage');
            $filename = time() . '_' . $file->getClientOriginalName(); // Create unique file name
            $file->move(public_path('user_profile'), $filename); // Save file to 'user_profile' folder
        } else {
            $filename = null; // No image uploaded
        }
    
        // Capture the form data
      
        $data['name'] = $request->name; 
        $data['email'] = $request->email; 
        $data['phone'] = $request->phone; 
        $data['password'] = $request->password; 
        $data['image'] = $filename; 
     
        // Hash the password before saving it
        // $data['password'] = bcrypt($request->password);
    
        // Create a new user record in the database
        User::create($data);

        return redirect()->route('index')->with('success','User created successfully.');

    }

    public function getData(Request $request){  
       $recordId = $request->input('record_id');
        // Find the record by ID
        $record = User::find($recordId);
        
        return $record;
        
    }

    public function updateData(Request $request){  
      
        $record = User::find($request->recordId);
        // dd($record->password);
        if (!$record) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        $request->validate([
            'updatename' => 'required',
            'updateemail' => 'required',
        ]);

         // Handle file upload if the file is present
         if ($request->hasFile('fileToUploadImageupdate')) {
            // Store the uploaded file in a folder, e.g., 'public/user_profile'
         
            $file = $request->file('fileToUploadImageupdate');
            $filename = time() . '_' . $file->getClientOriginalName(); // Create unique file name
            $file->move(public_path('user_profile'), $filename); // Save file to 'user_profile' folder
        } else {
            $filename = null; // No image uploaded
        }

        if($request->updatepassword==null)
        {
            // echo "IN";
            $record->name = $request->input('updatename');
            $record->email = $request->input('updateemail');
            $record->phone = $request->input('updatephone');
            $record->password = $record->password;
            $record->image = $filename;
        }
        else{
            // echo "IN 22";
            $record->name = $request->input('updatename');
            $record->email = $request->input('updateemail');
            $record->phone = $request->input('updatephone');
            $record->password = $request->input('updatepassword');
            $record->image = $filename;
        }
        // dd();
        // dd($record);
        $record->save();  // Save changes to the database
        return redirect()->back()->with('success', 'Record updated successfully.');

    }
    public function deleteData(Request $request){  
       
        $recordId = $request->input('record_id');
        // Find the record by ID
        $record = User::find($recordId);

        if ($record) {
            $record->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Record deleted successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Record not found.'
            ], 404);
        }
        
    }

    public function uploadfile(Request $request)
    {
        $xmlFile = $request->file('fileToUpload');
       
        if($xmlFile)
        {
            // Load and parse the XML content
            $xmlContent = simplexml_load_file($xmlFile);
    
            // Convert the XML object to JSON and then to an associative array
            $xmlArray = json_decode(json_encode($xmlContent), true);
           
            // Save XML data to database (for example, using the UserProfile model)
            foreach ($xmlArray['User'] as $user) 
            {
                $chekEmail = User::select('id')->where('email',addslashes($user['Email']))->count();
                // dd($chekEmail);
                if($chekEmail=="0")
                {
                    User::create([
                        'name'     => addslashes($user['Name']),
                        'email'    => addslashes($user['Email']),
                        'phone'    => addslashes($user['Phone']),
                        'password' => addslashes($user['Password']),
                    ]);
                }
    
            }
            return back()->with('success', 'XML file processed and data saved successfully.');
            
        }
        else
        {
            return back();
        }

        // Redirect back with success message
    }
}
