<?php

namespace IrvinCode\SMS;

interface MobileInterface {

    function send($number, $msg):SMSResponse;

    function getName();

}