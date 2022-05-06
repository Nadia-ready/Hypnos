<?php

namespace App\Validator;


use App\entity\Reservations;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ReservationDeleteValidator extends ConstraintValidator
{
    protected Session $session;

    public function __construct(RequestStack $requestStack) {
        $this->session = $requestStack->getSession();
    }
    /**
     * @param Reservations $reservation
     * @param ReservationDelete $constraint
     * @return bool
     */
    public function validate($reservation, Constraint $constraint, )
    {
        $now = new \DateTime();
        $interval = $reservation->getArrivalDate()->diff($now);
        $isValid = $interval->days > 3;


        if(!$isValid) {
            $this->session->getFlashBag()->add('errors', $constraint->message);
        }

        return $isValid;
    }

}