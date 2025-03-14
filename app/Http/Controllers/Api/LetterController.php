<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('q');
        $type = $request->query('type');
        $sort = $request->query('sort', 'asc');
        $query = Letter::query();
        $allLetters = Letter::count();
        $allIncomingLetters = Letter::where('type', 'incoming')->count();
        $allOutgoingLetters = Letter::where('type', 'outgoing')->count();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('subject', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        else {
            $query->take(10);
        }

        if ($type) {
            $query->where('type', $type);
        }

        $query->orderBy('created_at', $sort);
        $letters = $query->with('user')->get();

        return response()->json([
            'status' => true,
            'message' => 'Menampilkan seluruh surat',
            'data' => [
                'total_letters' => $allLetters,
                'incoming' => $allIncomingLetters,
                'outgoing' => $allOutgoingLetters,
                'letters' => $letters
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_number' => 'required|unique:letters,letter_number',
            'letter_date' => 'required|date',
            'type' => 'required|in:incoming,outgoing',
            'subject' => 'required',
            'sender' => 'required',
            'recepient' => 'required',
            'letter_link' => 'required|active_url',
        ]);

        // $request['letter_date'] = Carbon::createFromFormat('d-m-Y', $request['letter_date'])->format('Y-m-d');
        $request['created_by'] = Auth::user()->id;
        $letter = Letter::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menambahkan surat',
            'data' => $letter
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $letter = Letter::where('id', $id)->with('user')->get();

        if (!$letter) {
            return response()->json([
                'status' => false,
                'message' => 'Surat tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Mendapatkan detail Surat',
            'data' => $letter
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $letter = Letter::find($id);

        if (!$letter) {
            return response()->json([
                'status' => false,
                'message' => 'Surat tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'letter_number' => 'sometimes|required',
            'letter_date' => 'sometimes|required|date',
            'type' => 'sometimes|required|in:incoming,outgoing',
            'subject' => 'sometimes|required',
            'sender' => 'sometimes|required',
            'recepient' => 'sometimes|required',
            'letter_link' => 'sometimes|required|active_url',
        ]);

        $letter->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Surat berhasil diperbarui',
            'data' => $letter
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $letter = Letter::find($id);

        if (!$letter) {
            return response()->json([
                'status' => false,
                'message' => 'Surat tidak ditemukan'
            ], 404);
        }

        if ($letter['created_by'] != Auth::user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'Tidak memiliki akses untuk menghapus surat ini'
            ], 404);
        }

        $letter->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menghapus surat'
        ]);
    }
}
