<?php

namespace App\Http\Controllers;
use Mail;
use App\Companies;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompany;
use App\Http\Requests\UpdateCompany;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view(
            'companies.index', 
            ['companies' => Companies::paginate(10)]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        $request->validated();
        $company = new Companies();
        $company->fill($request->all());
        $company->save_logo(
            $request->file('logo')->path(),
            $request->file('logo')->getMimeType()
        );
        $company->save();
        // Send email
        Mail::send('emails.sample', [], function ($m) {
            $m->from('techtest@vue-tech-test.damianpokorski.com', 'Vue Tech Test');
            $m->to('damianpokorski@hotmail.com', 'Damian Pokorski')->subject('Vue tech test - new company has been created!');
        });

        //
        return redirect()->action('CompaniesController@show', ['id' => $company->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $company)
    {
        return view('companies.show', ['model' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $company)
    {
        //
        return view('companies.edit', ['model' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompany $request, Companies $company)
    {
        $request->validated();
        $company->fill($request->all());
        if ($request->file('logo')) {
            $company->save_logo(
                $request->file('logo')->path(),
                $request->file('logo')->getMimeType()
            );   
        }
        $company->save();
        return redirect()->action('CompaniesController@show', ['id' => $company->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $company)
    {
        //
        $company->delete();
        return redirect()->back();
    }
}
