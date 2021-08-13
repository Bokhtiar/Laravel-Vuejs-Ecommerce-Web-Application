<?php

namespace Modules\Color\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Color\Entities\Color;
class ColorController extends Controller
{

  public function index()
 {
     $colors = Color::all();
     return response()->json($colors, 200);
 }

 public function save(Color $color, Request $request)
 {
     $color->color_name = $request->color_name;
     $color->color_code = $request->color_code;
     $color->save();
 }

 public function storeOrUpdate($id = null, Request $request)
 {
     if (!isset($id)) {
       $validated = $request->validate([
        'color_name' => 'required|unique:colors|max:255',
        'color_code' => 'required|unique:colors',
        ]);
         $color = new Color();
         $store = $this->save($color, $request);
         return response()->json($color, 200);
     } else {
       $validated = $request->validate([
        'color_name' => 'required|max:255',
        'color_code' => 'required|',
        ]);
         $color = Color::find($id);
         $this->save($color, $request);
         return response()->json($color, 200);
     }
 }


 /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function show($id)
 {
     //
 }

 /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function edit($id)
 {
     $color = Color::find($id);
     return response()->json($color, 200);
 }

 /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function update(Request $request, $id)
 {
     //
 }

 /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function destroy($id)
 {
     color::find($id)->delete();
     return redirect()->route('admin.color.index')->with('success', 'Data Delete !!!');
 }
}
