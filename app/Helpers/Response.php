<?php
if (! function_exists('apiResponseMessage')) {

    function apiResponseMessage($message = '', $code = '', $data = []) {
        $responseArray = [];
		$responseArray = [
			'message' => $message,
			'status'  => $code == 200 ? 'success' : 'failure',
			'code'    => $code,
			'data'    => $data,
		];
		return response()->json($responseArray, $code);
    }
}
?>