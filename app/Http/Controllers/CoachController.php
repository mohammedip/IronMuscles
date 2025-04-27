<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreCoachRequest;
use App\Http\Requests\UpdateCoachRequest;
use App\Models\Speciality;
use Illuminate\Support\Facades\Redirect; 
use App\Repositories\AuthRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class CoachController extends Controller
{
    use AuthorizesRequests;

    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $specialities = Speciality::get();
        $coaches = User::whereHas('role', function ($query) {
            $query->where('name', 'coach');
        })->with('speciality')->paginate(10);

        return view('pages/admin/Coach.index', compact('coaches','specialities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $specialities = Speciality::get();
        return view('pages/admin/Coach.create', compact('specialities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoachRequest $request)
    {
        $this->authorize('create', User::class);

        $this->authRepository->create(array_merge(
            $request->validated(),
            [
                'password' => Hash::make($request->password),
                'role_id' => 6,
            ]
        ));

        return redirect()->route('coach.index')->with('status', 'Coach created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $coach)
    {
        $this->authorize('viewAny', User::class);
        return view('pages/admin/Coach.show', compact('coach'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $coach)
    {
        $this->authorize('delete', User::class);
        $coach->delete();

        return redirect()->route('coach.index')->with('status', 'Coach deleted successfully.');
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');
        $specialities = Speciality::get();

        if($filter){
            $coaches =User::whereHas('role', function ($query) {
                $query->where('name', 'coach');
            })->where('id_specialite', $filter)->with('speciality')->get();
        
        }else{
            $coaches =User::whereHas('role', function ($query) {
                $query->where('name', 'coach');
            })->get();
        }
    
        return view('partials.coaches', compact('coaches','specialities'))->render();
    }
    


}
