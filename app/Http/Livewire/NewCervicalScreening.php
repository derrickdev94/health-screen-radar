<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\BasicInfo;
use App\Models\ClientAddress;
use App\Models\ClientGeneralEligiblity;
use App\Models\ClientCurrentEligiblity;
use App\Models\RiskClassification;
use App\Models\ClientReferral;

use Illuminate\Validation\ValidationException;


class NewCervicalScreening extends Component
{
    public $selectedRiskOption;
    public $finalSelectedRisks = [];
    public $selectedText;
    public $current_form_step = 0;
    public $total_form_steps = 8;
    public $current_form_name;
    public $fliped_mapping;
    public $checkboxChecked = false;
    public $checkedValue;
    public $previewMode = 0;
    private $trueOrFalse = ['Yes', 'No'];
    private $notReferredReason = ['Eligible', 'Ineligible', 'Not willing/Not interested', 'No referral option'];
    private $riskHivStatus = [[1, 'Positive', 'Positive'], [0, 'Negative', 'Negative'], [0, 'Unsure', 'Unsure']];
    private $populationCat = ['FSW', 'WWUID', 'AGYW', 'Others'];
    private $genderAtBirth  = ["Male", "Female"];
    //SELECTION OPTIONS FOR RISK CLASSIFICATION
    private $advanced_illness_symptoms = array(
        'difficulty or painful bowel movements or urination',
        'bleeding from rectum or blood in urine',
        'swelling of the legs',
        'pain in the abdomen',
        'extreme fatigue'
    );

    private $compliantWithHivMedication = array(
        array(0, "Compliant", "Compliant"),
        array(1, "Not compliant", "Not compliant")
    );

    public $been_hpv_vaccinated = array(
        array(0, "Yes", "HPV vaccinated"),
        array(1, "No", "Not HPV vaccinated"),
        // array(1,"Unsure","Unsure hpv vaccinated"),
    );

    private $numberOfTimesBeenPregnant = array(
        array(1, "3 or more", '3 or more'),
        array(0, "Less than 3", 'Less than 3')
    );

    private $possessAnyOfTheseSymptoms = array(
        'Viginal bleeding after sexual intercourse',
        'Vaginal bleeding aftermenopause',
        'Vaginal bleeding between menstrual periods or menstrual periods that are heavier or longer than normal',
        'Pelvic pain or pain during sex',
        'Heavy, watery, bloody, or foul-smelling vaginal discarge'
    );

    //ELIGIBLITY STATUS BASED ON THE ELIGIBLITY CRITERIA
    public $general_eligiblity_true = array(
        "Female",
        "21 years and older",
        "No"
    );

    public $current_eligiblity_true = array(
        "less than 30 days",
        "No"
    );

    public $highCancerRiskCriteria = array(
        "first_age_of_sexual_intercourse" => 'Under age 16',
        "number_of_sexual_partners_past_six_month" => 'More than one partner',
        "regular_sexual_intercourse_without_condom" => 'Yes',
        "hiv_status" => 'Postive',
        "compliant_with_hiv_medication" => 'Not compliant',
        "smoke_cigarettes" => 'Yes',
        "ever_been_diagonosed_with_stds" => 'Yes',
        "number_of_pregnancies" => '3 or more',
        "hpv_vaccinated" => 'No', //plus Unsure
        "parents_and_grandparents_been_with_cancer" => 'Yes',

    );

    //BASIC INFO
    public $dic_name = "mulago hospital";
    public $date_of_visit;
    public $location;
    public $hotspot;

    //CLIENT BIO INFO
    public $client_name;
    public $client_identification;
    public $date_of_birth;
    public $nationality;
    public $population_category;
    public $other_population_category;
    public $gender;
    public $telephone_contact;

    //CLIENT ADDRESS
    public $district;
    public $county;
    public $subcounty;
    public $parish;
    public $village;
    public $zone;

    //GENERAL CLIENT ELIGIBILITY CRETERIA
    public $sex_at_birth;
    public $client_age;
    public $had_total_hysterectomy;
    public $been_on_cervical_cancer_treatment;
    public $screened_negative_of_cervical_cancer_past_tweleve_mnth;
    public $general_eligiblity_status;

    //CURRENT ELIGIBILITY CONFIRMATION
    public $currently_menstruating;
    public $currently_menstruating_comment;
    public $days_since_last_menstruation_period;
    public $last_menstruation_period_comment;
    public $currently_pregnant_or_been_past_three_mnth;
    public $currently_pregnant_or_been_past_three_mnth_comment;
    public $current_eligiblity_status;

    //IMMEDIATE SCREENING
    public $symptoms_indicating_advanced_illness = [];
    public $sign_of_advanced_illness_symptoms;


    //RISK CLARIFICATION
    public $first_age_of_sexual_intercourse;
    public $number_of_sexual_partners_past_six_month;
    public $regular_sexual_intercourse_without_condom;
    public $hiv_status;
    public $compliant_with_hiv_medication;
    public $smoke_cigarettes;
    public $ever_been_diagonosed_with_stds;
    public $number_of_pregnancies;
    public $hpv_vaccinated;
    public $parents_and_grandparents_been_with_cancer;
    public $symptoms_possessed = [];
    public $risk_score = 0;

    //CLIENT REFFERAL
    public $client_interested_to_receive_screening;
    public $client_referred_for_treatment;
    public $organisation_referred;
    public $reason_client_was_not_referred_for_treatment;
    public $no_referral_option_comment;

    public $eligiblity_status = array(
        'general' => array(
            'type' => 'General Eligiblity',
            'statusText' => "Ineligible",
            'status' => false
        ),
        'current' => array(
            'type' => 'Current Eligiblity',
            'statusText' => "Ineligible",
            'status' => false
        )

    );

    protected $bioRules = [
        'client_name' => 'required',
        'client_identification' => 'required',
        'date_of_birth' => 'required|date',
        'nationality' => 'required',
        'gender' => 'required',
        'telephone_contact' => 'required',
        'population_category' => 'required',
        'other_population_category' => '',

    ];

    protected $basicRules = [
        'date_of_visit' => 'required|date',
        'dic_name' => 'required',
        'location' => 'required',
        'hotspot' => 'required',
    ];

    protected $addressRules = [
        'district' => 'required',
        'county' => 'required',
        'subcounty' => 'required',
        'parish' => 'required',
        'village' => 'required',
        'zone' => 'required'
    ];

    protected $generalEligiblityRules = [
        'sex_at_birth' => 'required',
        'client_age' => 'required',
        'had_total_hysterectomy' => 'required',
        'been_on_cervical_cancer_treatment' => 'required',
        'screened_negative_of_cervical_cancer_past_tweleve_mnth' => 'required',
        'general_eligiblity_status' => 'required'
    ];

    protected $currentEligiblityRules = [
        'currently_menstruating' => 'required',
        'currently_menstruating_comment' => '', //
        'days_since_last_menstruation_period' => '',
        'last_menstruation_period_comment' => '', //
        'currently_pregnant_or_been_past_three_mnth_comment' => '', //
        'currently_pregnant_or_been_past_three_mnth' => 'required',
        //'sign_of_advanced_illness_symptoms'=>'required',
        'symptoms_indicating_advanced_illness' => '',
        'current_eligiblity_status' => 'required'
    ];

    protected $riskClassificationRules = [
        'first_age_of_sexual_intercourse' => 'required',
        'number_of_sexual_partners_past_six_month' => 'required',
        'regular_sexual_intercourse_without_condom' => 'required',
        'hiv_status' => 'required',
        'compliant_with_hiv_medication' => '', ///////
        'smoke_cigarettes' => 'required',
        'ever_been_diagonosed_with_stds' => 'required',
        'hpv_vaccinated' => 'required',
        'number_of_pregnancies' => 'required',
        'parents_and_grandparents_been_with_cancer' => 'required',
        'symptoms_possessed' => '', ////
        'risk_score' => 'required' ////
    ];
    protected $referralRules = [
        'client_interested_to_receive_screening' => 'required',
        'client_referred_for_treatment' => 'required',
        'organisation_referred' => '',
        'reason_client_was_not_referred_for_treatment' => '',
        'no_referral_option_comment' => '',
    ];

    // protected $rules = array();

    protected $rules = [
        'client_name' => 'required',
        'client_identification' => 'required',
        'date_of_birth' => 'required|date',
        'nationality' => 'required',
        'gender' => 'required',
        'telephone_contact' => 'required',
        'population_category' => 'required',
        'other_population_category' => '',

        'date_of_visit' => 'required|date',
        'dic_name' => 'required',
        'location' => 'required',
        'hotspot' => 'required',

        'district' => 'required',
        'county' => 'required',
        'subcounty' => 'required',
        'parish' => 'required',
        'village' => 'required',
        'zone' => 'required',

        'sex_at_birth' => 'required',
        'client_age' => 'required',
        'had_total_hysterectomy' => 'required',
        'been_on_cervical_cancer_treatment' => 'required',
        'screened_negative_of_cervical_cancer_past_tweleve_mnth' => 'required',
        'general_eligiblity_status' => 'required',

        'currently_menstruating' => 'required',
        'currently_pregnant_or_been_past_three_mnth' => 'required',
        'sign_of_advanced_illness_symptoms' => 'required', //
        'symptoms_indicating_advanced_illness' => '',
        'current_eligiblity_status' => 'required',

        'first_age_of_sexual_intercourse' => 'required',
        'number_of_sexual_partners_past_six_month' => 'required',
        'regular_sexual_intercourse_without_condom' => 'required',
        'hiv_status' => 'required',
        'smoke_cigarettes' => 'required',
        'ever_been_diagonosed_with_stds' => 'required',
        'hpv_vaccinated' => 'required',
        'number_of_pregnancies' => 'required',
        'parents_and_grandparents_been_with_cancer' => 'required',
        'symptoms_possessed' => '',
        'risk_score' => '',

        'client_interested_to_receive_screening' => 'required',
        'client_referred_for_treatment' => 'required',
        'organisation_referred' => '',
        'reason_client_was_not_referred_for_treatment' => '',
        'no_referral_option_comment' => '',

    ];

    protected $messages = [
        'symptoms_indicating_advanced_illness.required' => 'Select at least one symptom'
    ];



    public function handleSave()
    {
        try {
            $validBasicData = $this->validate($this->basicRules);
            $validBioData = $this->validate($this->bioRules);
            $validAddressData = $this->validate($this->addressRules);
            $validGeneralData = $this->validate($this->generalEligiblityRules);
            $validCurrentData = $this->validate($this->currentEligiblityRules);
            $validRiskData = $this->validate($this->riskClassificationRules);
            $validReferralData = $this->validate($this->referralRules);

            $client = Client::create($validBioData);

            $client->basicInfo()->create($validBasicData);
            $client->clientAddress()->create($validAddressData);
            $client->clientCurrentEligiblity()->create($validCurrentData);
            $client->clientGeneralEligiblity()->create($validGeneralData);
            $client->riskClassification()->create($validRiskData);
            $client->clientReferral()->create($validReferralData);
            return redirect()->route('cervicalCancer.clientInfo');
        } catch (ValidationException $e) {
            session()->flash('invalid_bio_form', true);
            session()->flash('invalid_basic_form', true);
            session()->flash('invalid_address_form', true);
            session()->flash('invalid_general_eligiblity_form', true);
            session()->flash('invalid_current_eligiblity_form', true);
            session()->flash('invalid_riskclassification_form', true);
            session()->flash('invalid_referral_form', true);

            $this->validate(array_merge(
                $this->basicRules,
                $this->bioRules,
                $this->addressRules,
                $this->generalEligiblityRules,
                $this->currentEligiblityRules,
                $this->riskClassificationRules,
                $this->referralRules
            ));
            //
        }
    }

    public function mount(int $client_id = null, string $form_name = '', string $form_state = '')
    {

        $this->previewMode = 0;
        $this->current_form_step = 1;
        if (!empty($client_id) && !empty($form_name) && !empty($form_state)) {
            $this->current_form_step = 0;
            $this->formState = $form_state;
            $this->currentFormName = $form_name;
            $this->clientUpdateId = $client_id;
            $this->clientData = Client::findOrFail($client_id);

            if ($form_state=='view'){
                $this->previewMode = 1;
            }else{
                $this->previewMode = 0;
            }

            if ($form_name == 'bio_form') {
                $this->client_name = $this->clientData->client_name;
                $this->client_identification = $this->clientData->client_identification;
                $this->date_of_birth = $this->clientData->date_of_birth;
                $this->nationality = $this->clientData->nationality;
                $this->gender = $this->clientData->gender;
                $this->telephone_contact = $this->clientData->telephone_contact;
                $this->population_category = $this->clientData->population_category;
                $this->other_population_category = $this->clientData->other_population_category;
            } else if ($form_name == 'basic_form') {
                //dd($this->clientData->basicInfo);
                $this->date_of_visit = $this->clientData->basicInfo->date_of_visit;
                $this->dic_name = $this->clientData->basicInfo->dic_name;
                $this->location = $this->clientData->basicInfo->location;
                $this->hotspot = $this->clientData->basicInfo->hotspot;
            } else if ($form_name == 'address_form') {
                $this->district = $this->clientData->clientAddress->district;
                $this->county = $this->clientData->clientAddress->county;
                $this->subcounty = $this->clientData->clientAddress->subcounty;
                $this->parish = $this->clientData->clientAddress->parish;
                $this->village = $this->clientData->clientAddress->village;
                $this->zone = $this->clientData->clientAddress->zone;
            } else if ($form_name == 'general_form') {
                $this->sex_at_birth = $this->clientData->clientGeneralEligiblity->sex_at_birth;
                $this->client_age = $this->clientData->clientGeneralEligiblity->client_age;
                $this->had_total_hysterectomy = $this->clientData->clientGeneralEligiblity->had_total_hysterectomy;
                $this->been_on_cervical_cancer_treatment = $this->clientData->clientGeneralEligiblity->been_on_cervical_cancer_treatment;
                $this->screened_negative_of_cervical_cancer_past_tweleve_mnth = $this->clientData->clientGeneralEligiblity->screened_negative_of_cervical_cancer_past_tweleve_mnth;
                $this->general_eligiblity_status = $this->clientData->clientGeneralEligiblity->general_eligiblity_status;
            } else if ($form_name == 'current_form') {
                $this->currently_menstruating = $this->clientData->clientCurrentEligiblity->currently_menstruating;
                $this->currently_pregnant_or_been_past_three_mnth = $this->clientData->clientCurrentEligiblity->currently_pregnant_or_been_past_three_mnth;
                $this->sign_of_advanced_illness_symptoms = $this->clientData->clientCurrentEligiblity->symptoms_indicating_advanced_illness !== null ? 'Yes' : 'No';
                $this->symptoms_indicating_advanced_illness = $this->clientData->clientCurrentEligiblity->symptoms_indicating_advanced_illness;
                $this->current_eligiblity_status = $this->clientData->clientCurrentEligiblity->current_eligiblity_status;
            } else if ($form_name == 'risk_form') {
                $this->first_age_of_sexual_intercourse = $this->clientData->riskClassification->first_age_of_sexual_intercourse;
                $this->number_of_sexual_partners_past_six_month = $this->clientData->riskClassification->number_of_sexual_partners_past_six_month;
                $this->regular_sexual_intercourse_without_condom = $this->clientData->riskClassification->regular_sexual_intercourse_without_condom;
                $this->hiv_status = $this->clientData->riskClassification->hiv_status;
                $this->smoke_cigarettes = $this->clientData->riskClassification->smoke_cigarettes;
                $this->ever_been_diagonosed_with_stds = $this->clientData->riskClassification->ever_been_diagonosed_with_stds;
                $this->hpv_vaccinated = $this->clientData->riskClassification->hpv_vaccinated;
                $this->number_of_pregnancies = $this->clientData->riskClassification->number_of_pregnancies;
                $this->parents_and_grandparents_been_with_cancer = $this->clientData->riskClassification->parents_and_grandparents_been_with_cancer;
                $this->symptoms_possessed = $this->clientData->riskClassification->symptoms_possessed;
                $this->risk_score = $this->clientData->riskClassification->risk_score;
                $this->emit('riskScoreChanged', $this->risk_score);
            } else if ($form_name == 'referral_form') {
                $this->client_interested_to_receive_screening = $this->clientData->clientReferral->client_interested_to_receive_screening;
                $this->client_referred_for_treatment = $this->clientData->clientReferral->client_referred_for_treatment;
                $this->organisation_referred = $this->clientData->clientReferral->organisation_referred;
                $this->reason_client_was_not_referred_for_treatment = $this->clientData->clientReferral->reason_client_was_not_referred_for_treatment;
                $this->no_referral_option_comment = $this->clientData->clientReferral->no_referral_option_comment;
            }
        }
    }

    public $currentFormName = '';
    public $formState = 'new';
    public $clientData;
    public $clientUpdateId;

    public function updateForm()
    {
        if ($this->currentFormName == 'bio_form') {
            $validData = $this->validate($this->bioRules);
            Client::where('id', $this->clientUpdateId)
                ->update($validData);
            return redirect()->route('cervicalCancer.clientInfo');
        } else if ($this->currentFormName == 'basic_form') {
            $validData = $this->validate($this->basicRules);
            if (BasicInfo::where('client_id', $this->clientUpdateId)
                ->update($validData)
            ) {
                return redirect()->route('cervicalCancer.basicInfo');
            }
        } else if ($this->currentFormName == 'address_form') {
            $validData = $this->validate($this->addressRules);
            ClientAddress::where('client_id', $this->clientUpdateId)
                ->update($validData);
            return redirect()->route('cervicalCancer.clientAddress');
        } else if ($this->currentFormName == 'general_form') {
            $validData = $this->validate($this->generalEligiblityRules);
            ClientGeneralEligiblity::where('client_id', $this->clientUpdateId)
                ->update($validData);
            return redirect()->route('cervicalCancer.clientGeneralEligiblity');
        } else if ($this->currentFormName == 'current_form') {
            $validData = $this->validate($this->currentEligiblityRules);
            ClientCurrentEligiblity::where('client_id', $this->clientUpdateId)
                ->update($validData);
            return redirect()->route('cervicalCancer.clientCurrentEligiblity');
        } else if ($this->currentFormName == 'risk_form') {
            $validData = $this->validate($this->riskClassificationRules);
            RiskClassification::where('client_id', $this->clientUpdateId)
                ->update($validData);
            return redirect()->route('cervicalCancer.riskClassification');
        } else if ($this->currentFormName == 'referral_form') {
            $validData = $this->validate($this->referralRules);
            ClientReferral::where('client_id', $this->clientUpdateId)
                ->update($validData);
            return redirect()->route('cervicalCancer.clientReferral');
        }
    }

    public function createOrUpdate()
    {
        //dd($this->formState);
        if ($this->formState == 'new') {
            $this->handleSave();
        } else if ($this->formState == 'edit') {
            //dd($this->formState);
            $this->updateForm();
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function validateForms()
    {
        if ($this->current_form_step == $this->total_form_steps) {
            $this->previewMode = 1;
        }

        if ($this->current_form_step == 1) {
            if ($this->validate([
                'date_of_visit' => 'required|date',
                'dic_name' => 'required',
                'location' => 'required',
                'hotspot' => 'required',
            ])) {
                $this->current_form_step = $this->current_form_step + 1;
            }
            //$this->current_form_step = $this->current_form_step+1;
        } elseif ($this->current_form_step == 2) {
            if ($this->validate([
                'client_name' => 'required',
                'client_identification' => 'required',
                'date_of_birth' => 'required|date',
                'nationality' => 'required',
                'population_category' => 'required',
                'other_population_category' => $this->population_category == $this->populationCat[3] ? 'required' : '',
                'gender' => 'required',
                'telephone_contact' => 'required|numeric'
            ])) {
                $this->current_form_step = $this->current_form_step + 1;
            }
            //$this->current_form_step = $this->current_form_step+1;
        } elseif ($this->current_form_step == 3) {
            if ($this->validate([
                'district' => 'required',
                'county' => 'required',
                'subcounty' => 'required',
                'parish' => 'required',
                'village' => 'required',
                'zone' => 'required',
            ])) {
                $this->current_form_step = $this->current_form_step + 1;
                $this->determineGeneralEligiblity();
            }

            //$this->current_form_step = $this->current_form_step+1;
        } elseif ($this->current_form_step == 4) {
            if ($this->validate([
                'sex_at_birth' => 'required',
                'client_age' => 'required',
                'had_total_hysterectomy' => 'required',
                'been_on_cervical_cancer_treatment' => 'required',
                'screened_negative_of_cervical_cancer_past_tweleve_mnth' => 'required',
            ])) {
                $this->current_form_step = $this->current_form_step + 1;
                $this->determineCurrentEligiblity();
            }

            // $this->current_form_step = $this->current_form_step+1;
        } elseif ($this->current_form_step == 5) {
            if ($this->validate([
                'currently_menstruating' => 'required',
                'currently_pregnant_or_been_past_three_mnth' => 'required',
            ])) {
                $this->current_form_step = $this->current_form_step + 1;
            }
            //$this->current_form_step = $this->current_form_step+1;
        } elseif ($this->current_form_step == 6) {
            if ($this->validate([
                'sign_of_advanced_illness_symptoms' => 'required',
                'symptoms_indicating_advanced_illness' => $this->sign_of_advanced_illness_symptoms == $this->trueOrFalse[0] ? 'required' : ''
            ])) {
                $this->current_form_step = $this->current_form_step + 1;
            }
            //$this->current_form_step = $this->current_form_step+1;
        } elseif ($this->current_form_step == 7) {
            if ($this->validate([
                'first_age_of_sexual_intercourse' => 'required',
                'number_of_sexual_partners_past_six_month' => 'required',
                'regular_sexual_intercourse_without_condom' => 'required',
                'hiv_status' => 'required',
                'compliant_with_hiv_medication' => $this->hiv_status == $this->riskHivStatus[0][1] ? 'required' : '',
                'smoke_cigarettes' => 'required',
                'ever_been_diagonosed_with_stds' => 'required',
                'hpv_vaccinated' => 'required',
                'number_of_pregnancies' => 'required',
                'parents_and_grandparents_been_with_cancer' => 'required',
            ])) {
                $this->current_form_step = $this->current_form_step + 1;
            }
            //$this->current_form_step = $this->current_form_step+1;
        }
    }

    public function previous()
    {
        if ($this->current_form_step != 1) {
            $this->current_form_step = $this->current_form_step - 1;
            if ($this->current_form_step == 4) {
                $this->determineGeneralEligiblity();
            };
            if ($this->current_form_step == 5) {
                $this->determineCurrentEligiblity();
            }
        }
    }

    public function enablePreviewMode()
    {
        if ($this->validate([
            'client_interested_to_receive_screening' => 'required',
            'client_referred_for_treatment' => 'required',
            'organisation_referred' => $this->client_referred_for_treatment == $this->trueOrFalse[0] ? 'required' : '',
            'reason_client_was_not_referred_for_treatment' => $this->client_referred_for_treatment == $this->trueOrFalse[1] ? 'required' : '',
            'no_referral_option_comment' => $this->reason_client_was_not_referred_for_treatment == $this->notReferredReason[3] && $this->client_referred_for_treatment == $this->trueOrFalse[1] ? 'required' : ''
        ])) {
            $this->previewMode = 1;
        }
    }


    public function disablePreviewMode()
    {
        $this->previewMode = 0;
    }

    public function render()
    {
        // $this->advanced_illness_len = count($this->advanced_illness_symptoms);

        $sex = ['Male', 'Female', 'Unknown'];
        $age = ['Under 21 years', '21 years and older', 'Yonger'];

        $lastMenstruation = [
            "less than 30 days" => '',
            "more than 30 days" => 'recommended to get a pregnancy test'
        ];
        $menstruationState = [
            'Yes' => 'wait to get screened when you are not menstruating',
            'No' => 'go to get screened before your next menstruation',

        ];
        $pregnancyState = [
            'Yes' => 'go to get screened when you are not pregnant and wait for 3 months after being pregnant',
            'No' => '',
            'Unsure' => 'recommended to get a pregnancy test'
        ];
        $condomUsage = [[1, "Yes", "Yes no condom"], [0, 'No', 'No with condom']];
        $smoker = [[1, "Yes", "Yes smoker"], [0, 'No', 'No smoker']];
        $withStds = [[1, "Yes", "Yes stds"], [0, 'No', 'No stds']];
        $parentsWithCancer = [[1, "Yes", "Yes with cancer"], [0, 'No', 'No cancer']];
        $ageOfFirstSexualIntercourse = [[1, 'Under age 16', 'Under age 16'], [0, 'Age 16 or older', 'Age 16 or older'], [0, 'Have not had sex', 'Have not had sex']];
        $numberOfsexualPartnersInSixMnth = [[0, 'One partner/None', 'One partner/None'], [1, 'More than one partner', 'More than one partner']];

        $extraData = [
            "condom_usage" => $condomUsage,
            "ciga_smoker" => $smoker,
            "with_stds" => $withStds,
            "parents_with_cancer" => $parentsWithCancer,
            "trueOrFalse" => $this->trueOrFalse,
            "sex" => $sex,
            "gender_at_birth" => $this->genderAtBirth,
            "age" => $age,
            "populationCat" => $this->populationCat,
            "lastMenstruation" => $lastMenstruation,
            "menstruationState" => $menstruationState,
            "pregnancyState" => $pregnancyState,
            "risk_hiv_status" => $this->riskHivStatus,

            //"hpv_vaccinated" => $this->hpvVaccinated,
            "age_of_first_sexual_intercourse" => $ageOfFirstSexualIntercourse,
            "no_of_sexual_partners_past_six_mnth" => $numberOfsexualPartnersInSixMnth,
            "symptomsIndicatingAdvancedIllness" => $this->advanced_illness_symptoms,
            "compliant_with_hiv_medica" => $this->compliantWithHivMedication,
            "no_of_times_been_pregnant" => $this->numberOfTimesBeenPregnant,
            "possession_of_these_symptoms" => $this->possessAnyOfTheseSymptoms,
            "not_referred_reason" =>  $this->notReferredReason,
            // "current_form_step" => $this->current_form_step
        ];

        //$validInput = $this->getErrorBag()->count();
        // if (count($this->getErrorBag()->all()) > 0){
        //     try{

        //     // }catch(\Illuminate\Validation\ValidationException $e){
        //     //     $this->current_form_step = 2;
        //     //     $this->addError($e);
        //     //     //session()->flash('errors',$e);
        //     // }
        //    //return view('livewire.new-cervical-screening',$extraData);
        // }
        return view('livewire.new-cervical-screening', $extraData)->layout(\App\View\Components\ContentLayout::class);
    }

    public $selectedField;
    public function updateSelectedRisks($value, $name)
    {
        $this->selectedText = $value;
        $this->selectedField = $name;
        $selectedRisks =  $this->finalSelectedRisks;

        if (
            $this->highCancerRiskCriteria[$name] == $value
        ) {
            $selectedRisks[$name] = $value;
            $this->finalSelectedRisks = $selectedRisks;
            $this->risk_score = $this->risk_score + 1;
            $this->emit('riskScoreChanged', $this->risk_score);
        } else {
            if (array_key_exists($name, $this->finalSelectedRisks)) {
                $selectedRisks = $this->finalSelectedRisks;
                unset($selectedRisks[$name]);
                $this->finalSelectedRisks = $selectedRisks;
                $this->risk_score = $this->risk_score - 1;
            }
            $this->emit('riskScoreChanged', $this->risk_score);
        }
    }

    public function updateCheckedRisks($checked, $value)
    {
        $this->checkedValue = $value;
        $this->checkboxChecked = $checked;
        if (in_array($value, $this->symptoms_possessed)) {
            $this->risk_score = $this->risk_score + 1;
            $this->emit('riskScoreChanged', $this->risk_score);
        } else {
            $this->risk_score = $this->risk_score - 1;
            $this->emit('riskScoreChanged', $this->risk_score);
        }
    }

    public function determineGeneralEligiblity()
    {
        if (
            in_array($this->sex_at_birth, $this->general_eligiblity_true) &&
            in_array($this->client_age, $this->general_eligiblity_true) &&
            in_array($this->had_total_hysterectomy, $this->general_eligiblity_true) &&
            in_array($this->screened_negative_of_cervical_cancer_past_tweleve_mnth, $this->general_eligiblity_true)
        ) {
            $this->eligiblity_status['general'] =
                [
                    'type' => 'General eligibility',
                    'statusText' => 'eligible',
                    'status' => true
                ];
            $this->general_eligiblity_status = 'eligible';
        } else {
            $this->eligiblity_status['general'] =
                [
                    'type' => 'General eligibility',
                    'statusText' => 'ineligible',
                    'status' => false
                ];
            $this->general_eligiblity_status = 'ineligible';

            $this->emit('updateEligiblityStatus', $this->eligiblity_status);
        }
        $this->emit('updateEligiblityStatus', $this->eligiblity_status);
    }

    public function determineCurrentEligiblity()
    {
        if (
            in_array($this->currently_menstruating, $this->current_eligiblity_true) &&
            in_array($this->currently_pregnant_or_been_past_three_mnth, $this->current_eligiblity_true)

        ) {
            $this->eligiblity_status['current'] =
                [
                    'type' => 'Current eligibility',
                    'statusText' => 'eligible',
                    'status' => true
                ];
            $this->current_eligiblity_status = 'eligible';
            $this->emit('updateEligiblityStatus', $this->eligiblity_status);

        } else {
            $this->eligiblity_status['current'] =
                [
                    'type' => 'Current eligibility',
                    'statusText' => 'ineligible',
                    'status' => false
                ];
            $this->current_eligiblity_status = 'ineligible';
            $this->emit('updateEligiblityStatus', $this->eligiblity_status);
        }

        if (in_array($this->days_since_last_menstruation_period, $this->current_eligiblity_true)) {
            $this->eligiblity_status['current'] =
                [
                    'type' => 'Current eligibility',
                    'statusText' => 'eligible',
                    'status' => true
                ];
            $this->current_eligiblity_status = 'eligible';
            $this->emit('updateEligiblityStatus', $this->eligiblity_status);
        } else {
            $this->eligiblity_status['current'] =
                [
                    'type' => 'Current eligibility',
                    'statusText' => 'ineligible',
                    'status' => false
                ];
            $this->current_eligiblity_status = 'ineligible';
            $this->emit('updateEligiblityStatus', $this->eligiblity_status);
        }
        $this->emit('updateEligiblityStatus', $this->eligiblity_status);
    }

    public function resetCurrentEligiblitySelectFields()
    {
    }

    public function resetReferralSelctFields()
    {
        $this->organisation_referred = '';
        $this->reason_client_was_not_referred_for_treatment = 'selected more';
        $this->no_referral_option_comment = '';
    }
}
