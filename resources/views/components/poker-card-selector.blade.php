<div class="card-selector" id="{{ $id }}">
    <!-- Rows for Hearts -->
    <div class="card-row">
        @foreach(['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'] as $rank)
            <div class="card hearts" data-value="{{ $rank }}h">
                {{ $rank }}<br>&hearts;
            </div>
        @endforeach
    </div>

    <!-- Rows for Diamonds -->
    <div class="card-row">
        @foreach(['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'] as $rank)
            <div class="card diamonds" data-value="{{ $rank }}d">
                {{ $rank }}<br>&diams;
            </div>
        @endforeach
    </div>

    <!-- Rows for Clubs -->
    <div class="card-row">
        @foreach(['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'] as $rank)
            <div class="card clubs" data-value="{{ $rank }}c">
                {{ $rank }}<br>&clubs;
            </div>
        @endforeach
    </div>

    <!-- Rows for Spades -->
    <div class="card-row">
        @foreach(['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'] as $rank)
            <div class="card spades" data-value="{{ $rank }}s">
                {{ $rank }}<br>&spades;
            </div>
        @endforeach
    </div>
</div>
