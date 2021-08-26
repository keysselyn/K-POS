@if (session()->has('message'))
            <div wire:poll.2s id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                    <strong class="mr-auto">
                        Informacion
                    </strong>
                    <small>
                        <i class="fas fa-info-circle"></i>
                    </small>
                    </div>
                    <div class="toast-body">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
@endif
@if (session()->has('message_edit'))
            <div wire:poll.2s id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-warning fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                    <strong class="mr-auto">
                        Informacion
                    </strong>
                    <small>
                        <i class="fas fa-info-circle"></i>
                    </small>
                    </div>
                    <div class="toast-body">
                        {{ session('message_edit') }}
                    </div>
                </div>
            </div>
@endif
@if (session()->has('message_delete'))
            <div wire:poll.2s id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                    <strong class="mr-auto">
                        Informacion
                    </strong>
                    <small>
                        <i class="fas fa-trash-alt"></i>
                    </small>
                    </div>
                    <div class="toast-body">
                        {{ session('message_delete') }}
                    </div>
                </div>
            </div>
@endif
