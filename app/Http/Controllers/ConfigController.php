<?php

namespace App\Http\Controllers;

use App\Models\EquipmentGroup;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfigController extends Controller
{
    public function viewHospital()
    {
        $hospital = Hospital::where('status', '1')->where('close', '1')->get();
        return view('config.hospital', compact('hospital'));
    }

    public function addHospital(Request $request)
    {
        $validated = $request->validate([
            'hos_name' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'region' => 'required|string|max:255',
            'national_pro_id' => 'required|string|max:255',
            'active' => 'nullable|string',
        ]);
        $user = Auth::user();

        Hospital::create([
            'hos_name' => $validated['hos_name'],
            'zip_code' => $validated['zip_code'],
            'region' => $validated['region'],
            'national_pro_id' => $validated['national_pro_id'],
            'active' => $request->active,
            'hos_insertby' => $user->first_name,

        ]);

        return redirect()->back()->with('success', 'Hospital saved successfully!');
    }

    public function editHospital(Request $request)
    {
        $validated = $request->validate([
            'hos_name' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'region' => 'required|string|max:255',
            'national_pro_id' => 'required|string|max:255',
            'active' => 'nullable|string',
        ]);

        $id = $request->hos_id;
        $hospital = Hospital::findOrFail($id);
        $hospital->update([
            'hos_name' => $validated['hos_name'],
            'zip_code' => $validated['zip_code'],
            'region' => $validated['region'],
            'national_pro_id' => $validated['national_pro_id'],
            'active' => $request->has('active') ? 1 : 0,
        ]);
        return redirect()->back()->with('success', 'Hospital updated successfully!');
    }


    public function deleteHospital($id)
    {
        $hos = Hospital::find($id);
        $hos->close = '0';
        $hos->status = '0';
        $hos->save();
        return redirect()->back()->with('success', 'Hospital deleted successfully!');
    }

    /* ------------------------ equipment group functions ----------------------- */

    public function viewEquipmentGroup()
    {
        return view('config.equipment-group');
    }

    public function addEquipmentGroup(Request $request)
    {
        $validated = $request->validate([
            'eqg_name' => 'required|string|max:255',
            'eqg_active' => 'required|in:0,1',
        ]);
        $user = Auth::user();
        try {
            EquipmentGroup::create([
                'eqg_name' => $validated['eqg_name'],
                'eqg_active' => $validated['eqg_active'],
                'eqg_insertby' => $user->first_name,
            ]);

            return redirect()->back()->with('success', 'Equipment Group added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add Equipment Group.');
        }
    }

}
