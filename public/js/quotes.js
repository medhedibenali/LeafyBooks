const quotes = document.querySelectorAll('.quote-box .quote-author');
let box=document.querySelector(".quote-box");
let currentQuoteIndex = 0;

function showNextQuote()
{
    quotes[quotes.length-1].querySelector('.quote').style.display = 'none';
    quotes[quotes.length-1].querySelector('.author').style.display = 'none';


    // Hide the previous quote and author
    if (currentQuoteIndex > 0) {
        const prevQuote = quotes[currentQuoteIndex - 1];
        prevQuote.querySelector('.quote').style.display = 'none';
        prevQuote.querySelector('.author').style.display = 'none';
    }

    // Show the current quote and author
    const currentQuote = quotes[currentQuoteIndex];
    currentQuote.querySelector('.quote').style.display = 'block';
    currentQuote.querySelector('.author').style.display = 'block';

    // Increment the current quote index
    currentQuoteIndex++;

    // If we've shown all the quotes, start over from the beginning
    if (currentQuoteIndex >= quotes.length) {
        currentQuoteIndex = 0;
        // Hide all quotes and authors
        for (let i = 0; i < quotes.length-1; i++) {
            const quote = quotes[i];
            quote.querySelector('.quote').style.display = 'none';
            quote.querySelector('.author').style.display = 'none';
        }

    }

    // Schedule the next quote to be shown after a delay
    setTimeout(showNextQuote, 3000); // 3000ms = 3 seconds

}

// Hide all quotes and authors initially
for (let i = 0; i < quotes.length; i++) {
    const quote = quotes[i];
    quote.querySelector('.quote').style.display = 'none';
    quote.querySelector('.author').style.display = 'none';
}

// Start showing quotes and authors
showNextQuote();
