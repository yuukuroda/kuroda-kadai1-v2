<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Channel;

class ContactController extends Controller
{
    public function contact()
    {
        $channels = Channel::all();
        $contacts = Contact::with('category')->get();
        $categories = Category::all();

        return view('contact', compact('contacts', 'categories', 'channels'));
    }

    public function confirm(ContactRequest $request)
    {
        
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_1', 'tel_2', 'tel_3', 'address', 'building', 'category_id', 'detail','image_file']);;
        $channels = Channel::find($request->channel_ids);
        $contact['image_file'] = $request->image_file->store('img','public');

        if (!isset($contact['gender'])) {
            $contact['gender'] = null;
        }

        if (!empty($contact['category_id'])) {
            $category = Category::find($contact['category_id']);
            $contact['category_name'] = $category ? $category->name : '不明なカテゴリ';
        }
        return view('confirm', compact('contact','channels'));
    }

    public function store(ContactRequest $request)
    {
        dd($request->all());
        // 戻るボタンを判定してwithInput
        if ($request->input('action') == 'back') {
            return redirect('/')->withInput();
        }
        $fullTel = $request->input('tel_1') . '-' .
            $request->input('tel_2') . '-' .
            $request->input('tel_3');
        $contactData = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail','image_file']);
        $contactData['tel'] = $fullTel;
        
        $contact = Contact::create($contactData);
        $contact->channels()->sync($request->channel_ids);
        return redirect('thanks');
    }
    public function thanks()
    {
        return view('thanks');
    }
}
