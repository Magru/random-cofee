<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id"),
            Column::make("Name", "name")->sortable(),
            Column::make("Email", "email")->sortable(),
            Column::make("Chat ID", "chat_id")->sortable(),
            Column::make("Username", "tg_user_name")->sortable(),
            Column::make("City", "city.name")->sortable(),
            Column::make("State", "state.name")->sortable(),
            Column::make("Created at", "created_at")->sortable(),
            Column::make("Updated at", "updated_at")->sortable(),
            ButtonGroupColumn::make('Actions')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Delete')->title(fn($row) => 'Delete ')
                        ->location(fn($row) => route('user.destroy', $row))->attributes(function($row) {
                            return [
                                'class' => 'underline text-blue-500 hover:no-underline',
                            ];
                        }),
                ]),
        ];
    }
}
