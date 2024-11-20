<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfferRequest;
use App\Models\Offer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class OfferController extends Controller
{
   
    public function index(): View
    {
        $offers = Offer::get();

        return view('offers.index', compact('offers'));
    }

    public function create(): View
    {
        return view('offers.create');
    }

    public function store(OfferRequest $request): RedirectResponse
    {
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('asset/offer','public');
            Offer::create($request->except('banner') + ['banner' => $banner]);
        }else{
            Offer::create($request->validated());
        }

        return redirect()->route('offers.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Offer $offer): View
    {
        return view('offers.edit', compact('offer'));
    }

    public function update(OfferRequest $request, Offer $offer): RedirectResponse
    {
        if ($request->hasFile('banner')){
            if($request->banner){
                File::delete('storage/' . $offer->banner);
                $banner = $request->file('banner')->store('asset/offer','public');
                $offer->update($request->except('banner') + ['banner' => $banner]);
            }else{
                $offer->update($request->validated());
            }
        }

        return redirect()->route('offers.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Offer $offer): RedirectResponse
    {
        File::delete('storage/' . $offer->banner);
        $offer->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
