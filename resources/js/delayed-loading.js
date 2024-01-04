// public/js/delayed-loading.js

document.addEventListener('DOMContentLoaded', function () {
    // Show waves and loading text
    showWavesAndLoadingText();

    // Function to show waves and loading text
    function showWavesAndLoadingText() {
        document.querySelector('.waves-container').style.display = 'flex';
        document.querySelector('.loading-text').style.display = 'block';

        // Automatically hide waves and loading text after a delay
        setTimeout(function () {
            hideWavesAndLoadingText();
        }, 5000); // Adjust the delay (in milliseconds) as needed
    }

    // Function to hide waves and loading text
    function hideWavesAndLoadingText() {
        document.querySelector('.waves-container').style.display = 'none';
        document.querySelector('.loading-text').style.display = 'none';
    }
});
