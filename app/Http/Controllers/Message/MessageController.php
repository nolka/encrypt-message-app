<?php
/**
 * Created by PhpStorm.
 * User: nolka
 * Date: 16.01.18
 * Time: 0:35
 */

namespace App\Http\Controllers\Message;


use App\Http\Controllers\Controller;
use App\Model\Message;
use App\Repository\MessageRepository;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $msgRepo;

    public function __construct(MessageRepository $msgRepo)
    {
        $this->msgRepo = $msgRepo;
    }

    public function getIndex()
    {
        return view('index', ['msgId' => null]);
    }

    public function save(Request $request)
    {
        $url = null;
        $m = $this->msgRepo->createMessage($request);
        if (!empty($m)) {
            $url = url()->to($m->id);
        }
        return response()->json([
            'url' => $url
        ]);
    }

    public function view(Message $message, Request $request)
    {
        if ($request->ajax()) {
            return ['message' => $message->message];
        }
        return view('index', ['msgId' => $message->id]);
    }
}