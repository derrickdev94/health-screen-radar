<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\BasicInfo;

class BasicInfoTable extends DataTableComponent
{
    protected $model = BasicInfo::class;

    public array $bulkActions  = [
        'deleteSelected' => 'Delete'
    ];

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
            Column::make("Location"),
            Column::make("Date Of Visit"),

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
