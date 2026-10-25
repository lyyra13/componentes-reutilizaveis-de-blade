@extends('layouts.main_layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">
            @include('top_bar')
            <!-- confirm delete -->
            <x-modal title="Confirmar exclusão">
                <p>
                    Tem certeza de que deseja excluir a nota
                    <strong>{{ $note->title }}</strong>?
                </p>

                <x-slot:footer>
                    <div class="mt-3">
                        <x-button
                            :href="route('home')"
                            icon="fa-solid fa-xmark"
                            variant="primary">
                            Não
                        </x-button>

                        <x-button
                            :href="route(
                                'deleteNoteConfirm',
                                \App\Services\Operations::encryptId($note->id)
                            )"
                            icon="fa-solid fa-trash"
                            variant="danger">
                            Sim, excluir
                        </x-button>
                    </div>
                </x-slot:footer>
            </x-modal>

        </div>
    </div>
</div>
@endsection