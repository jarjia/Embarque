<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item;

class Opportunities extends Component
{
    use WithPagination;
    public $name;
    public $perPage = 20;
    public $options = [20, 50, 100, 250];
    public $search = '';
    protected $queryString = ['perPage', 'search'];

    public function createItem()
    {
        Item::create([
            'name' => $this->name,
        ]);
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $items = Item::when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->paginate($this->perPage);

        return view('livewire.opportunities', [
            'items' => $items,
        ]);
    }
}
