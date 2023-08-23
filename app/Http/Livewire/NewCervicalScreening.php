<?php

namespace App\Http\Livewire;

use Livewire\Component;


class NewCervicalScreening extends Component
{
    public $selectedText;
    public $current_form_step = 1;
    public $total_form_steps = 8;
    public $current_form_name;
    public $total_risk_score = 0;
    public $selectedRisks = [];
    public $fliped_mapping;
    public $checkboxChecked = false;
    public $checkedValue;
    public $previewMode = 0;
    public $scoreMapping = array(
        "Compliant"=>0,
        "Not compliant"=>1,
        "3 or more" => 1,
        "Less than 3" =>0,
        "Under age 16"=>1,
        "Age 16 or older"=>0,
        "Have not had sex"=>0,
        "One partner/None"=>0,
        "More than one partner"=>1,
        "Postive"=>1,
        "Negative"=>0,
        "HPV vaccinated"=>0,
        "Not HPV vaccinated"=>1,
        "Unsure hpv vaccinated"=>1,
        "Yes with no condom"=>1,
        "No with condom"=>0,
        "Yes with cancer",
        "No cancer",
        "Yes smoker"=>1,
        "Not smoker"=>0,
        "Yes With stds"=>1,
        "No stds"=>0,
        "Un sure"=>0
    );

    private $advanced_illness_symptoms = array(
            'difficulty or painful bowel movements or urination',
            'bleeding from rectum or blood in urine',
            'swelling of the legs',
            'pain in the abdomen',
            'extreme fatigue'
    );

    public $advanced_illness_len;

    private $formNames = array(
        "basic_info",
        "bio_info",
        "address_info",
        "symptoms_indicating_advanced_illness",
        "eligibility_confirmation",
        "eligibility_criteria"
    );


    private $compliantWithHivMedication = array(
        array(0,"Compliant","Compliant"),
        array(1,"Not compliant","Not compliant")
    );

    public $been_hpv_vaccinated = array(
        array(0,"Yes","HPV vaccinated"),
        array(1,"No","Not HPV vaccinated"),
        array(1,"Unsure","Unsure hpv vaccinated"),
    );

    private $numberOfTimesBeenPregnant = array(
        array(1,"3 or more",'3 or more'),
        array(0,"Less than 3",'Less than 3')
    );

    private $possessAnyOfTheseSymptoms = array(
        'Viginal bleeding after sexual intercourse',
        'Vaginal bleeding aftermenopause',
        'Vaginal bleeding between menstrual periods or menstrual periods that are heavier or longer than normal',
        'Pelvic pain or pain during sex',
        'Heavy, watery, bloody, or foul-smelling vaginal discarge'
    );

    public $general_eligiblity_true = array(
        "female",
        "21 years and older",
        "No"
    );

    public $current_eligiblity_true = array(
        "less than 30 days",
        "No"
    );



    //BASIC INFO
    public $date_of_visit;
    public $dic_name = "mulago hospital";
    public $location;
    public $hotspot;

    //CLIENT BIO INFO
    public $client_name;
    public $client_id;
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
    public $general_eligiblity_status = false;

    //CURRENT ELIGIBILITY CONFIRMATION
    public $currently_menstruating;
    public $currently_menstruating_recommendation;
    public $days_since_last_menstruation_period;
    public $last_menstruation_period_recommendation;
    public $currently_pregnant_or_been_past_three_mnth;
    public $current_eligiblity_status = false;

    //IMMEDIATE SCREENING
    public $possess_symptoms_indicating_advanced_illness;
    public $symptoms_indicating_advanced_illness = [];
    public $sign_of_advanced_illness_symptoms;


    //RISK CLARIFICATION
    public $first_age_of_sexual_intercourse;
    public $number_of_sexual_partners_past_six_month;
    public $regular_sexual_intercourse_without_condom;
    public $hiv_status;
    public $compliant_with_hiv_medication;
    public $smoke_cigarettes;
    public $been_diagonosed_with_stds;
    public $number_of_pregnancies;
    public $hpv_vaccinated;
    public $parents_and_grandparents_been_with_cancer;
    public $symptoms_possessed = [];

    //CLIENT REFFERAL
    public $client_interested_to_receive_screening;
    public $client_referred_for_treatment;
    public $organisation_referred;
    public $reason_client_was_not_referred_for_treatment;
    public $no_referral_option_comment;

    protected $rules = [
        'date_of_visit' => 'required|date',
        'dic_name' =>'required|min:4',
        'location' => 'required|min:4',
        'hotspot' => 'required|min:4',

        'client_name' =>'required|min:4',
        'client_id'=>'required|min:4',
        'date_of_birth'=>'required|date',
        'nationality' =>'required|min:4',
        'population_category' =>'required',
       // 'other_population_category'=>'required|min:4',
        'gender'=>'required',
        'telephone_contact'=>'required|numeric|min:10',

        'district'=>'required|min:10',
        'county'=>'required|min:10',
        'subcounty'=>'required|min:10',
        'parish'=>'required|min:10',
        'village'=>'required|min:10',
        'zone'=>'required|min:10',

        'sex_at_birth'=>'required',
        'client_age'=>'required',
        'had_total_hysterectomy'=>'required',
        'been_on_cervical_cancer_treatment'=>'required',
        'screened_negative_of_cervical_cancer_past_tweleve_mnth'=>'required',

        'currently_menstruating'=>'required',
        'currently_pregnant_or_been_past_three_mnth'=>'required',


        //'possess_symptoms_indicating_advanced_illness'=>'required',
        //'symptoms_indicating_advanced_illness'=>'required',
        //'sign_of_advanced_illness_symptoms'=>'required',

        'first_age_of_sexual_intercourse'=>'required',
        'number_of_sexual_partners_past_six_month'=>'required',
        'regular_sexual_intercourse_without_condom'=>'required',
        'hiv_status'=>'required',
        'smoke_cigarettes'=>'required',
        'been_diagonosed_with_stds'=>'required',
        'hpv_vaccinated'=>'required',
        'number_of_pregnancies'=>'required',
        'parents_and_grandparents_been_with_cancer'=>'required',
        //'symptoms_possessed'=>'required',

        'client_interested_to_receive_screening'=>'required',
        'client_referred_for_treatment'=>'required',
        //'organisation_referred'=>'required',
        //'reason_client_was_not_referred_for_treatment'=>'required',
        //'no_referral_option_comment'=>'required',

    ];


    public $nextForm;
    public $nextFormNo;

    public function handleSave(){

    }

    public function updated($dic_name){
        $this->validateOnly($dic_name);
    }


    public function validateForms(){
        if ($this->current_form_step == $this->total_form_steps){
            $this->enablePreviewBtn = true;
        }
        if($this->current_form_step == 1){
            if ($this->validate([
                'date_of_visit' => 'required|date',
                'dic_name' =>'required|min:4',
                'location' => 'required|min:4',
                'hotspot' => 'required|min:4',
            ])){
                    $this->current_form_step = $this->current_form_step+1;
            }
            $this->current_form_step = $this->current_form_step+1;
        }elseif($this->current_form_step == 2){
            if ($this->validate([
                'client_name' =>'required|min:4',
                'client_id'=>'required|min:4',
                'date_of_birth'=>'required|date',
                'nationality' =>'required|min:4',
                'population_category' =>'required',
               // 'other_population_category'=>'required|min:4',
                'gender'=>'required',
                'telephone_contact'=>'required|numeric|min:10'
            ])){
                    $this->current_form_step = $this->current_form_step+1;
            }
            $this->current_form_step = $this->current_form_step+1;
        }elseif($this->current_form_step == 3){
            if ($this->validate([
                'district'=>'required|min:10',
                'county'=>'required|min:10',
                'subcounty'=>'required|min:10',
                'parish'=>'required|min:10',
                'village'=>'required|min:10',
                'zone'=>'required|min:10',
                ])){
                   $this->current_form_step = $this->current_form_step+1;
            }
            $this->current_form_step = $this->current_form_step+1;
        }elseif($this->current_form_step == 4){
            if ($this->validate([
                'sex_at_birth'=>'required',
                'client_age'=>'required',
                'had_total_hysterectomy'=>'required',
                'been_on_cervical_cancer_treatment'=>'required',
                'screened_negative_of_cervical_cancer_past_tweleve_mnth'=>'required',
                ])){
                    $this->current_form_step = $this->current_form_step+1;
            }
            $this->current_form_step = $this->current_form_step+1;
        }elseif($this->current_form_step == 5){
            if ($this->validate([
                'currently_menstruating'=>'required',
                'currently_pregnant_or_been_past_three_mnth'=>'required',
                ])){
                    $this->current_form_step = $this->current_form_step+1;
            }
        }elseif($this->current_form_step == 6){
            $this->current_form_step = $this->current_form_step+1;
        }elseif($this->current_form_step == 7){
            if ($this->validate([
                //'first_age_of_sexual_intercourse'=>'required',
                'number_of_sexual_partners_past_six_month'=>'required',
                'regular_sexual_intercourse_without_condom'=>'required',
                'hiv_status'=>'required',
                'smoke_cigarettes'=>'required',
                'been_diagonosed_with_stds'=>'required',
                'hpv_vaccinated'=>'required',
                'number_of_pregnancies'=>'required',
                'parents_and_grandparents_been_with_cancer'=>'required',
                ])){
                    $this->current_form_step = $this->current_form_step+1;
            }
        }
    }

    public function render()
    {
        $this->advanced_illness_len = count($this->advanced_illness_symptoms);
        $trueOrFalse = ['Yes','No'];
        $sex =['male','female','unknown'];
        $age =['Under 21 years','21 years and older'];
        $populationCat = ['FSW','WWUID','AGYW','Others'];
        $lastMenstruation = [
            'less_than_30_days'=>'',
            'more_than_30_days'=>'recommended to get a pregnancy test'
        ];
        $menstruationState = [
            'Yes'=>'wait to get screened when you are not menstruating',
            'No'=>'go to get screened before your next menstruation',

        ];
        $pregnancyState = [
            'Yes'=>'go to get screened when you are not pregnant and wait for 3 months after being pregnant',
            'No'=>'',
            'Unsure' =>'recommended to get a pregnancy test'
        ];
        $condomUsage =[[1,"Yes","Yes no condom"],[0,'No','No with condom']];
        $smoker =[[1,"Yes","Yes smoker"],[0,'No','No smoker']];
        $withStds =[[1,"Yes","Yes stds"],[0,'No','No stds']];
        $parentsWithCancer =[[1,"Yes","Yes with cancer"],[0,'No','No cancer']];
        $ageOfFirstSexualIntercourse =[[1,'Under age 16','Under age 16'],[0,'Age 16 or older','Age 16 or older'], [0,'Have not had sex','Have not had sex']];
        $numberOfsexualPartnersInSixMnth = [[0,'One partner/None','One partner/None'],[1,'More than one partner','More than one partner']];
        $riskHivStatus = [[1,'Postive','Postive'],[0,'Negative','Negative'],[0,'Unsure hiv','Unsure hiv']];
        $notReferredReason = ['Eligible','Ineligible','Not willing/Not interested','No referral option'];


        $extraData = [
            "condom_usage"=>$condomUsage,
            "ciga_smoker"=>$smoker,
            "with_stds"=>$withStds,
            "parents_with_cancer"=>$parentsWithCancer,
            "trueOrFalse" => $trueOrFalse,
            "sex" => $sex,
            "age" => $age,
            "populationCat" => $populationCat,
            "lastMenstruation" => $lastMenstruation,
            "menstruationState" => $menstruationState,
            "pregnancyState" => $pregnancyState,
            "risk_hiv_status" => $riskHivStatus,
            "risk_true_false" =>$trueOrFalse,
            //"hpv_vaccinated" => $this->hpvVaccinated,
            "age_of_first_sexual_intercourse" => $ageOfFirstSexualIntercourse,
            "no_of_sexual_partners_past_six_mnth" => $numberOfsexualPartnersInSixMnth,
            "symptomsIndicatingAdvancedIllness"=> $this->advanced_illness_symptoms,
            "compliant_with_hiv_medica" => $this->compliantWithHivMedication,
            "no_of_times_been_pregnant" =>$this->numberOfTimesBeenPregnant,
            "possession_of_these_symptoms"=>$this->possessAnyOfTheseSymptoms,
            "not_referred_reason" =>  $notReferredReason
        ];

        return view('livewire.new-cervical-screening',$extraData);
    }

    public function preview(Request $request){
        $data = $request->all();
        return redirect()->route('cervicalCancer.preview',['data'=>$data]);
    }

    public function previous(){
        if($this->current_form_step!=1){
            $this->current_form_step = $this->current_form_step-1;
        }
    }

    public function updateSelectedRisks($name,$label,$dependency=''){
        $this->selectedText = $label;
       // $this->total_risk_score = $this->total_risk_score - array_sum(array_intersect_key($this->scoreMapping, array_flip($this->selectedRisks)));
       if ($name && $label){
           // $this->selectedRisks[$name] = $label;
            //if($this->selectedRisks[$name] ==)
           // $this->total_risk_score = $this->total_risk_score + array_sum(array_intersect_key($this->scoreMapping, array_flip($this->selectedRisks)));
            $this->fliped_mapping = array_flip($this->selectedRisks);
            $this->emit('riskScoreChanged',$this->total_risk_score);
            //$this->selectedRisks = [];
       }
    }

    public function updateCheckedRisks($checked, $value){
        $this->checkedValue = $value;
        $this->checkboxChecked = $checked;
        if ($value && $checked){
            $this->total_risk_score = $this->total_risk_score + 1;
            $this->emit('riskScoreChanged',$this->total_risk_score);// count($this->symptoms_possessed);
        }elseif($value && !$checked){
            $this->total_risk_score = $this->total_risk_score-1;
            $this->emitup('riskScoreChanged',$this->total_risk_score);
        }
    }

    public function enablePreviewMode(){
        if ($this->validate([
            'client_interested_to_receive_screening'=>'required',
            'client_referred_for_treatment'=>'required',
            ])){
                $this->previewMode = 1;
            }

    }

    public function disablePreviewMode(){
        $this->previewMode = 0;
    }

    public function determineGeneralEligiblity(){
        if (in_array($sex_at_birth,$general_eligiblity_true) &&
        in_array($client_age,$general_eligiblity_true) &&
        in_array($had_total_hysterectomy,$general_eligiblity_true) &&
        in_array($screened_negative_of_cervical_cancer_past_tweleve_mnth,general_eligiblity_true)
        ){
            $this->general_eligiblity_status = true;
        }else{
            $this->general_eligiblity_status = false;
        }
    }

    public function determineCurrentEligiblity(){
        if(in_array($currently_menstruating,$current_eligiblity_true) &&
        in_array($days_since_last_menstruation_period,$current_eligiblity_true) &&
        in_array($currently_pregnant_or_been_past_three_mnth,$current_eligiblity_true)){
            $this->current_eligiblity_status = true;
        }else{
            $this->current_eligiblity_status = false;
        }
    }


}
