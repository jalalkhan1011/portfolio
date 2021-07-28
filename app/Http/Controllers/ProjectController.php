<?php

namespace App\Http\Controllers;

use App\Http\Traits\ImageTraits;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use ImageTraits;

    const UPLOAD_DIR = '/uploads/project_image/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('user_id',auth()->user()->id)->get();

        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        if($request->has('image')){
            $data['image'] = $this->uploadproject($request->image,'project_image');
        }

        Project::create($data);

        session()->flash('message','Project created successfully!');
        session()->flash('alert-class','alert-success');

        return redirect('admin/projects');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        if($request->has('image')){
            $this->unlink($project->image);
            $data['image'] = $this->uploadproject($request->image,'project_image');
        }

        $project->update($data);

        session()->flash('message','Project updated successfully!');
        session()->flash('alert-class','alert-success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->unlink($project->image);
        $project->delete();

        session()->flash('message','Projects Deleted successfully!');
        session()->flash('alert-class','alert-danger');

        return redirect('admin/projects');
    }
}
