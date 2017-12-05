# SMS with Altiria

## Installation

    composer require irvincode/sms-php

Now, put the command:

    php artisan vendor:publish --tag=SMS
    

Then, you must put your personal domainId, login and password in your config/SMSAltiria

    SMS_DOMAIN_ID=YOUR_DOMAIN_ID
    SMS_LOGIN=YOUR_LOGIN
    SMS_PASSWORD=YOUR_PASSWORD