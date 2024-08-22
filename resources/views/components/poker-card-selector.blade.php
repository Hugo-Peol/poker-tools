<div class="card-selector">
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

<style>
    .card-selector {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card-row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 10px;
    }

    .card {
        width: 60px;
        height: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        border-radius: 5px;
        margin: 5px;
        cursor: pointer;
        text-align: center;
        transition: transform 0.2s ease;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .hearts {
        background-color: #f8d7da;
        color: #dc3545;
    }

    .diamonds {
        background-color: #d1ecf1;
        color: #0c5460;
    }

    .clubs {
        background-color: #d4edda;
        color: #155724;
    }

    .spades {
        background-color: #e2e3e5;
        color: #6c757d;
    }

    .card.selected {
        border: 2px solid #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let selectedCards = [];

        // Function to update selected cards
        function updateSelectedCards() {
            const selectedCardsContainer = document.getElementById('selectedCardsContainer');
            selectedCardsContainer.innerHTML = selectedCards.map(card => {
                const [rank, suit] = card.split('');
                return `<div class="card ${getCardClass(suit)}">${rank}<br>${getCardSymbol(suit)}</div>`;
            }).join(' ');
        }

        // Event listener for card clicks
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', () => {
                const cardValue = card.getAttribute('data-value');
                if (selectedCards.includes(cardValue)) {
                    // Deselect card
                    card.classList.remove('selected');
                    selectedCards = selectedCards.filter(c => c !== cardValue);
                } else {
                    // Select card
                    if (selectedCards.length < 2) {
                        card.classList.add('selected');
                        selectedCards.push(cardValue);
                    } else {
                        // Replace the oldest selected card if more than 2 are selected
                        const deselectedCard = selectedCards.shift();
                        document.querySelector(`.card[data-value="${deselectedCard}"]`).classList.remove('selected');
                        selectedCards.push(cardValue);
                        updateSelectedCards();
                    }
                }
                updateSelectedCards();
            });
        });

        // Function to get card class based on suit
        function getCardClass(suit) {
            switch (suit) {
                case 'h': return 'hearts';
                case 'd': return 'diamonds';
                case 'c': return 'clubs';
                case 's': return 'spades';
            }
        }

        // Function to get card symbol based on suit
        function getCardSymbol(suit) {
            switch (suit) {
                case 'h': return '&hearts;';
                case 'd': return '&diams;';
                case 'c': return '&clubs;';
                case 's': return '&spades;';
            }
        }
    });
</script>
