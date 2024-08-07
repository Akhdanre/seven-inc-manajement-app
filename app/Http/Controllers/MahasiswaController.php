<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDataRequest;
use App\Models\Mahasiswa;
use App\Models\ReqUpdateData;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class MahasiswaController extends Controller
{
    public function mahasiswaView(): View
    {
        $session = session("userData");
        if ($session == null) {
            return redirect('/');
        }

        $dataMhs = Mahasiswa::where("user_id", $session['id'])->first();

        return view("mahasiswa.index", ['data' => $dataMhs, 'account' => $session]);
    }

    public function actionRequestUpdateData(UpdateDataRequest $request)
    {
        $data = $request->validated();

        $session = session("userData");
        if ($session == null) {
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
