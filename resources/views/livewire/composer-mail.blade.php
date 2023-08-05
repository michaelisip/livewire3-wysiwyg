@push('styles')
    <style>
        .ck-editor__editable {
            min-height: 400px;
        }
    </style>
@endpush

<div>
    <form wire:submit="send" class="row g-3" >
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div wire:ignore>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" wire:model="subject" name="subject" id="subject" class="form-control">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea wire:model="body" name="body" id="body" cols="30" rows="10"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-end"> Send Mail To Recipients </button>
    </form>
</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#body'))
            .then(editor => {
                console.log(editor)
                editor.model.document.on('change:data', () => {
                    @this.set('body', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
