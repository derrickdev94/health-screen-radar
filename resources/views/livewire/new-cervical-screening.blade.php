<div class="bg-gray-100">
    @php
    $messages = [''];
    @endphp
    <x-form id="screen-form" x-ref="screeningForm" direction='col' wire:submit.prevent="handleSave()">
        <div class=" bg-orange-500 px-1 sticky top-16">
            <div class="flex flex-wrap gap-3 mb-1 pb-1 pt-0.5 px-1 rounded-b-md bg-gray-200">
                <div class="grow ">
                    <livewire:reactive-header />
                </div>
                <div class="flex justify-end gap-2 md:gap-3 grow md:grow-0">
                    <x-primary-blue-button class=" disabled:bg-blue-400" :previewMode="$previewMode" type="submit">
                        <x-icons.document size="4" />
                        Save
                    </x-primary-blue-button>
                    <x-danger-button disabled class="disabled:bg-red-400" type="button">
                        <x-icons.trash size="4" />
                        delete
                    </x-danger-button>
                </div>
            </div>
        </div>
        <div class="p-1 md:p-6">
            <div class="bg-white dark:bg-gray-800 p-1 md:p-6 shadow-sm sm:rounded-lg">
                <div class=" {{ $previewMode == 1 ? 'border-2 border-red-400 rounded-md' : '' }}">

                    @if ($current_form_step == 1 || session()->has('invalid_basic_form') || $previewMode == 1)
                    <div name="basic_info" id="basic-info"
                        class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                        <div
                            class="text-center text-lg font-semibold uppercase {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                            Basic information
                        </div>
                        <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl border-red-400 bg-white' : '' }}">

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="dic name" labelvalue="DIC Name" class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="dic name" />
                                    @error('dic_name')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="location" labelvalue="location" class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="location" />
                                    @error('location')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="hotspot" labelvalue="hotspote" class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="hotspot" />
                                    @error('hotspot')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="date of visit" labelvalue="date of visit"
                                    class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="date of visit" type="date" />
                                    @error('date_of_visit')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- CLIENT BIO DATA --}}
                    @if ($current_form_step == 2 || session()->has('invalid_bio_form') || $previewMode == 1)
                    <div name="bio_info" id="bio-info"
                        class="p-0 m-0 {{ $previewMode == 0 ? 'pb-8' : '' }} transition-all {{ $previewMode == 1 ? 'bg-red-400 pb-0' : '' }}">
                        <div
                            class="text-center text-lg font-semibold uppercase {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                            <p>client bio data</p>
                        </div>
                        <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl border-red-400 bg-white' : '' }}">

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="client name" labelvalue="client name"
                                    class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="client name" />
                                    @error('client_name')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="client identification" labelvalue="client id"
                                    class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="client identification" />
                                    @error('client_identification')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="date of birth" labelvalue="date of birth"
                                    class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="date of birth" type="date" />
                                    @error('date_of_birth')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="nationality" labelvalue="nationality"
                                    class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="nationality" />
                                    @error('nationality')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="telephone contact" labelvalue="telephone contact"
                                    class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="telephone contact"
                                        labelClass="w-full md:w-3/12" />
                                    @error('telephone_contact')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="gender" labelvalue="gender" class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input :previewmode="$previewMode" name="gender"
                                        :options="$gender_at_birth" />
                                    @error('gender')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="population category" labelvalue="population category"
                                    class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input :previewmode="$previewMode" name="population category"
                                        :options="$populationCat" />
                                    @error('population_category')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>
                            @if ($population_category == $populationCat[3] || ($other_population_category != '' &&
                            $previewMode
                            == 1))
                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="other population category"
                                    labelvalue="other population category" class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="other population category" />
                                    @error('other_population_category')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    {{-- CLIENT ADDRESS --}}
                    @if ($current_form_step == 3 || session()->has('invalid_address_form') || $previewMode == 1)
                    <div name="address_info" id="address-info"
                        class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                        <div
                            class="text-center text-lg font-semibold uppercase {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                            client address
                        </div>
                        <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl border-red-400 bg-white' : '' }}">
                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="district" labelvalue="district" class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="district" />
                                    @error('district')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="county" labelvalue="county" class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" name="county" />
                                    @error('county')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="subcounty" labelvalue="subcounty" class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-input-group :previewmode="$previewMode" name="subcounty" />
                                    @error('subcounty')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="parish" labelvalue="parish" class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-input-group :previewmode="$previewMode" name="parish" />
                                    @error('parish')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="village" labelvalue="village" class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-input-group :previewmode="$previewMode" name="village" />
                                    @error('village')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="zone" labelvalue="zone" class="w-full md:w-3/12" />
                                <div class="flex flex-col w-full">
                                    <x-input-group :previewmode="$previewMode" name="zone" />
                                    @error('zone')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- GENERAL ELIGIBLITY --}}
                    @if ($current_form_step == 4 || session()->has('invalid_general_eligiblity_form') ||
                    $previewMode ==
                    1)
                    <div name="eligibility_criteria" id="eligiblity-criteria"
                        class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                        <div
                            class="text-center text-lg font-semibold uppercase {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                            general eligibility criteria
                        </div>
                        <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl border-red-400 bg-white' : '' }}">
                            <div class="flex flex-col">
                                <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                    <x-input-label labelfor="sex at birth" labelvalue="what was your sex at birth?"
                                        class="w-full md:w-9/12" />
                                    <div class="flex flex-col w-full">
                                        <x-select-input wire:change="determineGeneralEligiblity()" id="sex at birth"
                                            :previewmode="$previewMode" :disabled="false" name="sex at birth"
                                            :options="$sex" />
                                        @error('sex_at_birth')
                                        <x-input-single-error :message="$message" />
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                    <x-input-label labelfor="client age" labelvalue="what is your age?"
                                        class="w-full md:w-9/12" />
                                    <div class="flex flex-col w-full">
                                        <x-select-input wire:change="determineGeneralEligiblity()" id="client age"
                                            :previewmode="$previewMode" :disabled="false" name="client age"
                                            :options="$age" />
                                        @error('client_age')
                                        <x-input-single-error :message="$message" />
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                    <x-input-label labelfor="had total hysterectomy"
                                        labelvalue="Have you ever had a total hysterectomy (removal of the uterus)?"
                                        class="w-full md:w-9/12" />
                                    <div class="flex flex-col w-full">
                                        <x-select-input wire:change="determineGeneralEligiblity()"
                                            id="had total hysterectomy" :previewmode="$previewMode" :disabled="false"
                                            name="had total hysterectomy" :options="$trueOrFalse" />
                                        @error('had_total_hysterectomy')
                                        <x-input-single-error :message="$message" />
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                    <x-input-label labelfor="been on cervical cancer treatment"
                                        labelvalue="have you ever been on cervical cancer treatment (chemotherapy, radiation)?"
                                        class="w-full md:w-9/12" />
                                    <div class="flex flex-col w-full">
                                        <x-select-input wire:change="determineGeneralEligiblity()"
                                            id="been on cervical cancer treatment" :previewmode="$previewMode"
                                            :disabled="false" name="been on cervical cancer treatment"
                                            :options="$trueOrFalse" />
                                        @error('been_on_cervical_cancer_treatment')
                                        <x-input-single-error :message="$message" />
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                    <x-input-label labelfor="screened negative of cervical cancer past tweleve mnth"
                                        labelvalue="have you screened negative for cervical cancer or HPV in the past 12 months?"
                                        class="w-full md:w-9/12" />
                                    <div class="flex flex-col w-full">
                                        <x-select-input wire:change="determineGeneralEligiblity()"
                                            id="screened negative of cervical cancer past tweleve mnth"
                                            :previewmode="$previewMode" :disabled="false"
                                            name="screened negative of cervical cancer past tweleve mnth"
                                            :options="$trueOrFalse" />
                                        @error('screened_negative_of_cervical_cancer_past_tweleve_mnth')
                                        <x-input-single-error :message="$message" />
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- CURRENT ELIGIBLITY FORM --}}
                    @if ($current_form_step == 5 || session()->has('invalid_current_eligiblity_form') ||
                    $previewMode ==
                    1)
                    <div name="eligibility_confirmation" id="eligibility-confirmation"
                        class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                        <div class="text-center text-lg font-semibold uppercase
                         {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                            current eligibility criteria
                        </div>
                        <div
                            class="px-3 {{ $previewMode == 1 ? 'rounded-2xl rounded-bl-none rounded-br-none border-red-400 bg-white' : '' }}">
                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="currently menstruating"
                                    labelvalue="are you currently menstruating?" class="w-full md:w-9/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input2 wire:change="determineCurrentEligiblity"
                                        id="currently menstruating" :previewmode="$previewMode" :disabled="false"
                                        name="currently menstruating" :options="$menstruationState" />
                                    @error('currently_menstruating')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                    @if ($currently_menstruating == $trueOrFalse[0])
                                    <p class="text-sm text-center font-light pt-0 mt-0"
                                        x-text="$wire.currently_menstruating_comment='{{ $menstruationState[$currently_menstruating] }}'">
                                    </p>
                                    @endif
                                    @if ($currently_menstruating == $trueOrFalse[1])
                                    <p class="text-sm text-center font-light pt-0 mt-0"
                                        x-text="$wire.currently_menstruating_comment='{{ $menstruationState[$currently_menstruating] }}'">
                                    </p>
                                    @endif
                                </div>
                            </div>

                            @if ($currently_menstruating == $trueOrFalse[1] || ($previewMode == 1 &&
                            $days_since_last_menstruation_period != ''))
                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="days since last menstruation period"
                                    labelvalue="how many days has it been since your last menstruation period started?"
                                    class="w-full md:w-9/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input2 wire:change="determineCurrentEligiblity"
                                        id="days since last menstruation period" :previewmode="$previewMode"
                                        :disabled="false" name="days since last menstruation period"
                                        :options="$lastMenstruation" />
                                    @error('days_since_last_menstruation_period')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                    @if (isset($days_since_last_menstruation_period))
                                    <p class="text-sm text-center font-light pt-0 mt-0"
                                        x-text="$wire.last_menstruation_period_comment='{{ $lastMenstruation[$days_since_last_menstruation_period] }}'">
                                    </p>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="currently pregnant or been past three mnth"
                                    labelvalue="Are you currently pregnant or have been pregnant in the past 3 months"
                                    class="w-full md:w-9/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input2 wire:change="determineCurrentEligiblity"
                                        id="currently pregnant or been past three mnth" :previewmode="$previewMode"
                                        :disabled="false" name="currently pregnant or been past three mnth"
                                        :options="$pregnancyState" />
                                    @error('currently_pregnant_or_been_past_three_mnth')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                    @if (isset($currently_pregnant_or_been_past_three_mnth))
                                    <p class="text-sm text-center font-light pt-0 mt-0">
                                        {{ $pregnancyState[$currently_pregnant_or_been_past_three_mnth] }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    {{-- CONTINUATION OF CURRENT ELIGIBLITY FORM --}}
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
                            <div class="flex flex-col">
                                <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                    <x-input-label labelfor="sign of advanced illness symptoms"
                                        labelvalue="do you have any of these symptoms?" class="w-full md:w-9/12" />
                                    <div class="flex flex-col w-full">
                                        <x-select-input id="sign of advanced illness symptoms"
                                            :previewmode="$previewMode" name="sign of advanced illness symptoms"
                                            :options="$trueOrFalse" />
                                        @error('sign_of_advanced_illness_symptoms')
                                        <x-input-single-error :message="$message" />
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if (($sign_of_advanced_illness_symptoms == $trueOrFalse[0] && $current_form_step == 6)
                            ||
                            $previewMode == 1 && !empty($symptomsIndicatingAdvancedIllness))
                            <div class="flex flex-col gap-1 pt-0 pl-6 pb-3">
                                @if ($previewMode == 1)
                                <input type="hidden" wire:model="symptoms_indicating_advanced_illness" />
                                @endif
                                @error('symptoms_indicating_advanced_illness')
                                <x-input-single-error :message="$message" />
                                @enderror
                                @foreach ($symptomsIndicatingAdvancedIllness as $symptom)
                                <x-checkbox-input :key="$loop->iteration" :keyindex="$loop->iteration"
                                    :previewmode="$previewMode" name="symptoms indicating advanced illness"
                                    :value="$symptom" />
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    {{-- RISK CLASSIFICATION FORM --}}
                    @if ($current_form_step == 7 || session()->has('invalid_riskclassification_form') ||
                    $previewMode ==
                    1)
                    <div name="risk_clarification" id="risk-clarification"
                        class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                        <div class="text-center text-lg font-semibold uppercase
                        {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                            risk classification
                        </div>
                        <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl pt-2 border-red-400 bg-white' : '' }}">
                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="first age of sexual intercourse"
                                    labelvalue="At what age did you have sexual intercourse for the first time?"
                                    class="w-full md:w-10/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input3
                                        wire:change="updateSelectedRisks($event.target.value,$event.target.name)"
                                        :previewmode="$previewMode" :disabled="false"
                                        name="first age of sexual intercourse"
                                        :options="$age_of_first_sexual_intercourse" />
                                    @error('first_age_of_sexual_intercourse')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="number of sexual partners past six month"
                                    labelvalue="How many sexual partners have you had in the past 6 months?"
                                    class="w-full md:w-10/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input3
                                        wire:change="updateSelectedRisks($event.target.value,$event.target.name)"
                                        :previewmode="$previewMode" name="number of sexual partners past six month"
                                        :options="$no_of_sexual_partners_past_six_mnth" />
                                    @error('number_of_sexual_partners_past_six_month')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="regular sexual intercourse without condom"
                                    labelvalue="Do you regularly have sexual intercourse without a condom?"
                                    class="w-full md:w-10/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input3
                                        wire:change="updateSelectedRisks($event.target.value,$event.target.name)"
                                        :previewmode="$previewMode" name="regular sexual intercourse without condom"
                                        :options="$condom_usage" />
                                    @error('regular_sexual_intercourse_without_condom')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="hiv status" labelvalue="What is your HIV status?"
                                    class="w-full md:w-10/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input3
                                        wire:change="updateSelectedRisks($event.target.value,$event.target.name)"
                                        :previewmode="$previewMode" name="hiv status" :options="$risk_hiv_status" />
                                    @error('hiv_status')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            @if ($hiv_status == $risk_hiv_status[0][1] ||
                            ($previewMode == 1 && $compliant_with_hiv_medication != ''))
                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="compliant with hiv medication"
                                    labelvalue="Are you compliant with your HIV medications? In other words, do you take your medication as directed by your health care provider?"
                                    class="w-full md:w-10/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input3
                                        wire:change="updateSelectedRisks($event.target.value,$event.target.name)"
                                        :previewmode="$previewMode" name="compliant with hiv medication"
                                        :required="false" :options="$compliant_with_hiv_medica" />
                                    @error('compliant_with_hiv_medication')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>
                            @endif

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="smoke cigarettes" labelvalue="Do you smoke cigarettes?"
                                    class="w-full md:w-10/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input3
                                        wire:change="updateSelectedRisks($event.target.value,$event.target.name)"
                                        :previewmode="$previewMode" name="smoke cigarettes" :options="$ciga_smoker" />
                                    @error('smoke_cigarettes')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="ever been diagonosed with stds"
                                    labelvalue="Have you ever been diagnosed with any Sexually Transmitted Infections (such as chlamydia, gonorrhea, syphilis, etc.) that often cause symptoms such as itchiness, vaginal discharge, or redness?"
                                    class="w-full md:w-10/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input3
                                        wire:change="updateSelectedRisks($event.target.value,$event.target.name)"
                                        :previewmode="$previewMode" name="ever been diagonosed with stds"
                                        required="true" :options="$with_stds" />
                                    @error('ever been_diagonosed_with_stds')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="number of pregnancies"
                                    labelvalue="How many times have you been pregnant?" class="w-full md:w-10/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input3
                                        wire:change="updateSelectedRisks($event.target.value,$event.target.name)"
                                        :previewmode="$previewMode" name="number of pregnancies"
                                        :options="$no_of_times_been_pregnant" />
                                    @error('number_of_pregnancies')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="hpv_vaccinated"
                                    labelvalue="Have you ever received an HPV vaccine?" class="w-full md:w-10/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input3
                                        wire:change="updateSelectedRisks($event.target.value,$event.target.name)"
                                        :previewmode="$previewMode" name="hpv vaccinated"
                                        :options="$been_hpv_vaccinated" />
                                    @error('hpv_vaccinated')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="parents and grandparents been with cancer"
                                    labelvalue="Have your parents or grandparents had cancer?"
                                    class="w-full md:w-10/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input3
                                        wire:change="updateSelectedRisks($event.target.value,$event.target.name)"
                                        :previewmode="$previewMode" name="parents and grandparents been with cancer"
                                        labelClass="w-10/12" :options="$parents_with_cancer" />
                                    @error('parents_and_grandparents_been_with_cancer')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <p>Do you currently have any of the following symptoms:</p>
                                <div class="flex flex-col gap-1 pt-3 pl-6 pb-3">
                                    @foreach ($possession_of_these_symptoms as $symptom_possessed)
                                    <x-checkbox-input :key="$loop->iteration" :keyindex="$loop->iteration"
                                        :previewmode="$previewMode" wire:key="$symptoms_possessed"
                                        name="symptoms possessed" :value="$symptom_possessed"
                                        wire:change="updateCheckedRisks($event.target.checked,$event.target.value)" />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- CLIENT REFERRAL --}}
                    @if ($current_form_step == 8 || session()->has('invalid_referral_form') || $previewMode == 1)
                    <div name="client_referral" id="client-referral"
                        class="p-0 m-0 transition-all {{ $previewMode == 1 ? 'bg-red-400' : '' }}">
                        <div class="text-center text-lg font-semibold uppercase
                            {{ $previewMode == 1 ? 'text-white py-2 align-middle' : '' }}">
                            client referral
                        </div>
                        <div class="px-3 {{ $previewMode == 1 ? 'rounded-2xl pt-2 border-red-400 bg-white' : '' }}">
                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="client interested to receive screening"
                                    labelvalue="Is client interested and ready to receive cervical cancer screening?"
                                    class="w-full md:w-9/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input id="client interested to receive screening"
                                        :previewmode="$previewMode" :disabled="false"
                                        name="client interested to receive screening" :options="$trueOrFalse" />
                                    @error('client_interested_to_receive_screening')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="client referred for treatment"
                                    labelvalue="Was the client referred for treatment?" class="w-full md:w-9/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input wire:change="resetReferralSelctFields" :previewmode="$previewMode"
                                        :disabled="false" name="client referred for treatment"
                                        :options="$trueOrFalse" />
                                    @error('client_referred_for_treatment')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            @if ($client_referred_for_treatment == $trueOrFalse[0])
                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="organisation referred"
                                    labelvalue="The client was referred to (name of organization or facility)"
                                    class="w-full md:w-9/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input :previewmode="$previewMode" :required="false"
                                        name="organisation referred" class="" />
                                    @error('organisation_referred')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>
                            @endif

                            @if ($client_referred_for_treatment == $trueOrFalse[1])
                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="reason client was not referred for treatment"
                                    labelvalue="Specify why client was not referred for treatment"
                                    class="w-full md:w-9/12" />
                                <div class="flex flex-col w-full">
                                    <x-select-input id="reason client was not referred for treatment"
                                        :previewmode="$previewMode" :required="false"
                                        name="reason client was not referred for treatment"
                                        :options="$not_referred_reason" />
                                    @error('reason_client_was_not_referred_for_treatment')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>
                            @if ($reason_client_was_not_referred_for_treatment == $not_referred_reason[3])
                            <div class="flex flex-col md:flex-row gap-0 md:gap-2 my-2 items-center">
                                <x-input-label labelfor="no referral option comment"
                                    labelvalue="No referral option comment" class="w-full md:w-9/12" />
                                <div class="flex flex-col w-full">
                                    <x-text-input id="no referral option comment" :previewmode="$previewMode"
                                        :required="false" name="no referral option comment" />
                                    @error('no_referral_option_comment')
                                    <x-input-single-error :message="$message" />
                                    @enderror
                                </div>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </x-form>

    <div class="flex px-8 py-2 sticky bottom-0 left-0 right-0">
        <div class="mr-auto"></div>
        <div class="flex gap-4">
            @if ($previewMode == 0)
            <x-primary-button id="prev-btn" type="button" wire:click.stop="previous">Previous
            </x-primary-button>
            @endif
            <div>
                @if ($current_form_step == $total_form_steps && $previewMode == 0)
                <x-primary-button id="preview-btn" type="button" wire:click.prevent="enablePreviewMode">
                    Preview</x-primary-button>
                @endif
                @if ($current_form_step != $total_form_steps && $previewMode != 1)
                <x-primary-button id="next-btn" type="button" wire:click.stop="validateForms">Next
                </x-primary-button>
                @endif
                @if ($previewMode == 1)
                <x-primary-button id="back-btn" type="button" wire:click="disablePreviewMode">Back
                </x-primary-button>
                @endif
            </div>
        </div>
    </div>

    {{-- DEBUGING AREA --}}
    <div class="bg-green-400 hidden">
        <p>SESSIONS: @if (session()->has('invalid_bio_form')) {{ var_dump(session('invalid_bio_form'))}} @endif</p>
        <p>SELECTED RISKS {{ var_dump($errors)}}</p>
        <p>DATE OF VISIT: {{ $date_of_visit }}
        <p>PREVIEW STATUS {{ $previewMode }}
        <p>Selected Field: {{ $selectedField }}</p>
        <p>Selected Text: {{ var_dump($selectedText) }}</p>
        <p>HPV Vaccinated: {{ var_dump($hpv_vaccinated) }}</p>
        <p>Checkbox status: {{ $checkboxChecked }}</p>
        <p>Checkbox value: {{ $checkedValue }}</p>
        <p>Form No: k Score: {{ $risk_score }}</p>
        <p>Fliped Risks mapping: {{ var_dump($fliped_mapping) }}</p>
        <p>Symptoms possessed: {{ var_dump($symptoms_possessed) }}</p>
    </div>
</div>
@php
//var_dump($errors);
@endphp
