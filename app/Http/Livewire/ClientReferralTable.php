<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\ClientReferral;

class ClientReferralTable extends DataTableComponent
{
    protected $model = ClientReferral::class;

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
            Column::make("Name","client.client_name")
            ->sortable()
            ->searchable(),
            Column::make("Interested to Recieve Screening","client_interested_to_receive_screening"),
            Column::make("Referred for treatment","client_referred_for_treatment"),

            Column::make("Organization Referred","organisation_referred"),
            Column::make("Reason for not being referred for treatment","reason_client_was_not_referred_for_treatment"),
            Column::make("Comment for no referral","no_referral_option_comment"),

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
