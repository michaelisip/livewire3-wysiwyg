<div>
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'create' }}" class="row g-3" >

        @if ($updateMode)
            <input type="hidden" wire:model="recipient_id">
        @endif

        <div class="col-4">
            <label for="name" class="visually-hidden">Name</label>
            <input type="text" wire:model="name" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="col-4">
            <label for="email" class="visually-hidden">Email</label>
            <input type="text" wire:model="email" class="form-control" id="email" placeholder="email@example.com">
        </div>
        <div class="col-auto">
            <div class="d-flex flex-row">
                <button type="submit" class="btn btn-primary mb-3">
                    {{ $updateMode ? 'Update' : 'Add' }} Recipient
                </button>
                @if ($updateMode)
                    <button wire:click="resetInput" class="btn btn-secondary mb-3 ms-1">Cancel</button>
                @endif
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipients as $recipient)
                <tr>
                    <td>{{ $recipient->id }}</td>
                    <td>{{ $recipient->name }}</td>
                    <td>{{ $recipient->email }}</td>
                    <td>
                        <button wire:click="edit({{ $recipient->id }})" class="btn btn-sm btn-secondary">Edit</button>
                        <button wire:click="delete({{ $recipient->id }})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
