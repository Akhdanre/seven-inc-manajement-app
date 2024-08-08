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

        if (is_null($user)) {
            return redirect('/')->with('error', 'User tidak ditemukan.');
        }

        try {
            ReqUpdateData::create($data);

            $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

            if ($mahasiswa) {

                $mahasiswa->edit_status = true;
                $mahasiswa->save();
            } else {
                return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
            }

            return redirect()->back()->with('success', 'Berhasil melakukan request data.');
        } catch (\Exception $e) {
            error_log('Error occurred while updating data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat melakukan request data: ' . $e->getMessage());
        }
    }
}
