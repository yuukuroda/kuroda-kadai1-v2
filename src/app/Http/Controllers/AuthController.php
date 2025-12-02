<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    public function admin(Request $request)
    {
        dump($request->all(), $request->keyword);
        $query = Contact::with('category');
        if (!empty($request->keyword)) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }
        if (!empty($request->gender)) {
            $query->where('gender', '=', $request->gender);
        }
        if (!empty($request->category_id)) {
            $query->where('category_id', '=', $request->category_id);
        }
        if (!empty($request->date)) {
            $query->whereDate('created_at', '=', $request->date);
        }
        $contacts = $query->paginate(7);
        $categories = Category::all();
        return view('admin', compact('categories', 'contacts'));
    }
}
