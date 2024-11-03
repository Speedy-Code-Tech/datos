<?php

namespace App\Http\Controllers;

use App\Models\ForwardedDocument;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function deleteNotifForever($id){
        $data = ForwardedDocument::where('forwarded_document_id',$id)->first();
        $data->delete();
        return redirect()->back();
    }


}
