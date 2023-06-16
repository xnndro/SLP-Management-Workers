<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\InventarisRole;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    // Supervisor
    public function supervisorInventaris()
    {
        $title = "Hapus Inventaris!";
        $text = "Apakah anda yakin ingin menghapus inventaris ini?";
        confirmDelete($title, $text);
        return view('supervisor.pages.inventaris.index', [
            'inventories' =>  Inventaris::all(),
            'housekeeping_count' => count(InventarisRole::firstWhere('inventory_roles_name', 'Housekeeping')->inventories),
            'facade_cleaner_count' => count(InventarisRole::firstWhere('inventory_roles_name', 'Facade Cleaning')->inventories),
            'technician_count' => count(InventarisRole::firstWhere('inventory_roles_name', 'Technician')->inventories),
            'gardener_count' => count(InventarisRole::firstWhere('inventory_roles_name', 'Gardener')->inventories),
        ]);
    }

    public function createInventaris()
    {
        return view('supervisor.pages.inventaris.create', [
            'roles' => InventarisRole::all()
        ]);
    }

    public function editInventaris() //jangan lupa tambah id disini nanti
    {
        return view('supervisor.pages.inventaris.edit');
    }

    //Workers
    public function workersInventaris() 
    {
        return view('workers.pages.inventaris.index', [
            'inventories' =>  Inventaris::all(),
            'housekeeping_count' => count(InventarisRole::firstWhere('inventory_roles_name', 'Housekeeping')->inventories),
            'facade_cleaner_count' => count(InventarisRole::firstWhere('inventory_roles_name', 'Facade Cleaning')->inventories),
            'technician_count' => count(InventarisRole::firstWhere('inventory_roles_name', 'Technician')->inventories),
            'gardener_count' => count(InventarisRole::firstWhere('inventory_roles_name', 'Gardener')->inventories),
        ]);
    }

    // public function updateInventaris(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'image' => 'required',
    //         'description' => 'required',
    //         'total' => 'required',
    //     ]);

    //     $inventaris = Inventaris::find($id);
    //     $inventaris->name = $request->name;
    //     $inventaris->image = $request->image;
    //     $inventaris->description = $request->description;
    //     $inventaris->total = $request->total;
    //     $inventaris->save();

    //     return redirect()->route('supervisorInventaris')->with('success', 'Data berhasil diupdate');
    // }

    // public function deleteInventaris($id)
    // {
    //     $inventaris = Inventaris::find($id);
    //     $inventaris->delete();

    //     return redirect()->route('supervisorInventaris')->with('success', 'Data berhasil dihapus');
    // }

    // public function add(Request $request){
        
    //     Inventaris::create([
    //         'inventaris_name' => $request->nama,
    //         'inventaris_image' => '../../assets/images/product/p1.jpg',
    //         'inventaris_description' => $request->deskripsi,
    //         'inventaris_total' => $request->total,
    //         'inventaris_role_id' => $request->role_id
    //     ]);
    //     return redirect('/supervisorInventaris');
    // }
    
    public function add(Request $request){
        // {"_token":"8CYrqA3TKQT9Ux8Sy7xQ6UT26SryElapEMG2LYKZ","nama":"a","deskripsi":"aaa","total":"1","role_id":"1"}
        $rules=[
            'nama'=>'required',
            'total'=>'required|min:1',
            'deskripsi'=>'required',
            'role_id'=>'required',
            'filegambar'=>'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
        $id = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal berisi :min karakter',
        ];
        $validator = Validator::make($request->all(),$rules, $id);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $filename = $request->file('filegambar')->getClientOriginalName();
            $destination_path = 'public/uploads/panduan';
            $path = $request->file('filegambar')->storeAs($destination_path, $filename);

            $inventaris = Inventaris::create([
                'inventaris_name' => $request->nama,
                'inventaris_image' => $path,
                'inventaris_description' => $request->deskripsi,
                'inventaris_total' => $request->total,
                'inventaris_role_id' => $request->role_id
            ]);
            return redirect()->back()->with('Success', 'Berhasil menanmbahkan inventaris');
        }
    }
}
