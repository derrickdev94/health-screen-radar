<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\ClientCurrentEligiblity;

class ClientCurrentEligiblityTable extends DataTableComponent
{
    protected $model = ClientCurrentEligiblity::class;

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
            Column::make("Currently Menstruating"),
            Column::make("Currently Menstruating Comment"),
            Column::make("Last Menstruation","days_since_last_menstruation_period"),
            Column::make("Last Menstruation Comment","last_menstruation_period_comment"),
            Column::make("Pregnant Or Been Past 3 Month","currently_pregnant_or_been_past_three_mnth"),
            Column::make("Pregnant Or Been Past 3 Month Comment","currently_pregnant_or_been_past_three_mnth_comment"),
            //Column::make("Advanced Illness Symptoms","symptoms_indicating_advanced_illness"),
            Column::make("Eligiblity Status","current_eligiblity_status"),

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
