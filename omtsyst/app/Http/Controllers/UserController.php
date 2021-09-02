<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\OfficeRepository;
use App\Http\Requests\UserCompletRequest;

class UserController extends Controller
{
    protected $userRepository;
    protected $officeRepository;
    protected $nbrPerPage = 10;
    protected $offices;

    public function __construct(UserRepository $userRepository, OfficeRepository $officeRepository)
    {
        $this->userRepository = $userRepository;
        $this->officeRepository = $officeRepository;
        $this->offices = $this->officeRepository->getPaginate(5);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = 0;
        if(session()->has('role') and session()->get('role') < 2)
        {
            $country = session()->get('office');
            $users = $this->userRepository->getPaginate($this->nbrPerPage, $country);
            $links = $users->render();

            return view('user.user', compact('users', 'links'));
        }
        $users = $this->userRepository->getPaginate($this->nbrPerPage, $country);
        $links = $users->render();

        return view('user.user', compact('users', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        $office = $this->officeRepository->getById($user[0]->office);

        return view('user.show', compact('user', 'office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = $this->userRepository->getById($id);
        $offices = $this->officeRepository->getAll();

        return view('user.edit', compact('user', 'offices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserCompletRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $request->all();
        $data = [
            'name' => $user['name'],
            'email' => $user['email'],
            'username' => $user['username'],
            'office' => $user['office'],
            'phone_number' => $user['phone_number'],
            'admin' => $user['admin'],
            'id' => (int) $user['uid']
        ];


        $this->userRepository->affect($id, $data);

        return redirect('admin/user');
    }

    /**
     * @param UserCompletRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function complete(UserCompletRequest $request, $id)
    {
        $this->userRepository->affect($id, $request->all());

        return redirect('user.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->userRepository->delUserOffice($id);

        $this->userRepository->destroy($id);

        return redirect('admin/user');
    }
    private function setAdmin($request)
    {
        if(!$request->has('admin'))
        {
            $request->merge(['admin' => 0]);
        }
        else{
            $request->merge(['admin' => 1]);
        }
    }
}
