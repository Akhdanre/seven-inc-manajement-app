<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDataRequest;
use App\Models\Mahasiswa;
use App\Models\ReqUpdateData;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MahasiswaController extends Controller
{
    public function mahasiswaView(): View
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect('/');
        }
        $dataMhs = Mahasiswa::where("user_id", $user->id)->first();

        return view("mahasiswa.index", ['data' => $dataMhs, 'account' => $user]);
    }

    public function actionRequestUpdateData(UpdateDataRequest $request)
    {
        $data = $request->validated();

        $user = Auth::user();

        if ($user == null) {
            return redirect('/');
        }
        try {
            ReqUpdateData::create($data);
            return redirect()->back()->with('success', 'Berhasil melakukan request data');
        } catch (\Exception $e) {
            Log::error('Error occurred while updating data: ' . $e->getMessage());
            return redirect()->back()->with("error", "Terjadi kesalahan saat melakukan request data: " . $e->getMessage());
        }
    }
}
