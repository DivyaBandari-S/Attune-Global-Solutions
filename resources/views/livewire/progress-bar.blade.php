<div>
    <!-- resources/views/livewire/delayed-action.blade.php -->

    <div>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Progress Bar</title>
        </head>
        <style>
            body {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                background: white;
            }

            .center-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 400px;
            }

            .waves-container {
                display: flex;
                align-items: center;
                margin: 0;
                /* Remove margin */
                padding: 0;
                /* Remove padding */
            }

            .wave {
                width: 5px;
                height: 300px;
                background: linear-gradient(#fff, rgba(1, 7, 79), cyan);
                margin: 10px;
                animation: wave 1s linear infinite;
                border-radius: 20px;
            }

            .wave:nth-child(2) {
                animation-delay: 0.1s;
            }

            .wave:nth-child(3) {
                animation-delay: 0.2s;
            }

            .wave:nth-child(4) {
                animation-delay: 0.3s;
            }

            .wave:nth-child(5) {
                animation-delay: 0.4s;
            }

            .wave:nth-child(6) {
                animation-delay: 0.5s;
            }

            .wave:nth-child(7) {
                animation-delay: 0.6s;
            }

            .wave:nth-child(8) {
                animation-delay: 0.7s;
            }

            .wave:nth-child(9) {
                animation-delay: 0.8s;
            }

            .wave:nth-child(10) {
                animation-delay: 0.9s;
            }

            .wave:nth-child(11) {
                animation-delay: 1s;
            }

            .wave:nth-child(12) {
                animation-delay: 1.1s;
            }

            .wave:nth-child(13) {
                animation-delay: 1.2s;
            }

            .wave:nth-child(14) {
                animation-delay: 1.3s;
            }

            .wave:nth-child(15) {
                animation-delay: 1.4s;
            }

            .wave:nth-child(16) {
                animation-delay: 1.5s;
            }

            .wave:nth-child(17) {
                animation-delay: 1.6s;
            }

            .wave:nth-child(18) {
                animation-delay: 1.7s;
            }

            .wave:nth-child(19) {
                animation-delay: 1.8s;
            }

            .wave:nth-child(20) {
                animation-delay: 1.9s;
            }

            @keyframes wave {
                0% {
                    transform: scale(0);
                }

                50% {
                    transform: scale(1);
                }

                100% {
                    transform: scale(0);
                }
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            .loading-text {
                margin: 0;
                /* Remove margin */
                padding: 0;
                /* Remove padding */
                color: rgba(1, 7, 79);
                font-size: 6em;
                margin-top: 20px;
                animation: fadeIn 2s ease-in-out forwards, subtleMove 1.5s ease-in-out infinite;
                text-align: center;
            }

            @keyframes subtleMove {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-100px);
                }
            }
        </style>

        <body>

            <div class="center-container">
                <div wire:delay class="waves-container">
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                </div>
            </div>
            <div wire:delay class="loading-text">Loading...</div>
        </body>

        </html>
    </div>

</div>
