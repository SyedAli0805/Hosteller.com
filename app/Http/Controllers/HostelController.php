<?php
namespace App\Http\Controllers;

use App\Models\Hostel; // Assuming Hostel model exists
use Illuminate\Http\Request;

class HostelController extends Controller
{
    /**
     * Retrieve all hostels.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hostels = Hostel::all();
        return view('test', ['hostels' => $hostels]);
    }

    /**
     * Search hostels by location or name using wildcards.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

}
