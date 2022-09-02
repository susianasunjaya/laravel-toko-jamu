<?php

namespace App\Http\Controllers;

use App\Models\Jamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JamuController extends Controller
{
    public function index()
    {
        //get data jamus
        // latest -> ambil data terbaru | paginate -> membatasi data yang ditampilkan
        $jamus = Jamu::latest()->paginate(5);

        //render view with jamus -> kirim data jamus ke view dengan compact
        return view('jamus.index', compact('jamus'));
    }

    public function create()
    {
        return view('jamus.create');
    }


    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'merk'     => 'required',
            'variety'     => 'required',
            'stock'     => 'required',
            'price'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/jamus', $image->hashName());

        //create jamu
        Jamu::create([
            'image'     => $image->hashName(),
            'merk'     => $request->merk,
            'variety'     => $request->variety,
            'stock'     => $request->stock,
            'price'   => $request->price
        ]);

        //redirect to index
        return redirect()->route('jamus.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Jamu $jamu)
    {
        return view('jamus.edit', compact('jamu'));
    }

    public function update(Request $request, Jamu $jamu)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'merk'     => 'required',
            'variety'     => 'required',
            'stock'     => 'required',
            'price'   => 'required'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/jamus', $image->hashName());

            //delete old image
            Storage::delete('public/jamus/' . $jamu->image);

            //update jamu with new image
            $jamu->update([
                'image'     => $image->hashName(),
                'merk'     => $request->merk,
                'variety'     => $request->variety,
                'stock'     => $request->stock,
                'price'   => $request->price
            ]);
        } else {

            //update jamu without image
            $jamu->update([
                'merk'     => $request->merk,
                'variety'  => $request->variety,
                'stock'    => $request->stock,
                'price'    => $request->price
            ]);
        }

        //redirect to index
        return redirect()->route('jamus.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function destroy(Jamu $jamu)
    {
        //delete image
        Storage::delete('public/jamus/'. $jamu->image);

        //delete post
        $jamu->delete();

        //redirect to index
        return redirect()->route('jamus.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
