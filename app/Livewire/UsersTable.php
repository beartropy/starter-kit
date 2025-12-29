<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Beartropy\Tables\YATBaseTable;
use Illuminate\Support\Facades\Auth;
use Beartropy\Tables\Exports\GenericExport;
use Beartropy\Tables\Classes\Columns\Column;
use Beartropy\Tables\Classes\Columns\BoolColumn;
use Beartropy\Tables\Classes\Columns\LinkColumn;
use Beartropy\Tables\Classes\Filters\FilterBool;
use Beartropy\Tables\Classes\Filters\FilterString;
use Beartropy\Tables\Classes\Filters\FilterDateRange;
use Beartropy\Tables\Classes\Filters\FilterSelectMagic;
use Beartropy\Ui\Traits\HasToasts;

class UsersTable extends YATBaseTable
{

    use HasToasts;

    public $tableName = 'UsersTable';
    public $openSlider = false;
    public $sliderId = '';
    public $sliderName = '';
    public $sliderEmail = '';

    public $modalCreate = false;
    public $modalId = '';
    public $modalName = '';
    public $modalEmail = '';
    public $modalPassword = '';

    public $modalChangePassword = false;
    public $modalPasswordConfirmation = '';

    public $model = User::class;

    public function settings(): void
    {
        $this->setTitle('Users table');
        $this->hasBulk(true);
        $this->useStateHandler(false);
        $this->showCounter(false);
        $this->showCardsOnMobile(true);
        $this->addButtons([
            ["label" => 'Create new user', "action" => "openModalCreate", "color" => "emerald"]
        ]);

        $this->setModalsView('livewire.userstable-slider-modal');
        $this->setLayout('components.layouts.app');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->pushLeft(),
            Column::make('Name', 'name')->cardTitle(),
            Column::make('Email', 'email')->showOnCard(),
            Column::make('Email Verified At', 'email_verified_at'),
            Column::make('Created At', 'created_at')->showOnCard(),
            Column::make('Updated At', 'updated_at'),
            Column::make('#')->customData(function ($row, $value) {
                return '<div class="flex flex-col md:flex-row md:w-full md:justify-end gap-2">
                    <div class="flex gap-2 text-blue-500 cursor-pointer" wire:click="slide(' . $row->id . ')" >
                    <svg class="w-4 h-4  focus:outline-none" tabindex="-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg><span class="md:hidden">Modify</span>
                    </div>
                    <div class="flex gap-2 text-orange-500 cursor-pointer" wire:click="openModalChangePassword(' . $row->id . ')" >
                    <svg class="w-4 h-4  focus:outline-none" tabindex="-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-11V7a4 4 0 00-8 0v4M12 5V3m0 0L10 5m2-2l2 2" />
                    </svg><span class="md:hidden">Change password</span>
                    </div>
                </div>';
            })->toHtml()->pushRight()
        ];
    }



    public function openModalCreate()
    {
        $this->modalCreate = true;
    }

    public function createUser()
    {
        $this->validate([
            'modalName' => 'required|min:3',
            'modalEmail' => 'required|email|unique:users,email',
            'modalPassword' => 'required|min:8',
        ]);

        \App\Models\User::create([
            'name' => $this->modalName,
            'email' => $this->modalEmail,
            'password' => $this->modalPassword,
        ]);

        $this->toast()->success('User created successfully.');

        $this->reset(['modalName', 'modalEmail', 'modalPassword']);

        $this->modalCreate = false;
    }

    public function openModalChangePassword($id)
    {
        $user = User::find($id);
        $this->modalChangePassword = true;
        $this->modalId = $user->id;
    }

    public function changePassword()
    {
        $this->validate([
            'modalPassword' => 'required|min:8',
            'modalPasswordConfirmation' => 'required|same:modalPassword',
        ]);

        \App\Models\User::updateOrCreate([
            'id' => $this->modalId,
        ], [
            'password' => $this->modalPassword,
        ]);

        $this->toast()->success('Password changed successfully.');

        $this->reset(['modalPassword', 'modalPasswordConfirmation']);

        $this->modalChangePassword = false;
    }

    public function slide($id)
    {
        $user = User::find($id);
        $this->openSlider = true;
        $this->sliderId = $user->id;
        $this->sliderName = $user->name;
        $this->sliderEmail = $user->email;
    }

    public function modifyUser()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email'
        ]);

        \App\Models\User::updateOrCreate([
            'id' => $this->sliderId,
        ], [
            'name' => $this->sliderName,
            'email' => $this->sliderEmail,
        ]);

        $this->toast()->success('User modified successfully.');

        $this->reset(['sliderId', 'sliderName', 'sliderEmail']);
    }

    public function options(): array
    {
        return [
            "export_selected" => ["label" => "Export selected rows", "icon" => "☑️"],
            "export_filtered" => ["label" => "Export filtered rows", "icon" => "🔍"],
            "export_all" => ["label" => "Export all rows", "icon" => "📗"]
        ];
    }

    public function export_all()
    {
        $allData = $this->getAllData();
        return \Maatwebsite\Excel\Facades\Excel::download(new GenericExport($allData, $strip_tags = true), $this->tableName . '.xlsx');
    }

    public function export_filtered()
    {
        $filteredData = $this->getAfterFiltersData();
        return \Maatwebsite\Excel\Facades\Excel::download(new GenericExport($filteredData, $strip_tags = true), $this->tableName . '.xlsx');
    }

    public function export_selected()
    {
        $selected_rows = $this->getSelectedData();
        if ($selected_rows) {
            return \Maatwebsite\Excel\Facades\Excel::download(new GenericExport($selected_rows, $strip_tags = true), $this->tableName . '.xlsx');
        }
    }

    public function remove()
    {
        foreach ($this->getSelectedRows() as $id) {
            $this->removeRowFromTable($id);
        }
    }

    /*
    #[On('tableStateSaved')]
    public function notifyTableStateSavedStatus($status) {
        if ($status) {
            // notification('Success");
        } else {
            // notification('Error");
        }
    }
    */
}
