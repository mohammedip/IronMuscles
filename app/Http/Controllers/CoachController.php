<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coach;
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
        $coaches = Coach::with('speciality')->get();
        return view('pages/Coach.index', compact('coaches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialities = Speciality::get();
        return view('pages/Coach.create', compact('specialities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoachRequest $request)
    {
        Coach::create($request->validated());

        $this->authRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 6,
        ]);

        return redirect()->route('coach.index')->with('success', 'Coach created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coach $coach)
    {
        return view('pages/Coach.show', compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coach $coach)
    {
        $specialities = Speciality::get();
        return view('pages/Coach.edit', compact('coach','specialities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoachRequest $request, Coach $coach)
    {
        $coach->update($request->validated());

        return redirect()->route('coach.index')->with('success', 'Coach updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coach $coach)
    {
        $coach->delete();

        return redirect()->route('coach.index')->with('success', 'Coach deleted successfully.');
    }


}
