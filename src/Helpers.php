<?php


namespace leifermendez\sabadell;


class Helpers
{
    private $code_ok = 200;
    private $code_error = 401;
    private $code_internal = 500;

    public function json($data = array(), $message = '', $code = null)
    {
        try {
            $res = array(
                'status' => 'success',
                'message' => $data,
                'code' => (!$code) ? $this->code_ok : $code
            );

            return json_encode($res);

        } catch (\Exception $e) {
            $res = array(
                'status' => 'fail',
                'message' => $e->getMessage(),
                'code' => (!$code) ? $this->code_internal : $code
            );

            return json_encode($res);
        }
    }

    public function json_error($data = array(), $message = '', $code = null)
    {
        try {
            return array(
                'status' => 'error',
                'message' => json_encode($data),
                'code' => (!$code) ? $this->code_ok : $code
            );
        } catch (\Exception $e) {
            return array(
                'status' => 'fail',
                'message' => $e->getMessage(),
                'code' => (!$code) ? $this->code_internal : $code
            );
        }
    }
}