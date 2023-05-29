<?php

namespace App\Http\Controllers;

use App\Traits\FlashMessages;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //
    use FlashMessages;

    protected $data = null;

    protected function setPageFile($title, $subTitle)
    {
        view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
    }

    protected function showErrorPage($errorCode = 404, $message = null)
    {
        $data['message'] = $message;
        return response()->view('errors'.$errorCode, $data, $errorCode);
    }

    protected function responseJSON($error = true, $responsecode = 200, $message = [], $data = null)
    {
        return response()->json([
            'error' => $error,
            'response_code' => $responsecode,
            'message' => $message,
            'data' => $data
        ]);
    }

    protected function responseRedirect($route, $message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this -> setFlashMessages($message, $type);
        $this->showFlashMessages();

        if($error && $withOldInputWhenError){
            return redirect()->back()->withInput();
        }

        return redirect()->route($route);
    }

    protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessages($message, $type);
        $this->showFlashMessages();

        return redirect()->back();
    }
}
