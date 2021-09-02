<?php

namespace App\Repositories;

use App\Http\Requests\UserCompletRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function save(User $user, Array $inputs)
    {
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];

        $user->save();
    }
    public function getById($id)
    {
        return DB::table('users')
            ->leftJoin('user_office', 'users.id', '=', 'user_office.user')
            ->leftJoin( 'offices', 'offices.id', '=', 'user_office.office')
            ->select('users.id as id', 'users.name as name', 'users.email as email',
                'user_office.username as username', 'user_office.phone_number as phone_number',
                'offices.id as office', 'user_office.photo',
                'user_office.admin as admin', 'offices.address', 'offices.country')
            ->where('users.id', '=', $id)
            ->limit(1)
            ->get();
    }
    public function affect($id, Array $inputs)
    {
        $user = $this->user->findOrFail($id);

        $this->save($user, $inputs);

        $affected = DB::table('user_office')
            ->updateOrInsert(['user' => $id], ['username' => $inputs['username'],
                'phone_number' => $inputs['phone_number'],
                'office' => $inputs['office'], 'admin' => $inputs['admin']
            ]);
        return $affected;
    }
    public static function getRole($id)
    {
        return DB::table('user_office')
            ->join('offices', 'user_office.office', '=', 'offices.id')
            ->join('countries', 'offices.country', '=', 'countries.id')
            ->select('user_office.admin as role', 'countries.id as country', 'offices.id as office')
            ->where('user', '=', $id)
            ->limit(1)
            ->get();
    }
    public function delUserOffice($id)
    {
        $delete = DB::table('user_office')
            ->where('user', '=', $id)->delete();
        return $delete;
    }
    public function destroy($id)
    {
        return $this->user->destroy($id);
    }
    public function getPaginate($n, $office)
    {
        if($office > 0)
        {
            return DB::table('users')
                ->join('user_office', 'users.id', '=', 'user_office.user')
                ->select('users.id as id', 'users.name as name', 'users.email as email')
                ->where('user_office.office', '=', $office)
                ->paginate($n);
        }
        return $this->user->paginate($n);
    }
}
