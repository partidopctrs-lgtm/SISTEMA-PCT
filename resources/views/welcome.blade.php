<x-public-layout>
    <x-slot name="title">Bem-vindo ao PCT - Movimento Cidadania e Trabalho</x-slot>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-white pt-16 pb-32 lg:pt-32 lg:pb-48">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-[600px] h-[600px] bg-pct-blue/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-pct-green/5 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="w-full lg:w-1/2 space-y-8 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-pct-blue rounded-full text-xs font-black uppercase tracking-widest border border-blue-100">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pct-blue opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-pct-blue"></span>
                        </span>
                        Iniciativa Nacional Independente
                    </div>
                    
                    <h1 class="text-5xl md:text-7xl font-black text-pct-blue leading-[0.9] tracking-tighter">
                        MOVIMENTO <br>
                        <span class="text-pct-green italic">CIDADANIA</span> <br>
                        E TRABALHO
                    </h1>

                    <p class="text-lg md:text-xl text-gray-600 font-medium max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Unindo o Brasil através do trabalho, liberdade e gestão transparente. Sede oficial em <span class="font-bold text-pct-blue">Taquara, RS</span>.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('register.index') }}" class="px-10 py-5 bg-pct-blue text-white rounded-2xl font-black uppercase tracking-widest text-sm hover:bg-blue-900 transition-all shadow-2xl shadow-blue-900/30 text-center">
                            Quero me Afiliar
                        </a>
                        <a href="{{ route('login') }}" class="px-10 py-5 bg-white text-pct-blue border-2 border-pct-blue/10 rounded-2xl font-black uppercase tracking-widest text-sm hover:bg-slate-50 transition-all text-center">
                            Acessar Portal
                        </a>
                    </div>

                    <div class="pt-8 flex flex-wrap justify-center lg:justify-start gap-8 items-center opacity-60">
                        <div class="flex items-center gap-2">
                            <i data-lucide="shield-check" class="w-5 h-5 text-pct-blue"></i>
                            <span class="text-xs font-bold uppercase tracking-widest">100% Independente</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="map-pin" class="w-5 h-5 text-pct-blue"></i>
                            <span class="text-xs font-bold uppercase tracking-widest">Taquara, RS</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="users" class="w-5 h-5 text-pct-blue"></i>
                            <span class="text-xs font-bold uppercase tracking-widest">Gestão Direta</span>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 relative">
                    <!-- Featured Proposal Card -->
                    <div class="relative bg-white rounded-[3rem] p-8 md:p-12 shadow-2xl border border-slate-100 group hover:shadow-pct-blue/10 transition-all duration-500 overflow-hidden">
                        <div class="absolute top-0 right-0 p-8">
                            <span class="px-4 py-1.5 bg-emerald-50 text-pct-green rounded-full text-[10px] font-black uppercase tracking-widest border border-emerald-100">
                                Proposta em Destaque
                            </span>
                        </div>

                        <div class="mb-10 mt-4 flex justify-center">
                            <!-- Water SVG Implementation -->
                            <div class="w-48 h-48 md:w-64 md:h-64 transition-transform duration-700 group-hover:scale-110">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2200 2200" class="w-full h-full drop-shadow-xl">
                                    <g id="Objects">
                                        <path fill="#0068FF" d="M1177.322,1668.558c-25.583,10.881-56.18,11.996-77.303,11.996 c-24.428,0-51.72-1.115-77.303-11.996c-7.867-3.339-16.786-9.284-15.89-17.778c1.042-9.9,14.282-9.738,26.261-12.646 c19.425-4.706,49.742-13.234,54.998-44.089c0.465-2.736,0.864-5.552,1.205-8.427c2.809-23.691-4.562-47.29-19.458-65.925 c-6.493-8.122-10.444-18.88-10.444-30.679c0-25.314,18.193-45.832,40.632-45.832c22.44,0,40.632,20.518,40.632,45.832 c0,11.8-3.952,22.557-10.444,30.679c-14.896,18.635-22.267,42.234-19.458,65.925c0.341,2.875,0.74,5.692,1.205,8.427 c5.255,30.855,35.573,39.383,54.998,44.089c11.979,2.908,25.219,2.745,26.261,12.646 C1194.108,1659.274,1185.188,1659.274,1177.322,1668.558z"/>
                                        <path fill="#0068FF" d="M1217.851,1655.851c19.539,1.266,80.655,5.867,85.294,28.185 c4.31,27.009-71.483,38.358-91.048,41.551c-49.313,7.255-99.281,8.817-149.033,6.915c-43.643-2.202-87.665-6.112-129.693-18.892 c-6.074-1.949-12.13-4.144-18.091-7.059c-6.587-3.513-12.824-6.554-16.99-13.863c-7.771-17.14,15.74-25.169,27.894-28.557 c18.083-4.958,36.693-7.045,55.323-8.183c-11.993,2.798-23.977,5.696-35.727,9.292c-5.826,1.851-11.629,3.707-17.207,5.96 c-7.473,3.189-16.076,6.62-20.59,12.941c-1.922,2.99,2.282,5.465,5.032,7.305c12.668,6.912,27.246,9.573,41.78,12.406 c23.769,4.163,48.074,6.457,72.389,7.99c36.532,2.235,73.211,2.697,109.798,1.617c36.375-1.143,73.205-3.496,108.923-9.738 c14.487-2.875,29.087-5.511,41.594-12.591c2.175-1.312,3.951-2.954,4.605-4.078c0.775-1.302,0.536-1.792-0.283-3.25 c-4.869-6.234-13.407-9.639-20.988-12.821C1253.735,1664.36,1235.728,1660.008,1217.851,1655.851L1217.851,1655.851z"/>
                                        <path fill="#0068FF" d="M1330.842,1655.851c42.768,2.93,116.972,10.22,151.783,34.147 c10.897,7.469,18.546,20.695,11.734,34.094c-14.122,27.553-75.128,42.006-103.817,48.969 c-118.856,25.714-241.378,29.737-362.557,25.826c-60.668-2.551-121.316-7.77-181.197-18.296 c-36.441-6.818-72.753-14.385-106.937-29.595c-12.355-5.986-25.594-12.683-33.201-25.162c-8.897-15.441,0.42-29.676,13.782-37.851 c36.602-22.141,104.502-28.921,147.428-31.951c-23.493,5.08-46.963,10.4-70.019,17.037c-23.314,7.198-48.329,14.318-67.999,28.443 c-2.554,1.941-5.853,4.923-7.243,7.424c-1.627,3.182-1.617,4.148,0.256,7.024c5.465,6.854,16.472,11.829,25.389,15.217 c21.564,8.048,44.828,12.837,67.668,16.922c93.671,15.454,189.773,19.134,284.774,19.425 c94.985-0.353,191.111-4.045,284.736-19.672c27.968-5.386,57.243-10.544,82.272-24.113c3.838-2.198,7.669-5.151,9.849-8.372 c1.699-2.864,1.226-4.078-0.615-7.129C1456.029,1681.96,1365.668,1663.654,1330.842,1655.851L1330.842,1655.851z"/>
                                        <path fill="#0068FF" d="M1430.956,1655.851c57.116,5.291,224.666,24.794,237.339,90.789 c8.875,57.958-101.856,89.978-144.697,102.121c-103.381,27.565-209.92,38.658-316.388,44.202 c-106.188,4.808-212.658,2.801-318.484-7.578c-86.844-8.711-292.599-36.072-347.079-103.681 c-21.177-27.768-7.795-55.516,19.099-72.865c54.314-34.395,142.799-46.398,206.423-52.681 c-17.11,4.122-34.185,8.211-51.079,12.902c-36.918,10.073-152.403,42.555-159.038,81.458 c-0.431,14.774,21.174,26.725,33.688,33.144c45.748,21.578,97.133,31.542,146.962,40.266 c154.332,24.655,311.587,28.748,467.615,23.783c103.771-4.078,207.97-12.134,309.61-33.903 c35.702-8.298,71.799-17.319,103.823-35.267c10.458-6.459,25.374-16.306,24.024-29.052 C1631.579,1703.245,1475.903,1666.576,1430.956,1655.851L1430.956,1655.851z"/>
                                        <path fill="#0068FF" d="M1411.064,1003.497c0,171.788-139.257,311.045-311.045,311.045s-311.045-139.256-311.045-311.045 c0-182.102,216.714-450.491,294.387-686.864c5.291-16.101,28.024-16.101,33.315,0 C1194.349,553.005,1411.064,821.395,1411.064,1003.497z"/>
                                        <path fill="#E8A800" d="M988.053,1236.507c-18.506-10.185-35.814-22.51-51.39-36.776 c-51.386-47.064-83.357-114.739-87.072-184.343c-2.983-56.155,11.681-111.952,32.471-164.196 c18.361-46.135,41.491-90.233,62.513-135.243c2.501-5.358,8.966-7.573,14.164-4.787c0.071,0.018,0.125,0.054,0.179,0.089 c4.572,2.429,6.68,7.841,4.894,12.699c-18.147,49.671-34.936,100.003-41.92,152.318c-8.198,61.513-7.287,125.009,20.469,180.503 c17.75,35.483,41.037,63.259,76.506,83.328L988.053,1236.507z"/>
                                        <path fill="#E8A800" d="M1127.953,1215.498L1127.953,1215.498c0,31.924-29.12,56.056-60.444,49.894 c-13.686-2.692-27.168-6.434-40.292-11.168l24.309-99.128c11.293,4.166,23.573,7.795,36.957,10.886 C1111.563,1171.313,1127.953,1191.811,1127.953,1215.498z"/>
                                    </g>
                                </svg>
                            </div>
                        </div>

                        <div class="text-center">
                            <h3 class="text-3xl font-black text-pct-blue mb-4 uppercase tracking-tighter">SNDAH 2026</h3>
                            <p class="text-gray-500 font-medium mb-8 leading-relaxed">
                                Sistema Nacional Descentralizado de Abastecimento Hídrico. Água de qualidade e gestão municipal forte.
                            </p>
                            <a href="{{ route('proposta.sndah') }}" class="inline-flex items-center gap-2 text-pct-green font-black uppercase tracking-widest text-xs hover:gap-4 transition-all">
                                Ver Projeto de Lei e Estudo Técnico
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WhatsApp Floating Action -->
    <a href="https://wa.me/5551933806899" target="_blank" class="fixed bottom-8 right-8 z-50 p-4 bg-pct-green text-white rounded-full shadow-2xl hover:scale-110 transition-all group flex items-center gap-3">
        <span class="max-w-0 overflow-hidden whitespace-nowrap group-hover:max-w-xs transition-all duration-500 font-bold uppercase tracking-widest text-xs pl-2">Falar com Suporte</span>
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.29-4.171c1.589.945 3.554 1.443 5.548 1.444 5.451 0 9.891-4.44 9.894-9.891.002-2.646-1.03-5.132-2.903-7.006-1.871-1.872-4.354-2.905-7.004-2.907-5.452 0-9.891 4.44-9.894 9.892-.001 2.083.522 4.108 1.515 5.889l-1.103 4.029 4.147-1.089zm9.737-7.042c-.269-.135-1.593-.786-1.839-.876-.247-.09-.427-.135-.607.135-.18.27-.696.876-.853 1.057-.157.181-.314.203-.583.067-.27-.135-1.138-.419-2.167-1.338-.801-.715-1.342-1.598-1.5-1.868-.157-.27-.017-.417.118-.552.121-.122.269-.315.403-.473.135-.158.18-.27.27-.45.09-.18.045-.338-.023-.473-.067-.135-.607-1.463-.831-2.003-.219-.527-.44-.454-.607-.462-.157-.008-.337-.01-.517-.01-.18 0-.473.067-.719.338-.247.27-.944.923-.944 2.251s.966 2.611 1.101 2.791c.135.18 1.901 2.904 4.605 4.072.642.279 1.144.446 1.534.57.646.205 1.234.175 1.698.106.518-.077 1.593-.652 1.819-1.282.225-.63.225-1.17.157-1.283-.068-.113-.247-.18-.517-.315z"></path></svg>
    </a>

</x-public-layout>
