<?php

namespace IrvinCode\SMS;


abstract class SMS
{
    protected function sanitize($number)
    {
        if(substr($number, 0, 1)!='+'){
            return '+' . $number;
        }

        return $number;
    }

    protected function simulate($number, $msg, SMSResponse $res)
    {

        $res->setMsg($msg);
        $res->setTo($number);
        $res->setStatus(SMSResponse::QUEUED);
        $res->setIsSimulated(true);

        if(env('SMS_SIMULATED_WITH_EMAIL')==true) {

            \Mail::raw(
                $msg, function ($message) use ($number) {

                $message->from('no-reply@ahorrolibre.com', 'AhorroLibre');
                $message->to('x' . $number . '@ahorrolibre.com');
                $message->subject('SMS Simulation ' . $number);

            });

            \Logger::info('Simulated SMS Delivered Successfully.', ['context'=>'Cell #: '.$number]);

        }

        return $res;

    }
}