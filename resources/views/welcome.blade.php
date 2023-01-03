    <head>
        <style>
            /* Landing Page */
            .custom-shape-divider-top-1672603859 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
            }

            .custom-shape-divider-top-1672603859 svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 133px;
            }

            .custom-shape-divider-top-1672603859 .shape-fill {
            fill: #FFFFFF;
            }

            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap');

            .body_text {
            padding: 0;
            margin: 0; 
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            }



            li {
            list-style: none;
            }

            label {
            position: relative;
            }

            input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 50px;
            width: 50px;
            z-index: 100;
            }

            .div_text {
            position: relative;
            height: 50px;
            width: 50px;
            color: #555;
            display: flex;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 46px;
            cursor: pointer;
            margin: 0 4px;
            border-radius: 20px;
            box-shadow: -1px -1px 4px rgba(255, 255, 255, 0.05),
                4px 4px 6px rgba(0, 0, 0, 0.2),
                inset -1px -1px 4px rgba(255, 255, 255, 0.05),
                inset 1px 1px 1px rgba(0, 0, 0, 0.1);
            }

            /* div:before {
            content: "";
            position: absolute;
            top: 2px;
            left: 2px;
            width: 75px;
            height: 38px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            background: rgba(255, 255, 255, 0.05);
            } */

            input[type="checkbox"]:checked ~ div {
            box-shadow: inset 0 0 2px rgba(255, 255, 255, 0.05),
                inset 4px 4px 6px rgba(0, 0, 0, 0.2);
            color: yellow;
            text-shadow: 0 0 15px yellow, 0 0 25px yellow;
            animation: glow 1.5s linear infinite;
            }
   

            @keyframes glow {
            0% {
                filter: hue-rotate(0deg);
            }
            100% {
                filter: hue-rotate(360deg);
            }
            }

        </style>
    </head>
    <x-app-layout>
        <section class="bg-perso border-t">
            <div class="relative -top-2 custom-shape-divider-top-1672603859">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
                </svg>
            </div>
            <div class="body_text my-10">
                <ul class="relative flex">
                    <li>
                        <input type="checkbox"/>
                        <div class="div_text">D</div>
                    </li>
                    <li>
                        <input type="checkbox" />
                        <div class="div_text">I</div>
                    </li>
                    <li>
                        <input type="checkbox" />
                        <div class="div_text">E</div>
                    </li>
                    <li>
                        <input type="checkbox" />
                        <div class="div_text">T</div>
                    </li>
                    <li>
                        <input type="checkbox" />
                        <div class="div_text">'</div>
                    </li>
                </ul>
            </div>
            <div class="body_text">
                <ul  class="relative flex">
                    <li>
                        <input type="checkbox" />
                        <div class="div_text">E</div>
                    </li>
                    <li>
                        <input type="checkbox" />
                        <div class="div_text">T</div>
                    </li>
                    <li>
                        <input type="checkbox" />
                        <div class="div_text">H</div>
                    </li>
                    <li>
                        <input type="checkbox" />
                        <div class="div_text">I</div>
                    </li>
                    <li>
                        <input type="checkbox" />
                        <div class="div_text">Q</div>
                    </li>
                    <li>
                        <input type="checkbox" />
                        <div class="div_text">U</div>
                    </li>
                    <li>
                        <input type="checkbox" />
                        <div class="div_text">E</div>
                    </li>
                </ul>
            </div>
            <div class="container mx-auto text-white pb-24 border-b pt-12">
                <div class="text-center mb-12">
                    <h2 class="text-xl">Bienvenue sur mon site de <br> Nutrition et de Diététique</h2>
                </div>
                <div class="mb-10 mt-10 opacity-90 text-center">
                    <h3 class="text-lg">Perte de poids ? Réequilibrage alimentaire ? <br>
                        N'hésitez pas à me contacter pour des recettes ou un suivi personnalisé. 
                    </h3>
                </div>
            </div>
        </section>
    </x-app-layout>

