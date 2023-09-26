<?php

namespace App\Http\Controllers;

use App\Logic\UserHelper;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function set(Request $request)
    {
        if($request->ajax())
        {
            $request->validate([
                'collection'=>'required',
                'collection_id'=>'required',
            ]);

            $user = $request->user();
            $collection = $request->get('collection');
            $collection_id = $request->get('collection_id');

            if(!UserHelper::hasFavorite($user, $collection, $collection_id))
            {
                UserHelper::attachFavorite($request->user(), $collection, $collection_id);

                return response()->json([
                    'success'=>true,
                    'message'=>'Added to favorites',
                    'action'=>'add'
                ]);
            }else{
                UserHelper::detachFavorite($request->user(), $collection, $collection_id);
                return response()->json([
                    'success'=>true,
                    'message'=>'Removed from favorites',
                    'action'=>'remove'
                ]);
            }
        }
        else
        {
            return response()->json(['success'=>false,'message'=>'Invalid request']);
        }
    }
}
