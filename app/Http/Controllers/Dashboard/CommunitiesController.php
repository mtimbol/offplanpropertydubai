<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommunitiesController extends Controller
{
    public function index($city)
    {
    	$communities = $city->communities;
    	return view('dashboard.communities.index', compact('city', 'communities'));
    }

    public function show($city, $community)
    {
        return view('dashboard.communities.show', compact('city', 'community'));
    }

    public function store(Request $request, $city)
    {
    	$city->communities()->create($request->all());

    	flash()->success('Community has been successfully saved.');
    	return back();
    }

    public function update(Request $request, $city, $community)
    {
        $community->update($request->all());

        flash()->success('Community has been successfully updated.');
        return back();
    }

    public function destroy($city, $community)
    {
        $community->delete();

        flash()->success('Community has been successfully removed.');
        return back();
    }
}
