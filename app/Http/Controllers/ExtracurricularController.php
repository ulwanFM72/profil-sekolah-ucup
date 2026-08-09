<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::orderBy('nama')->get();

        return view('pages.extracurricular', compact('ekstrakurikuler'));
    }

    public function show(int $id)
    {
        $item = Ekstrakurikuler::findOrFail($id);

        return view('pages.extracurricular-detail', compact('item'));
    }
}
