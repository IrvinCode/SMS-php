<?php

namespace IrvinCode\SMS;

class SMSResponse
{

    protected $status;

    protected $errorCode;

    protected $errorMessage;

    protected $to;

    protected $isSimulated;

    protected $msg;

    // This is set to false when SMS provider is able to return a failed response
    // and not just an Exception. For the time being, SMS Gateway is the only one
    // that is setting this to false.
    protected $isSuccess = true;

    const FAILED = 'FAILED';
    const QUEUED  = 'QUEUED';

    /**
     * @return mixed
     */
    public function getIsSuccess()
    {
        return $this->isSuccess;
    }

    /**
     * @param mixed $isSuccess
     *
     * @return $this
     */
    public function setIsSuccess($isSuccess)
    {
        $this->isSuccess = $isSuccess;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param mixed $errorCode
     *
     * @return $this
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param mixed $errorMessage
     *
     * @return $this
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     *
     * @return $this
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param mixed $msg
     *
     * @return $this
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsSimulated()
    {
        return $this->isSimulated;
    }

    /**
     * @param mixed $isSimulated
     *
     * @return $this
     */
    public function setIsSimulated($isSimulated)
    {
        $this->isSimulated = $isSimulated;
        return $this;
    }
}