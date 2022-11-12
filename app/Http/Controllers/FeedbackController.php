<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function show() {
        $feedbacks = DB::table('feedbacks')->get();
        return view('admin.feedback.show') -> with(['feedbacks' => $feedbacks]);
    }

    public function create() {
        return view('admin.feedback.create');
    }

    public function createProcess(Request $feedbacks) {
        $data = array();
        $data['txtRating'] = $feedbacks->input('txtRating');
        $data['txtContent'] = $feedbacks->input('txtContent');
        $data['txtProductId'] = $feedbacks->input('txtProductId');
        $data['txtCustomerId'] = $feedbacks->input('txtCustomerId');
       
        DB::table('feedbacks')->insert(
            $data
        );
    }

    public function update($id)
    {
        $feedbacks=DB::table('feedbacks')->get()
        ->where('id', intval($id))
        ->first();
        return view('admin.feedback.update')
            ->with(['feedbacks'=>$feedbacks]);
           
    }

    public function updateProcess(FeedbackRequest $feedbacks, $id)
    {
        $data = array();
        $data['txtRating'] = $feedbacks->input('txtRating');
        $data['txtContent'] = $feedbacks->input('txtContent');
        $data['txtProductId'] = $feedbacks->input('txtProductId');
        $data['txtCustomerId'] = $feedbacks->input('txtCustomerId');
       
        DB::table('feedbacks')->where('id', intval($id))->update(
            $data
        );

    }

   

    public function checkout($id)
    {
        $pro=Product::find($id);

        $feedbacks=feedbacks::find($id);

        return view('user.checkout')
                ->with(['pro'=>$pro])
                ->with(['feedbacks' => $feedbacks]);
       
    }

   
}
