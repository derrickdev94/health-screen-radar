<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\Client;

class ClientsTable extends DataTableComponent
{
    protected $model = Client::class;

    public array $bulkActions  = [
        'deleteSelected' => 'Delete'
    ];

    public function deleteSelected(){
        foreach($this->getSelected() as $item){
            Client::destroy($item);
            $this->clearSelected();
        }

    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        //->setFilterLayoutSlideDown();

        $this->setTableAttributes([
            'class' => 'w-full table-fixed',
        ]);


    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
            ->sortable()
            ->hideIf(true),

            Column::make("Name","client_name")
            ->sortable()
            ->searchable(),
            //Column::make("Identification","client_identification")->sortable(),
            Column::make("DOB","date_of_birth")->sortable(),
            Column::make("Nationality")
            ->sortable()
            ->searchable(),
           // Column::make("Population Category")->sortable(),
           // Column::make("Other Category","other_population_category")->sortable(),
            Column::make("Gender")
            ->sortable()
            ->searchable(),

            Column::make("Phone","telephone_contact")
            ->sortable()
            ->searchable(),
            // Column::make("Created at", "created_at")
            // ->sortable()
            // ->collapseOnMobile(),
            //Column::make("Updated at", "updated_at")->sortable(),
            Column::make("SD")
            ->label(
                fn($row,Column $column)=>'fggg'
            )->html(),

            Column::make("SD")
            ->label(
                fn($row,Column $column)=>'
                <x-primary-blue-button type="button">
                    <x-icons.document size="4" />
                    Save
                </x-primary-blue-button>
                '
            )->html(),

            ButtonGroupColumn::make('Actions')
            ->attributes(function($row){
                return [
                    'class'=>'space-x-2',
                ];
            })
            ->buttons([
                LinkColumn::make('View')
                ->title(fn($row)=> '<button>View'.$row->id. '</button>')
                ->location(fn($row)=> route('cervicalCancer.index')),

                // ->attributes(function($row){
                //     return [
                //         'class' =>'border-2 rounded-md p-1 bg-blue-500 dark:bg-blue-900 text-orange-500 hover:bg-blue-600'
                //     ];
                // }),
                LinkColumn::make('Edit')
                ->title(fn($row)=> 'Edit'.$row->name)
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
