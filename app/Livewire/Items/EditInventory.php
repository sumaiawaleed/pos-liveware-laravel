<?php

namespace App\Livewire\Items;

use App\Models\Inventory;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EditInventory extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public Inventory $record;

    public ?array $data = [];

    public function mount(int $id): void
    {
        $this->record = Inventory::findOrFail($id);
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
        ->components([
            Section::make('Edit Inventory')
            ->description('update the inventory details as you wish!!')
            ->columns(2)
            ->schema([
                Select::make('item_id')
                        ->relationship('item','name')
                        ->searchable()
                        ->preload()
                        ->native(false),
                TextInput::make('quantity')
                ->numeric(),
            ])
        ])
        ->statePath('data')
        ->model($this->record);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->record->update($data);

        Notification::make()
        ->title('Inventory Updated!')
        ->success()
        ->body("Inventory Updated successfully!")
        ->send();
    }

    public function render(): View
    {
        return view('livewire.items.edit-inventory');
    }
}
