<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $portfolio = Portfolio::get();
        return view('backend.portfolio.index', compact('portfolio'));
    }

    public function create()
    {
        return view('backend.portfolio.create');
    }

    // public function create_process(Request $request)
    // {
    //     $rule = [
    //         'title'        => 'required',
    //         'image'        => 'required|max:2048|mimes:jpg,jpeg,png',
    //         'description ' => 'required',
    //     ];

    //     $messages = [
    //         'title.required'      => 'The field <strong>title</strong> is required!',
    //         'image.required'       => 'The field <strong>image</strong> is required!',
    //         'description.required' => 'The field <strong>description</strong> is required!',
    //     ];

    //     $validator = Validator::make($request->all(), $rule, $messages);

    //     if ($validator->fails()) {
    //         return redirect()->route('backend.create.portfolio')->withErrors($validator)->withInput();
    //     } else {
    //         $image = time() . '.' . $request->image->extension();
    //         $request->image->move(public_path('portfolio'), $image);

    //         Portfolio::create([
    //             'title'        => $request->title,
    //             'image'        => $image,
    //             'description ' => $request->description,
    //         ]);

    //         return redirect()
    //             ->route('backend.manage.portfolio')
    //             ->with('success', 'Portfolio created successfully.');
    //     }
    // }

    public function create_process(Request $request)
    {
        request()->validate([
            'title'       => 'required',
            'image'       => 'required|max:2048|mimes:jpg,jpeg,png',
            'description' => 'required',
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('portofolio'),$image);

        Portfolio::create([
            'title'       => $request->title,
            'image'       => $image,
            'description' => $request->description
        ]);

        return redirect()->route('backend.manage.portfolio')->with('success', 'Portfolio Created Successfully.');
    }
}
