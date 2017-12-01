<?php

namespace IrvinCode\SMS;


class SMSConfig
{
    protected $domainId;

    protected $login; 

    protected $password;

    public function __contruct($domain, $login, $pass)
    {
        $this->domainId = $domain;
        $this->login = $login;
        $this->password = $pass;

    }
}