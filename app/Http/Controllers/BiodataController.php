<?php

// BiodataController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata; // Add this line to use the Biodata model

class BiodataController extends Controller
{
    public function create()
    {
        return view('biodata');
    }

    public function store(Request $request)
    {
        // Validate the input data
        $this->validate($request, [
            'nama' => 'equired|string',
            'email' => 'equired|email',
            'no_hp' => 'equired|string',
        ]);

        // Create a new biodata instance
        $biodata = new Biodata();
        $biodata->nama = $request->input('nama');
        $biodata->email = $request->input('email');
        $biodata->no_hp = $request->input('no_hp');

        // Save the biodata instance
        $biodata->save();

        // Redirect to a success page or display a success message
        return redirect()->route('biodata.success')->with('success', 'Biodata berhasil ditambahkan!');
    }
}
