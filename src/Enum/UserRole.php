<?php

namespace App\Enum;

enum UserRole :string
{
    case ROLE_PARTICULIER = 'ROLE_PARTICULIER';
    case ROLE_TRANSPORTEUR = 'ROLE_TRANSPORTEUR';

}