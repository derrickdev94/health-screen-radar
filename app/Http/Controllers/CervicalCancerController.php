<?php

namespace App\Http\Controllers;

use App\Models\CervicalCancer;
use App\Models\BasicInfo;
use App\Models\Client;
use App\Models\ClientAddress;
use App\Models\ClientGeneralEligiblity;
use App\Models\ClientCurrentEligiblity;
use App\Models\RiskClassification;
use App\Models\ClientReferral;
use Illuminate\Http\Request;

class CervicalCancerController extends Controller
{
    public function index(){
        return view('cervical-cancer.index');
    }

    public function create()
    {
        return view('cervical-cancer.new');
    }

    public function showBasicInfo(BasicInfo $basicInfo)
    {
        return view('cervical-cancer.view-basic-info');
    }

    public function showClient(Client $client)
    {
        return view('cervical-cancer.view-client');
    }

    public function showClientAddress(ClientAddress $clientAddress)
    {
        return view('cervical-cancer.view-client-address');
    }

    public function showClientGeneralEligiblity(ClientGeneralEligiblity $clientGeneralEligiblity)
    {
        return view('cervical-cancer.view-client-general-eligiblity');
    }

    public function showClientCurrentEligiblity(ClientCurrentEligiblity $clientCurrentEligiblity)
    {
        return view('cervical-cancer.view-client-current-eligiblity');
    }

    public function showRiskClassification(RiskClassification $riskClassification)
    {
        return view('cervical-cancer.view-risk-classification');
    }

    public function showClientReferral(ClientReferral $clientReferral)
    {
        return view('cervical-cancer.view-client-referral');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CervicalCancer $cervicalCancer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CervicalCancer $cervicalCancer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CervicalCancer $cervicalCancer)
    {
        //
    }

    public function preview(Request $request){
        $formData = $request->all();
        session(['formData'=>$formData]);
        return view('cervical-cancer.preview');
    }
}
