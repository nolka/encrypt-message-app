<?php
/**
 * Created by PhpStorm.
 * User: nolka
 * Date: 16.01.18
 * Time: 20:44
 */

namespace App\Repository;


use App\Model\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageRepository
{
    public function createMessage(Request $request)
    {
        $r = Validator::make($request->json()->all(), [
            'message' => 'required'
        ]);

        if ($r->fails()) {
            return false;
        }

        $m = new Message($request->json()->all());
        $m->type = Message::TYPE_TEXT;

        if ($m->save()) {
            return $m;
        }
    }
}