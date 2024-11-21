<div style="font-family:sans-serif">
    <form wire:submit.prevent="createItem">
        <div style="padding-top: 5px">
            <label for="name">Name:</label>
            <input wire:model="name" type="text" id="name" required />
        </div>
        <button type="submit" style="margin-top: 5px">Add item</button>
    </form>
    <div style="margin-top: 5px">
        <label for="add">Create Item:</label>
        <input wire:model.lazy="add" type="text" id="add" placeholder="add item">
    </div>

    <div>
        <label for="perPage">Items per page:</label>
        <select wire:model.lazy="perPage" id="perPage">
            @foreach($options as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>

    <div>
        @foreach($items as $item)
            <div>{{ $item->name }}</div>
        @endforeach
    </div>

    {{ $items->links() }}
</div>
