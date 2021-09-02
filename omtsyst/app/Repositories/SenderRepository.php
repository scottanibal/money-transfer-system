<?php

namespace App\Repositories;

use App\Models\Sender;
use Illuminate\Support\Facades\DB;

class SenderRepository
{

    protected $sender;

    public function __construct(Sender $sender)
    {
        $this->sender = $sender;
    }
    public function save(Array $array)
    {
        $sender = new Sender;
        $sender->first_name = $array['first_name'];
        $sender->last_name = $array['last_name'];
        $sender->phone_number = $array['phone_number'];
        $sender->email = $array['email'];
        $sender->address = $array['address'];
        $sender->country = $array['country'];

        $sender->save();
        return $sender->id;
    }
}
