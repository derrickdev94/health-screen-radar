<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\ClientGeneralEligiblity;

class ClientGeneralEligiblityTable extends DataTableComponent
{
    protected $model = ClientGeneralEligiblity::class;

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
            Column::make("Client Name","client.client_name")
            ->sortable()
            ->searchable(),
            Column::make("Sex At Birth"),
            Column::make("Client Age"),
            Column::make("Had Total Hysterectomy"),
            Column::make("On cervical Cancer Treatment","been_on_cervical_cancer_treatment"),
            Column::make("Cervical Cancer Negative Past 3 Month","screened_negative_of_cervical_cancer_past_tweleve_mnth"),
            Column::make("Eligiblity Status","general_eligiblity_status"),

            ButtonGroupColumn::make('Actions')
            ->attributes(function($row){
                return [
                    'class'=>'space-x-2',
                ];
            })
            ->buttons([
                LinkColumn::make('View')
                ->title(fn($row)=> 'View')
                ->location(fn($row)=> route('cervicalCancer.index'))

                ->attributes(function($row){
                    return [
                        'class' =>'underline text-blue-500 hover:no-underline'
                    ];
                }),
                LinkColumn::make('Edit')
                ->title(fn($row)=> 'Edit')
                ->location(fn($row)=> route('cervicalCancer.index'))
                ->attributes(function($row){
                    return [
                        'class' =>'underline text-blue-500 hover:no-underline'
                    ];
                }),
            ])
        ];
    }
}
