@extends('layouts.app')

@section('title', 'Escolha suas Cartas')

@section('content')
    <div class="text-center mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cardModal">
            Escolher Mão
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cardModal" tabindex="-1" role="dialog" aria-labelledby="cardModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cardModalLabel">Selecione Duas Cartas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @component('components.poker-card-selector')
                    @endcomponent
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Display selected cards -->
    <div class="selected-cards mt-4 text-center">
        <h2>Cartas Selecionadas:</h2>
        <div id="selectedCardsContainer" class="d-flex justify-content-center">
            <!-- Selected cards will be shown here -->
        </div>
    </div>

    @if(isset($OpenAIChatServiceResponse))
        <div class="response-container mt-4">
            <h2>Resposta da API:</h2>
            <label for="apiResponse">Resposta:</label>
            <div id="apiResponse">{!! $OpenAIChatServiceResponse !!}</div>
        </div>
    @endif
@endsection

@section('scripts')
    <script src="{{ asset('js/card-selector.js') }}" defer></script>
@endsection
