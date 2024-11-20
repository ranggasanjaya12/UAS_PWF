<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
   
    public function index(): View
    {
        $sliders = Slider::get();

        return view('sliders.index', compact('sliders'));
    }

    public function create(): View
    {
        return view('sliders.create');
    }

    public function store(SliderRequest $request): RedirectResponse
    {
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('asset/slider','public');
            Slider::create($request->except('banner') + ['banner' => $banner]);
        }else{
            Slider::create($request->validated());
        }

        return redirect()->route('sliders.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Slider $slider): View
    {
        return view('sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider): RedirectResponse
    {
        if ($request->hasFile('banner')){
            if($request->banner){
                File::delete('storage/' . $slider->banner);
                $banner = $request->file('banner')->store('asset/slider','public');
                $slider->update($request->except('banner') + ['banner' => $banner]);
            }else{
                $slider->update($request->validated());
            }
        }

        return redirect()->route('sliders.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        File::delete('storage/' . $slider->banner);
        $slider->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}