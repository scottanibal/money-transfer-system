<?php

namespace App\Repositories;

use App\Models\Recipient;

class RecipientRepository
{
    protected $recipient;

    public function __construct(Recipient $recipient)
    {
        $this->recipient = $recipient;
    }
    public function save(Array $array)
    {
        $recipient = new Recipient;
        $recipient->first_name = $array['first_name'];
        $recipient->last_name = $array['last_name'];
        $recipient->phone_number = $array['phone_number'];
        $recipient->email = $array['email'];
        $recipient->country = $array['country'];

        $recipient->save();
        return $recipient->id;
    }
}
