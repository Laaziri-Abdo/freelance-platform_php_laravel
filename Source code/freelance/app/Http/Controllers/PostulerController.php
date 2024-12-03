<?php

namespace App\Http\Controllers;
use App\Models\client;
use App\Models\Postuler;
use App\Models\project;
use Illuminate\Http\Request;

class PostulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function postuler(Request $request)
    {
        $Postuler = new Postuler;
        $Postuler->project_id = $request->project_id;
        $Postuler->project_name = $request->project_name;
        $Postuler->client_id = $request->client_id;
        $Postuler->freelancer_id = $request->freelancer_id;
        $Postuler->freelancer_name = $request->freelancer_name;
       
        $save = $Postuler->save();
        
        if($save){
            return back()->with('success','You have successfuly Postuler ');
         }else{
             return back()->with('success','Something went wrong, try again later');
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Postuler $postuler)
    {

        $data = ['LoggedUserInfo'=>client::where('id','=', session('LoggedUser'))->first(),
        'Postulers'=>Postuler::all()];
        return view('client/postuler', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deletePostuler($id)
    {
        Postuler::destroy(array('id',$id));
        return back()->with('success','You have successfuly Deleted the Postuler ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    public function acceptPostuler(Request $request ,$id ,$freelanser_id)
    {
        project::where('id', $id)->update(array('freelanser_id' => $freelanser_id));
        return back()->with('success','You have successfuly Deleted the Postuler ');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postuler $postuler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postuler $postuler)
    {
        //
    }
}
