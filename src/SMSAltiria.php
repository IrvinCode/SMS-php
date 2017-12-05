<?php

namespace IrvinCode\SMS;

class SMSAltiria extends SMS implements MobileInterface
{
    private $client;

    private $name = 'altiria';

    public function getName()
    {
        return $this->name;
    }

    public function send($number, $msg):SMSResponse{

        $number = $this->sanitize($number, $msg);

        $res = new SMSResponse();

        $errorCode = '';
        $errorMsg = '';

        if(env('SMS_SIMULATED')==true){

            return $this->simulate($number, $msg, $res);

        }

        $domainId = config('SMSAltiria.SMS_DOMAIN_ID');
        $login = config('SMSAltiria.SMS_LOGIN');
        $password = config('SMSAltiria.SMS_PASSWORD');

        $sData = 'cmd=sendsms&';
        $sData .= 'domainId=' .$domainId. '&';
        $sData .= 'login=' .$login. '&';
        $sData .= 'passwd=' .$password. '&';
        $sData .= 'dest=' . str_replace(',', '&dest=', $number) . '&';
        $sData .= 'msg=' . urlencode(utf8_encode(substr($msg, 0, 160)));

        $timeOut = 5;
        $fp = fsockopen('www.altiria.net', 80, $errno, $errstr, $timeOut);

        if (!$fp) {
            $errorCode = "ERROR de conexión: $errno - $errstr\n";
            $errorCode .= "Compruebe que ha configurado correctamente la direccion/url ";
            $errorCode .= "suministrada por altiria";
            $output = "ERROR. En conexión";

        } else {
            $buf = "POST /api/http HTTP/1.0\r\n";
            $buf .= "Host: www.altiria.net\r\n";
            $buf .= "Content-type: application/x-www-form-urlencoded; charset=UTF-8\r\n";
            $buf .= "Content-length: " . strlen($sData) . "\r\n";
            $buf .= "\r\n";
            $buf .= $sData;
            fputs($fp, $buf);
            $buf = "";

            $responseTimeOut = 60;
            stream_set_timeout($fp, $responseTimeOut);
            stream_set_blocking($fp, true);

            if (!feof($fp)) {
                if (($buf = fgets($fp, 128)) === false) {
                    $info = stream_get_meta_data($fp);
                    if ($info['timed_out']) {
                        $errorCode = ' ERROR Tiempo de respuesta agotado';
                        $output = "ERROR. en conexión";

                    } else {
                        $errorCode = ' ERROR de respuesta';
                        $output = "ERROR. En servidor";
                    }
                } else {
                    while (!feof($fp)) {
                        $buf .= fgets($fp, 128);
                    }
                }
            } else {
                $errorMsg = 'ERROR de respuesta';
                $output = "ERROR. En servidor";
            }

            fclose($fp);

            if (strpos($buf, "HTTP/1.1 200 OK") === false) {
                $errorCode = "ERROR. Codigo error HTTP: " . substr($buf, 9, 3) . "\n";
                $errorCode .= "Compruebe que ha configurado correctamente la direccion/url ";
                $errorCode .= "suministrada por config";
                $output = "ERROR. Codigo error HTTP";
            }
            if (strstr($buf, "ERROR")) {
                $errorMsg = $buf . "\n";
                $errorMsg .= " Ha ocurrido algun error. Compruebe la especificacion";
                $output = "ERROR. En la conexión";

            } else {
                $buf .= "\n" . " Exito";
                $output = " Exito";
            }

            $res->setStatus($output)
                ->setErrorCode($errorCode)
                ->setErrorMessage($errorMsg)
                ->setMsg($msg)
                ->setTo($number);

            return $res;
        }
    }
}