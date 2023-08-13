<?php

namespace App\Enums;



enum RequestStatus : string {


    case P='pending';
    case A='approved';
    case R='rejected';
}