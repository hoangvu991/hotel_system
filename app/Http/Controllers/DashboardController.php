<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $count_Booking = Booking::all()->count();
        $count_Customer = Customer::all()->count();
        $count_Room = Room::all()->count();
        $count_Staff = Staff::all()->count();
        
        return view('dashboard', compact('count_Booking', 'count_Customer', 'count_Room', 'count_Staff'));
    }
}
