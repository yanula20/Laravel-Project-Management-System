<?php


namespace App\Http\Controllers;
use App\Project;
use App\Company;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if( Auth::check()) {

            $projects = Project::where('user_id', Auth::user()->id)->get();

            return view('projects.index', ['projects' => $projects]);

        } else {

            return view('auth.login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create( $company_id = null )
     {
         
         $companies = null;

         if(!$company_id){

            $companies = Company::where('user_id', Auth::user()->id)->get();
         }
 
         return view('projects.create',['company_id' => $company_id, 'companies' => $companies]);
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()) {

            $project = Project::create(
                [
                    'name' => $request->input('name'),

                    'description' => $request->input('description'), 

                    'days' => $request->input('days'), 

                    'company_id' => $request->input('company_id'), 

                    'user_id' => Auth::user()->id
                ]);
        } 

        if($project) {

            return redirect()->route('projects.show', ['project' => $project->id])->with('success', 'Project created!');

        } else {

            return back()->withInput()->with('errors', 'Error creating new Project.');

        }      
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $company = Company::where('id', $project->company_id)->first();

        //$company = Company::find($project->company_id)->first();

        $project = Project::where('id', $project->id)->first();

        $comments = $project->comments;
       
        return view('projects.show', ['project' => $project, 'company' => $company, 'comments' => $comments]);
        
    }


    public function adduser(Request $request)
    {

        $project = Project::find( $request->input('project_id') ); //hidden form input

        if(Auth::user()->id === $project->user_id) { 

            $user = User::where('email', $request->input('email'))->first(); 

            $projectUser = ProjectUser::where('user_id', $user->id)->where('project_id', $project->id)->first();

            if($projectUser) {

                return redirect()->route('projects.show', [ 'project' => $project->id])->with('errors', $request->input('email').' is already member of this Project!');
            }

                if($user && $project) {

                    $project->users()->attach($user->id); //attach the user to the project, then to ProjectUser

                    return redirect()->route('projects.show', [ 'project' => $project->id])->with('success', $request->input('email').' was added successfully');
                }    

        }

        return redirect()->route('projects.show', [ 'project' => $project->id])->with('errors', $request->input('email').' This is not your project.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::where('id', $project->id)->first();

        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $projectUpdate = Project::where('id', $project->id)->update([

            'name' => $request->input('name'),

            'description' => $request->input('description'),

            'days' => $request->input('days'),

            ]);

        if($projectUpdate) {

            return redirect()->route('projects.show', ['project' => $project->id])->with('success', 'Project updated sucessfully!');

        } else {

            return back()->withInput()->with('error', 'Project information not updated!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $findProject = Project::where('id', $project->id);

        if (!$findProject) {

            return back()->withInput()->with('error', 'Something went wrong in the database!');
            
        } else {

            $findProject->delete();

            return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
            
        }
    }
}
