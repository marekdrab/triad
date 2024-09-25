<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;

class UploadController extends Controller
{
    public function uploadCv(Request $request)
    {

        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cv' => 'required|mimes:pdf,jpg,jpeg,png,doc,docx|max:5096', // 2MB max size
            'work_description' => 'required|string|max:1000',
            'gdpr' => 'accepted',
        ]);

        // Handle file upload
        if ($request->hasFile('cv')) {
            // Define the folder where the file will be stored
            $folder = 'uploads/cv-files';

            // Store the file in the specified folder (storage/app/public/uploads/cv-files)
            $path = $request->file('cv')->store($folder, 'public');

            // Save the file info and other form data into the database
            $submission = Submission::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'work_description' => $request->input('work_description'),
                'file_path' => $path,  // Save the file path in the database
            ]);

            // Return a success response
            return response()->json(['success' => true, 'submission' => $submission]);
        }

        return response()->json(['success' => false, 'message' => 'File upload failed'], 400);
    }
}
