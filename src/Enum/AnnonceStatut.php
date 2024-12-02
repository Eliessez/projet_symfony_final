<?php 

namespace App\Enum;

enum AnnonceStatut: string
{
    case AVAILABLE = 'disponible';
    case SUPPORTED = 'Pris en charge';
    case PENDING = 'en attente';
    case PAYMENT_PENDING = 'paiement en attente';
    case PAID = 'payé';
    case PROCESSING = 'en préparation';
    case SHIPPED = 'envoyé';
    case DELIVERED = 'livré';
    case CANCELLED  = 'annulé';
}
