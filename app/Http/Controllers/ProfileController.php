<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Repositories\ProfileRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends AppBaseController
{
    /** @var  ProfileRepository */
    private $profileRepository;

    public function __construct(ProfileRepository $profileRepo)
    {
        $this->profileRepository = $profileRepo;
    }

    /**
     * Display a listing of the Profile.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $profile = Profile::where('user_id', $userId)->first();
        if(empty($profile)) {
            $profile = Profile::create(['user_id' => $userId]);
        }
        return view('profiles.show',compact('user', 'profile'));
    }

    /**
     * Show the form for creating a new Profile.
     *
     * @return Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created Profile in storage.
     *
     * @param CreateProfileRequest $request
     *
     * @return Response
     */
    public function store(CreateProfileRequest $request)
    {
        $input = $request->all();

        $profile = $this->profileRepository->create($input);

        Flash::success('Profile saved successfully.');

        return redirect(route('profiles.index'));
    }

    /**
     * Display the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show()
    {
        $user = User::find(Auth::user()->id);
        return view('profiles.show',compact('user'));
    }

    /**
     * Show the form for editing the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $profile = Profile::where('user_id', $userId)->first();
        if($profile == null) $profile = Profile::create(['user_id' => $userId]);
        return view('profiles.edit',compact('user', 'profile'));
    }

    /**
     * Update the specified Profile in storage.
     *
     * @param  int              $id
     * @param UpdateProfileRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'password' => 'same:confirm-password',
            'full_name' => 'min:0|max:100',
            'address' => 'min:0|max:255',
            'birthday' => 'date',
            'phone_number' => 'regex:/^[0]{1}[19]{1}[0-9]{8,9}$/'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $user->update($input);

        $profile = Profile::where('user_id', $userId)->first();
        $profile->update($input);

        return redirect()->route('profiles.index')
            ->with('success','Profile updated successfully');
    }

    /**
     * Remove the specified Profile from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        $this->profileRepository->delete($id);

        Flash::success('Profile deleted successfully.');

        return redirect(route('profiles.index'));
    }
}
