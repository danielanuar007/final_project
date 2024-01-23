<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\User;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIssueRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;


class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$issues = Issue::with('issues')->get();
        return view('issues.index', ['issues' => $issues]);*/
        try { 
            $issues = Issue::with('users', 'project',)->get(); 
 
            return view('issues.index', compact('issues')); // Assuming you have a Blade file named 'index.blade.php' 
        } catch (\Exception $ex) { 
            return back()->withInput()->withErrors(['error' => 'Failed to fetch issues.']); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('is_admin', 2)->get();
        $projects = Project::all(); // Fetch users with is_admin = 2
        return view('issues.create', compact('users', 'projects'));
        /*$issue = new Issue();

        return view('issues.create', [
            'issue' => $issue
        ]);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIssueRequest $request)
    {
        \DB::beginTransaction();
        try {
            $issue = Issue::create([
                
                'status' => $request->status,
                'user_id' => Auth::id(),
                'project_id' =>$request->project_id,
            ]);
        } catch (\QueryException $ex) {
            \DB::rollback();
            \Log::error($ex->getMessage()); // Log the error message
            dd($ex->getMessage());
            return back()->withInput(['error'=> 'failed to store issues. ----']);
        }
        \DB::commit();

        return redirect('issues')->with('status', 'Success: Project Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        $issue = Issue::with(['issues.users', 'issues.labels'])->findOrFail($issue->id);

        return view('issues.show', [
            'issue' => $issue
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        $users = User::where('is_admin', 2)->get();
        $projects = Project::all();

        return view('issues.create', [
            'issue' => $issue,
            'users' => $users,
            'projects' => $projects,
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        try {
            \DB::beginTransaction();
    
            // Update issue attributes
            $issue->update([
                'status' => $request->status,
                'project_id' => $request->project_id,
                // Add more fields as needed
            ]);
    
            \DB::commit();
    
            return redirect('issues')->with('status', 'Success: Issue Updated');
        } catch (\Exception $ex) {
            \DB::rollback();
            \Log::error($ex->getMessage());
            return back()->withInput()->withErrors(['error' => 'Failed to update the issue.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        \DB::beginTransaction();
        try {
            $issue->delete();
        } catch (\QueryException $ex) {
            \DB::rollback();
            return back()->withInput();
        }
        \DB::commit();

        return redirect('issues')->with('status', 'Success: Task Deleted!');
    }
}
