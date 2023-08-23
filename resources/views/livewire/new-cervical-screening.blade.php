<div>
    @php
        $messages = [''];
    @endphp
    <x-form direction='col' wire:submit.prevent="preview" name="dfr">
        <div class=" {{ $previewMode == 1 ? 'border-2 border-red-400 rounded-md' : '' }}">
            @if ($current_form_step == 1 || $previewMode == 1)
                <div name="basic_info" id="basic-info"
                    class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                    <div
                        class="text-center text-lg font-semibold uppercase {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                        Basic information
                    </div>
                    <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl border-red-400 bg-white' : '' }}">
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="dic name" labelClass="w-2/12"
                                :messages="$messages" labelvalue="dic name" />
                            @error('dic_name')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="location" labelClass="w-2/12"
                                :messages="$messages" labelvalue="location" />
                            @error('location')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="hotspot" labelClass="w-2/12"
                                :messages="$messages" labelvalue="hotspot" />
                            @error('hotspot')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="date of visit" labelClass="w-2/12"
                                :messages="$messages" labelvalue="date of visit" type="date" />
                            @error('date_of_visit')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            @endif

            @if ($current_form_step == 2 || $previewMode == 1)
                <div name="bio_info" id="bio-info"
                    class="p-0 m-0 {{ $previewMode == 0 ? 'pb-8' : '' }} transition-all {{ $previewMode == 1 ? 'bg-red-400 pb-0' : '' }}">
                    <div
                        class="text-center text-lg font-semibold uppercase {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                        <p>client bio data</p>
                    </div>
                    <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl border-red-400 bg-white' : '' }}">
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="client name" labelClass="w-3/12"
                                :messages="$messages" labelvalue="client name" />
                            @error('client_name')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="client id" labelClass="w-3/12"
                                :messages="$messages" labelvalue="client id" />
                            @error('client_id')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="date of birth" labelClass="w-3/12"
                                :messages="$messages" labelvalue="date of birth" type="date" />
                            @error('date_of_birth')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="nationality" labelClass="w-3/12"
                                :messages="$messages" labelvalue="nationality" />
                            @error('nationality')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="telephone contact"
                                labelClass="w-3/12" :messages="$messages" labelvalue="telephone contact" />
                            @error('telephone_contact')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="gender" labelClass="w-3/12"
                                :messages="$messages" labelvalue="gender" />
                            @error('gender')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-select-input-group direction="row" :previewmode="$previewMode" name="population category"
                                labelClass="w-3/12" :messages="$messages" :options="$populationCat"
                                labelvalue="population category" />
                            @error('population_category')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        @if ($population_category == $populationCat[3] || ($other_population_category != '' && $previewMode == 1))
                            <div class="flex flex-col">
                                <x-input-group direction="row" :previewmode="$previewMode" name="other population category"
                                    labelClass="w-3/12" :messages="$messages" labelvalue="other population category" />
                                @error('other_population')
                                    <div class="flex mt-0 pt-0">
                                        <p class="grow"></p>
                                        <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            @if ($current_form_step == 3 || $previewMode == 1)
                <div name="address_info" id="address-info"
                    class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                    <div
                        class="text-center text-lg font-semibold uppercase {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                        client address
                    </div>
                    <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl border-red-400 bg-white' : '' }}">
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="district" labelClass="w-3/12"
                                :messages="$messages" labelvalue="district" />
                            @error('district')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="county" labelClass="w-3/12"
                                :messages="$messages" labelvalue="county" />
                            @error('county')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="subcounty" labelClass="w-3/12"
                                :messages="$messages" labelvalue="subcounty" />
                            @error('subcounty')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="parish" labelClass="w-3/12"
                                :messages="$messages" labelvalue="parish" />
                            @error('parish')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="village" labelClass="w-3/12"
                                :messages="$messages" labelvalue="village" />
                            @error('village')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-group direction="row" :previewmode="$previewMode" name="zone" labelClass="w-3/12"
                                :messages="$messages" labelvalue="zone" />
                            @error('zone')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
            @endif

            @if ($current_form_step == 4 || $previewMode == 1)
                <div name="eligibility_criteria" id="eligiblity-criteria"
                    class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                    <div
                        class="text-center text-lg font-semibold uppercase {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                        general eligibility criteria
                    </div>
                    <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl border-red-400 bg-white' : '' }}">
                        <div class="flex flex-col">
                            <x-select-input-group direction="row" :previewmode="$previewMode" name="sex at birth"
                                labelClass="w-10/12" :messages="$messages" :options="$sex"
                                labelvalue="what was your sex at birth?" />
                            @error('sex_at_birth')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <x-select-input-group direction="row" :previewmode="$previewMode" name="client age"
                                labelClass="w-10/12" :messages="$messages" :options="$age"
                                labelvalue="what is your age?" />
                            @error('client_age')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-select-input-group direction="row" :previewmode="$previewMode" name="had total hysterectomy"
                                labelClass="w-10/12" :messages="$messages" :options="$trueOrFalse"
                                labelvalue="Have you ever had a total hysterectomy (removal of the uterus)?" />
                            @error('had_total_hysterectomy')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-select-input-group direction="row" :previewmode="$previewMode"
                                name="been on cervical cancer treatment" labelClass="w-10/12" :messages="$messages"
                                :options="$trueOrFalse"
                                labelvalue="have you ever been on cervical cancer treatment (chemotherapy, radiation)?" />
                            @error('been_on_cervical_cancer_treatment')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-select-input-group direction="row" :previewmode="$previewMode"
                                name="screened negative of cervical cancer past tweleve mnth" labelClass="w-10/12"
                                :messages="$messages" :options="$trueOrFalse"
                                labelvalue="have you screened negative for cervical cancer or HPV in the past 12 months?" />
                            @error('screened_negative_of_cervical_cancer_past_tweleve_mnth')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            @endif

            @if ($current_form_step == 5 || $previewMode == 1)
                <div name="eligibility_confirmation" id="eligibility-confirmation"
                    class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                    <div
                        class="text-center text-lg font-semibold uppercase {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                        current eligibility criteria
                    </div>
                    <div
                        class="px-3 {{ $previewMode == 1 ? 'rounded-2xl rounded-bl-none rounded-br-none border-red-400 bg-white' : '' }}">
                        <div class="flex flex-col gap-1 gap-y-0 ">
                            <div class="flex flex-col">
                                <x-select-input-group2 direction="row" :previewmode="$previewMode"
                                    name="currently menstruating" labelClass="w-10/12" :messages="$messages"
                                    :options="$menstruationState" labelvalue="are you currently menstruating?" />
                                @error('currently_menstruating')
                                    <div class="flex mt-0 pt-0">
                                        <p class="grow"></p>
                                        <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="flex">
                                <div class="grow"></div>
                                <div class="text-sm text-center font-light pt-0 mt-0">
                                    @if ($currently_menstruating == $trueOrFalse[0])
                                        <p
                                            x-text="$wire.currently_menstruating_recommendation='{{ $menstruationState[$currently_menstruating] }}'">
                                        </p>
                                    @endif
                                    @if ($currently_menstruating == $trueOrFalse[1])
                                        <p
                                            x-text="$wire.currently_menstruating_recommendation='{{ $menstruationState[$currently_menstruating] }}'">
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if ($currently_menstruating == $trueOrFalse[1] || ($previewMode == 1 && $days_since_last_menstruation_period != ''))
                            <div class="flex flex-col gap-4">
                                <div class="flex flex-col mb-0 pb-0">
                                    <x-select-input-group2 direction="row" :previewmode="$previewMode"
                                        name="days since last menstruation period" labelClass="w-10/12"
                                        :messages="$messages" :options="$lastMenstruation"
                                        labelvalue="how many days has it been since your last menstruation period started?" />
                                    @error('days_since_last_menstruation_period')
                                        <div class="flex mt-0 pt-0">
                                            <p class="grow"></p>
                                            <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                @if (isset($days_since_last_menstruation_period))
                                    <div class="flex">
                                        <div class="grow"></div>
                                        <div class="text-sm text-center font-light pt-0 mt-0">
                                            <p
                                                x-text="$wire.last_menstruation_period_recommendation='{{ $lastMenstruation[$days_since_last_menstruation_period] }}'">
                                            </p>
                                        </div>

                                    </div>
                                @endif
                            </div>
                        @endif
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col">
                                <x-select-input-group2 direction="row" :previewmode="$previewMode"
                                    name="currently pregnant or been past three mnth" labelClass="w-10/12"
                                    :messages="$messages" :options="$pregnancyState"
                                    labelvalue="Are you currently pregnant or have been pregnant in the past 3 months" />
                                @error('currently_pregnant_or_been_past_three_mnth')
                                    <div class="flex mt-0 pt-0">
                                        <p class="grow"></p>
                                        <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            @if (isset($currently_pregnant_or_been_past_three_mnth))
                                <p>
                                    {{ $pregnancyState[$currently_pregnant_or_been_past_three_mnth] }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @if ($current_form_step == 6 || $previewMode == 1)
                <div name="symptoms_indicating_advanced_illness" id="advanced-illness-symptoms"
                    class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                    <div
                        class="px-3 {{ $previewMode == 1 ? 'rounded-2xl rounded-tl-none rounded-tr-none pt-2 border-red-400 bg-white' : '' }}">
                        <p>
                            The following symptoms may indicate advanced illness or
                            other conditions and should be reported to your clinician:
                            difficulty or painful bowel movements or urination,
                            bleeding from rectum or blood in urine, dull backache,
                            swelling of the legs, pain in the abdomen, and/or extreme
                            fatigue. Do you have any of these symptoms?
                        </p>
                        <x-select-input-group direction="row" :previewmode="$previewMode"
                            name="sign of advanced illness symptoms" labelClass="w-10/12" :messages="$messages"
                            :options="$trueOrFalse" labelvalue="do you have any of these symptoms?" />
                        @php
                            $symptoms_count = count($symptoms_indicating_advanced_illness);
                        @endphp
                        @if (($sign_of_advanced_illness_symptoms == $trueOrFalse[0] && $current_form_step == 6) || $previewMode == 1)
                            <div class="flex flex-col gap-1 pt-0 pl-6 pb-3">
                                @if ($previewMode == 1)
                                    <input type="hidden" wire:model="symptoms_indicating_advanced_illness" />
                                @endif
                                @foreach ($symptomsIndicatingAdvancedIllness as $symptom)
                                    <x-checkbox-input :key="$loop->iteration" :keyindex="$loop->iteration" :previewmode="$previewMode"
                                        name="symptoms indicating advanced illness" :value="$symptom" />
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            @if ($current_form_step == 7 || $previewMode == 1)
                <div name="risk_clarification" id="risk-clarification"
                    class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                    <div
                        class="text-center text-lg font-semibold uppercase {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                        risk classification
                    </div>
                    <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl pt-2 border-red-400 bg-white' : '' }}">
                        <div class="flex flex-col">
                            <x-select-input-group3 direction="row" :previewmode="$previewMode"
                                name="first age of sexual intercourse" labelClass="w-10/12" :messages="$messages"
                                :options="$age_of_first_sexual_intercourse"
                                labelvalue="At what age did you have sexual intercourse for the first time?" />
                            @error('first_age_of_sexual_intercourse')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-select-input-group3 direction="row" :previewmode="$previewMode"
                                name="number of sexual partners past six month" labelClass="w-10/12" :messages="$messages"
                                :options="$no_of_sexual_partners_past_six_mnth"
                                labelvalue="How many sexual partners have you had in the past 6 months?" />
                            @error('number_of_sexual_partners_past_six_month')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-select-input-group3 direction="row" :previewmode="$previewMode"
                                name="regular sexual intercourse without condom" labelClass="w-10/12"
                                :messages="$messages" :options="$condom_usage"
                                labelvalue="Do you regularly have sexual intercourse without a condom?" />
                            @error('regular_sexual_intercourse_without_condom')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-select-input-group3 direction="row" :previewmode="$previewMode" name="hiv status"
                                :dependant="$compliant_with_hiv_medication" labelClass="w-10/12" :messages="$messages" :options="$risk_hiv_status"
                                labelvalue="What is your HIV status?" />
                            @error('hiv_status')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        @if ($hiv_status == $risk_hiv_status[0][1] || ($previewMode == 1 && $compliant_with_hiv_medication != ''))
                            <div class="flex flex-col">
                                <x-select-input-group3 direction="row" :previewmode="$previewMode"
                                    name="compliant with hiv medication" labelClass="w-10/12" :messages="$messages"
                                    :options="$compliant_with_hiv_medica"
                                    labelvalue="Are you compliant with your HIV medications? In other words, do you take your medication as directed by your health care provider?" />
                        @endif
                        <div class="flex flex-col">
                            <x-select-input-group3 direction="row" :previewmode="$previewMode" name="smoke cigarettes"
                                labelClass="w-10/12" :messages="$messages" :options="$ciga_smoker"
                                labelvalue="Do you smoke cigarettes?" />
                            @error('smoke_cigarettes')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-select-input-group3 direction="row" :previewmode="$previewMode" name="been diagonosed with stds"
                                labelClass="w-10/12" :messages="$messages" :options="$with_stds"
                                labelvalue="Have you ever been diagnosed with any Sexually Transmitted Infections (such as chlamydia, gonorrhea, syphilis, etc.) that often cause symptoms such as itchiness, vaginal discharge, or redness?" />
                            @error('been_diagonosed_with_stds')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-select-input-group3 direction="row" :previewmode="$previewMode" name="number of pregnancies"
                                labelClass="w-10/12" :messages="$messages" :options="$no_of_times_been_pregnant"
                                labelvalue="How many times have you been pregnant?" />
                            @error('number_of_pregnancies')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-select-input-group3 direction="row" :previewmode="$previewMode" name="hpv vaccinated"
                                labelClass="w-10/12" :messages="$messages" :options="$been_hpv_vaccinated"
                                labelvalue="Have you ever received an HPV vaccine?" />
                            @error('hpv_vaccinated')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-select-input-group3 direction="row" :previewmode="$previewMode"
                                name="parents and grandparents been with cancer" labelClass="w-10/12"
                                :messages="$messages" :options="$parents_with_cancer"
                                labelvalue="Have your parents or grandparents had cancer?" />
                            @error('parents_and_grandparents_been_with_cancer')
                                <div class="flex mt-0 pt-0">
                                    <p class="grow"></p>
                                    <p class="grow text-left text-sm text-red-500">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <p>Do you currently have any of the following symptoms:</p>
                            <div class="flex flex-col gap-1 pt-3 pl-6 pb-3">
                                @foreach ($possession_of_these_symptoms as $symptom_possessed)
                                    <x-checkbox-input :key="$loop->iteration" :keyindex="$loop->iteration" :previewmode="$previewMode"
                                        wire:key="$symptoms_possessed" name="symptoms possessed"
                                        :value="$symptom_possessed" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($current_form_step == 8 || $previewMode == 1)
                <div name="client_referral" id="client-referral"
                    class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                    <div
                        class="text-center text-lg font-semibold uppercase {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                        client referral
                    </div>
                    <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl pt-2 border-red-400 bg-white' : '' }}">
                        <x-select-input-group direction="row" :previewmode="$previewMode"
                            name="client interested to receive screening" labelClass="w-10/12" :messages="$messages"
                            :options="$trueOrFalse"
                            labelvalue="Is client interested and ready to receive cervical cancer screening?" />
                        <x-select-input-group direction="row" :previewmode="$previewMode" name="client referred for treatment"
                            labelClass="w-10/12" :messages="$messages" :options="$trueOrFalse"
                            labelvalue="Was the client referred for treatment?" />

                        @if ($client_referred_for_treatment == $trueOrFalse[0])
                            <x-input-group direction="row" :previewmode="$previewMode" name="organisation referred"
                                labelClass="w-10/12" :messages="$messages"
                                labelvalue="The client was referred to (name of organization or facility)" />
                        @endif
                        @if ($client_referred_for_treatment == $trueOrFalse[1])
                            <x-select-input-group direction="row" :previewmode="$previewMode"
                                name="reason client was not referred for treatment" labelClass="w-10/12"
                                :messages="$messages" :options="$not_referred_reason"
                                labelvalue="Specify why client was not referred for treatment" />
                        @endif
                        @if ($reason_client_was_not_referred_for_treatment == $not_referred_reason[3])
                            <x-textarea-input-group direction="row" :previewmode="$previewMode"
                                name="no_referral_option_comment" labelvalue="No referral option comment"
                                labelClass="w-10/12" :messages="$messages" />
                        @endif
                    </div>
                </div>
            @endif
        </div>
        <div class="flex my-3 fixed px-8 bottom-0 left-0 right-0">
            <div class="mr-auto"></div>
            <div class="flex gap-4">
                @if ($previewMode == 0)
                    <x-primary-button id="prev-btn" type="button"
                        wire:click.stop="previous">Previous</x-primary-button>
                @endif
                <div>
                    @if ($current_form_step == $total_form_steps && $previewMode == 0)
                        <x-primary-button id="preview-btn" type="button"
                            wire:click.prevent="enablePreviewMode">Preview</x-primary-button>
                    @endif
                    @if ($current_form_step != $total_form_steps && $previewMode != 1)
                        <x-primary-button id="next-btn" type="button"
                            wire:click.stop="validateForms">Next</x-primary-button>
                    @endif
                    @if ($previewMode == 1)
                        <x-primary-button id="back-btn" type="button"
                            wire:click="disablePreviewMode">Back</x-primary-button>
                    @endif
                </div>
            </div>
        </div>
    </x-form>

    <div class="bg-green-400 hidden">
        <p>DATE OF VISIT: {{ $date_of_visit }}
        <p>PREVIEW STATUS {{ $previewMode }}
        <p>Selected Text: {{ $selectedText }}</p>
        <p>HPV Vaccinated: {{ var_dump($hpv_vaccinated) }}</p>
        <p>Checkbox status: {{ $checkboxChecked }}</p>
        <p>Checkbox value: {{ $checkedValue }}</p>
        <p>Form Name:{{ $nextForm }}</P>
        <p>Form No: k Score: {{ $total_risk_score }}</p>
        <p>Fliped Risks mapping: {{ var_dump($fliped_mapping) }}</p>
        <p>Score mapping: {{ var_dump($scoreMapping) }}</p>
        <p>Symptoms possessed: {{ var_dump($symptoms_possessed) }}</p>

    </div>

</div>
