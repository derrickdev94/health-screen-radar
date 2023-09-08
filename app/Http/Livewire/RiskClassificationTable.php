<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\RiskClassification;

class RiskClassificationTable extends DataTableComponent
{
    protected $model = RiskClassification::class;

    // public array $bulkActions  = [
    //     'deleteSelected' => 'Delete'
    // ];

    // public function deleteSelected(){
    //     foreach($this->getSelected() as $item){

    //         $this->clearSelected();
    //     }
    // }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        //->setFilterLayoutSlideDown();
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
            ->sortable()
            ->hideIf(true),
            Column::make("Client Id",)
            ->hideIf(true),
            Column::make("Client Name","client.client_name")
            ->sortable()
            ->searchable(),
            Column::make("First Age Of Sexual Intercourse"),
            Column::make("Sexual Partners Past 3 Month","number_of_sexual_partners_past_six_month"),
            Column::make("Sex Without A condom","regular_sexual_intercourse_without_condom"),
            Column::make("Hiv Status"),
            Column::make("Compliant With Hiv Medication"),
            Column::make("Smoke Cigarettes"),
            Column::make("Been Diagonosed With STDs","ever_been_diagonosed_with_stds"),
            Column::make("Number Of Pregnancies"),
            Column::make("Hpv Vaccinated"),
            Column::make("Parents And Grand Parents Had Cancer","parents_and_grandparents_been_with_cancer"),
            //Column::make("Symptoms Possessed","symptoms_possessed"),
            Column::make("Cervical Cancer Risk Score","risk_score"),

            ButtonGroupColumn::make('Actions')
            ->attributes(function($row){
                return [
                    'class'=>'space-x-2',
                ];
            })
            ->buttons([
                LinkColumn::make('View')
                ->title(fn($row)=> 'View')
                ->location(fn($row)=> route('cervicalCancer.create',[$row->client_id,'risk_form','view']))
                ->attributes(function($row){
                    return [
                        'class' =>'underline text-blue-500 hover:no-underline'
                    ];
                }),
                LinkColumn::make('Edit')
                ->title(fn($row)=> 'Edit')
                ->location(fn($row)=> route('cervicalCancer.create',[$row->client_id,'risk_form','edit']))
                ->attributes(function($row){
                    return [
                        'class' =>'underline text-blue-500 hover:no-underline'
                    ];
                }),
            ])
        ];
    }
}
