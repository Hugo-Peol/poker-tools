document.addEventListener('DOMContentLoaded', function() {
    let selectedCards = [];

    function updateSelectedCards() {
        const selectedCardsContainer = document.getElementById('selectedCardsContainer');
        selectedCardsContainer.innerHTML = selectedCards.map(card => {
            const [rank, suit] = card.split('');
            return `<div class="card ${getCardClass(suit)}">${rank}<br>${getCardSymbol(suit)}</div>`;
        }).join(' ');
    }

    function getCardClass(suit) {
        switch (suit) {
            case 'h': return 'hearts';
            case 'd': return 'diamonds';
            case 'c': return 'clubs';
            case 's': return 'spades';
            default: return '';
        }
    }

    function getCardSymbol(suit) {
        switch (suit) {
            case 'h': return '&hearts;';
            case 'd': return '&diams;';
            case 'c': return '&clubs;';
            case 's': return '&spades;';
            default: return '';
        }
    }

    // Attach event listeners to cards
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', () => {
            const cardValue = card.getAttribute('data-value');
            if (selectedCards.includes(cardValue)) {
                // Deselect card
                card.classList.remove('selected');
                selectedCards = selectedCards.filter(c => c !== cardValue);
            } else {
                if (selectedCards.length < 2) {
                    // Select card
                    card.classList.add('selected');
                    selectedCards.push(cardValue);
                } else {
                    // Replace the first selected card
                    const deselectedCard = selectedCards.shift();
                    document.querySelector(`.card[data-value="${deselectedCard}"]`).classList.remove('selected');
                    selectedCards.push(cardValue);
                }
            }
            updateSelectedCards();
        });
    });

    // Update selected cards on modal close event
    document.addEventListener('selectedCardsUpdated', function(event) {
        const selectedCardsContainer = document.getElementById('selectedCardsContainer');
        selectedCardsContainer.innerHTML = event.detail.cards.map(card => {
            const [rank, suit] = card.split('');
            return `<div class="card ${getCardClass(suit)}">${rank}<br>${getCardSymbol(suit)}</div>`;
        }).join(' ');
    });
});
